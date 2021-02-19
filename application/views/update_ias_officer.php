        
<?php 
if(isset($_GET['id']) && !empty($_GET['id']))
{

  $id =$_GET['id'];

  $query = "SELECT id, ias_id, ias_name_en, ias_name_hi, email_id, post_address, mobile_no FROM ias_details where id= " .$id;
    $data = $this->db->query($query)->row_array();
  //print_r($data);exit();
}
?>
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href='Edairy-Home'>E-diary Home</a>
                                        </li>
                                        <li class="breadcrumb-item active">Add-IAS Officer</li>
                                    </ol>
                                </div>
                                 <div class="col-auto align-self-center">
                                    <a class="btn btn-sm btn-primary" href="<?=base_url('Ediary-List-IAS')?>"><i data-feather=users class="align-self-center menu-icon"></i><span>&nbsp;List-IAS Officer</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                <form action="<?= base_url(); ?>Ediary-Update-IAS-Details" enctype="multipart/form-data" method="post">  
                                    <div class="row"> 

                                    <input type="hidden" name="id" id="id" value="<?php echo $data['id'];?>">

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label text-right">IAS ID</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" id="example-text-input" name="ias_id" type="text" required="" value="<?php echo $data['ias_id'];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label text-right">Enter Name(English)</label>

                                                <div class="col-sm-10">
                                                    <input class="form-control" id="example-text-input" name="ias_name_en" type="text" required="" value="<?php echo $data['ias_name_en'];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Enter Name(Hindi)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="text" id="example-text-input" name="ias_name_hi"   value="<?php echo $data['ias_name_hi'];?>" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Email ID</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder=""  id="example-text-input" name="email_id" type="text" value="<?php echo $data['email_id'];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Post (Address)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder=""  id="example-text-input" name="post_address" value="<?php echo $data['post_address'];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Mobile Number</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" id="example-text-input" name="mobile_no" value="<?php echo $data['mobile_no'];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-sm-12 text-right">
                                                    <button type="submit" class="btn btn-primary px-4">Update</button>
                                                     <button type="reset" class="btn btn-warning px-4">Cancel</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div> <!-- end row -->
                                </form>    <!-- end form -->

                                <!-- start data table -->

                                <!-- end data table -->

                                </div>
                            </div>
                        </div>
                    </div>
            </div>