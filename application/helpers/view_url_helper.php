<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function view_url($URL)
{
    if(isset($_SERVER['HTTP_HOST']))
    {
        $HOST_ARRAY = explode(':', $_SERVER['HTTP_HOST']);
        $HOST = $HOST_ARRAY[0];

        if($HOST != "localhost")
        {
            $URL = str_replace("/","\\", $URL);
        }
        return $URL;
    }
    
}