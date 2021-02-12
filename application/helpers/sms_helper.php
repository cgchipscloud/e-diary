<?php

defined('BASEPATH') OR exit('No direct script access allowed');


function sms($mobile, $message_body)
{
    //whether ip is from share internet
    if (!empty($message_body) && !empty($mobile))
    {
    //     $username = 'CHIPS';        
    //     $password = 'CHIPS@789';
    //     $numbers =$mobile;
    //     $sender = 'OTPSTS';
    //     $message = $message_body; 
    //     $message = urlencode($message);
    //     $url = "http://shubhsms.com/api";
    //     $port = 80;
    //     $api_url = $url."?userid=".urlencode($username)."&password=".urlencode($password)."&senderid=". $sender ."&msg=". $message."&mobno=".$numbers."&route=4&unicode=1";
    //     $ch = curl_init( );
    //     curl_setopt ( $ch, CURLOPT_URL, $api_url );
    //     curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    //     $response_string = curl_exec( $ch );
    //     //echo $response_string;
    //     /* if(isset($response_string))
    //     {

    //     } */
    //     return true;

    // $username,$encryp_password,$senderid,$message,$mobileno,$deptSecureKey
     $username = "CGCHIPS-TELEMED"; //username of the department
     $password = "telemed2020@@"; //password of the department
     $senderid = "CGSSDG"; //senderid of the deparment
    //$message="Your Normal message here"; //message content
    //$messageUnicode = "eDiary में आपका स्वागत है  आपका लॉगिन ओ.टी.पी है  :"; //message content in unicode	
    $message_body=string_to_finalmessage(trim($message_body));
   
     $deptSecureKey = "641c2633-64e5-4aa3-bf0b-c43ae7b43225"; //departsecure key
     $encryp_password = sha1(trim($password));

   

     $key = hash('sha512', trim($username) . trim($senderid) . trim($message_body) . trim($deptSecureKey));
     $data = array(
         "username" => trim($username),
         "password" => trim($encryp_password),
         "senderid" => trim($senderid),
         "content" => trim($message_body),
         //"smsservicetype" => "otpmsg",
         "smsservicetype" => "unicodemsg",
         "mobileno" => trim($mobile),
         "key" => trim($key)
     );
    $result = post_to_url_unicode("https://msdgweb.mgov.gov.in/esms/sendsmsrequest", $data);
  
  //  $result = post_to_url("https://msdgweb.mgov.gov.in/esms/sendsmsrequest", $data);
  // echo $result;exit;
     return $result;
    //  return null;
     //calling post_to_url to send otp sms


     }
    
}
 //featching the length of Unicode Message
 function string_to_finalmessage($message)
 {
     $finalmessage = "";
     $sss = "";
     for ($i = 0; $i < mb_strlen($message, "UTF-8"); $i++)
     {

         $sss = mb_substr($message, $i, 1, "utf-8");
         $a = 0;
         $abc="&#" .ordutf8($sss,$a).";";
         $finalmessage .= $abc;
     }
     return $finalmessage;
 }

 //function to convet utf8 to html entity
 function ordutf8($string, &$offset)
 {
     $code = ord(substr($string, $offset, 1));
     if ($code >= 128) { //otherwise 0xxxxxxx
         if ($code < 224) $bytesnumber = 2; //110xxxxx
         else if ($code < 240) $bytesnumber = 3; //1110xxxx
         else if ($code < 248) $bytesnumber = 4; //11110xxx
         $codetemp = $code - 192 - ($bytesnumber > 2 ? 32 : 0) -
             ($bytesnumber > 3 ? 16 : 0);
         for ($i = 2; $i <= $bytesnumber; $i++) {
             $offset++;
             $code2 = ord(substr($string, $offset, 1)) - 128; //10xxxxxx
             $codetemp = $codetemp * 64 + $code2;
         }
         $code = $codetemp;
     }
     return $code;
 }


  function post_to_url($url, $data)
    {
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= $key . '=' . $value . '&';
        }
        rtrim($fields, '&');
        $post = curl_init();
        curl_setopt($post, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($post, CURLOPT_URL, $url);
        curl_setopt($post, CURLOPT_POST, count($data));
        curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($post); //result from mobile seva server
    //    echo $result; //output from server displayed
        curl_close($post);
        return $result; //output from server displayed
    }
	
	function post_to_url_unicode($url, $data)
 {
     $fields = '';
     foreach ($data as $key => $value) {
         $fields .= $key . '=' . urlencode($value) . '&';
     }
     rtrim($fields, '&');
     $post = curl_init();
     curl_setopt($post, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt($post, CURLOPT_URL, $url);
     curl_setopt($post, CURLOPT_POST, count($data));
     curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
     curl_setopt($post, CURLOPT_HTTPHEADER, array("Content-Type:application/x-www-form-urlencoded"));
     curl_setopt($post, CURLOPT_HTTPHEADER, array("Content-length:" . strlen($fields)));
     curl_setopt($post, CURLOPT_HTTPHEADER, array("User-Agent:Mozilla/4.0
     (compatible; MSIE 5.0; Windows 98; DigExt)"));
     curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);
     $result = curl_exec($post); //result from mobile seva server
     return $result;
     curl_close($post);
 }


?>