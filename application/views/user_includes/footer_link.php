    <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>assets/js/metismenu.min.js"></script>
    <script src="<?=base_url()?>assets/js/waves.js"></script>
    <script src="<?=base_url()?>assets/js/feather.min.js"></script>
    <script src="<?=base_url()?>assets/js/simplebar.min.js"></script>
    <script src="<?=base_url()?>assets/js/moment.js"></script>
    <script src="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    
    <script src="<?=base_url()?>assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
   
    <script src="<?=base_url()?>assets/js/app.js"></script>
    <script src="<?=base_url()?>assets/js/datatables.min.js"></script>
    <!--<script src="<?=base_url()?>assets/plugins/tiny-editable/mindmup-editabletable.js"></script>
    <script src="<?=base_url()?>assets/plugins/tiny-editable/numeric-input-example.js"></script>
    <script src="<?=base_url()?>assets/plugins/bootable/bootstable.js"></script>
    <script src="<?=base_url()?>assets/pages/jquery.tabledit.init.js"></script>
    <script src="<?=base_url()?>assets/plugins/apex-charts/apexcharts.min.js"></script>
     <script src="<?=base_url()?>assets/pages/jquery.analytics_dashboard.init.js"></script> -->
    <script>
        $(document).ready(function() {


            $('#datatable').dataTable( {
                
                "scrollY": 20,
                "scrollY": true,
                "scrollX": true
            } );

            $("#department_id").change(function(){
                $code = $(this).val();
                $("#designation_id").html("<option value=\"\">Select Department</option>");
                $.ajax
                ({
                    type: 'POST',
                    //contentType: "application/json; charset=utf8",
                    url:'<?= base_url('ajax-desig-list'); ?>',
                    data: {'department_id':$code},
                    datatype : 'html',
                    success: function(res)
                    {
                        var data = JSON.parse(res);
                        $temp = "";
                        $temp="<option value=\"\">Select Designation</option>";
                        if (res) {
                            $.each( data, function( key, value ) {
                                $name = value["designation_name_hindi"];
                                $temp+="<option value="+value["designation_id"]+">"+ $name.toUpperCase() +"</option>";
                            });
                            $("#designation_id").html($temp);
                        }
                    } 
                    ,error:function(xhr){
                        alert(xhr.status);
                    }
                });
            });
         
        
    } );
        $("#datatables_list").DataTable();
        $("#datatable_contact").DataTable();
    </script>
