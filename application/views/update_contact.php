        
<!-- <?php 
if(isset($_GET['id']) && !empty($_GET['id']))
{

  $id = (int)$_GET['id'];

  $query = "SELECT cd.id, cd.name, cd.home_address, cd.office_address,cd.cont_personal_no_two,cd.cont_office_two, cd.siting_address, cd.cont_personal_no, cd.cont_fax, cd.cont_fax_two, cd.constituency, cd.designation_id ,mde.designation_name_hindi,mde.designation_name_eng, cd.department_id,md.dept_name_en, md.dept_name_hi, cd.cont_email, cd.cont_office_no, cd.nigam_city, cd.district, cd.pbx, cd.vidhansabha_contact 

        FROM contact_details cd
        INNER JOIN mst_designation mde ON cd.designation_id=mde.designation_id
        INNER JOIN mst_department md ON cd.department_id=md.dept_id where id=" .$id;
    $data = $this->db->query($query)->row_array();
  //print_r($data);exit();
}
?> -->
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
                                        <li class="breadcrumb-item active">Add-Contacts</li>
                                    </ol>
                                </div>
                                 <div class="col-auto align-self-center">
                                    <a class="btn btn-sm btn-primary" href="<?=base_url('Ediary-List-Contacts')?>"><i data-feather=users class="align-self-center menu-icon"></i><span>&nbsp;List-Contacts</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                <form action="<?= base_url(); ?>Ediary-Update-Contacts" enctype="multipart/form-data" method="post">  
                                    <div class="row">

                                        <input type="hidden" name="id" id="id" value="<?php echo $data['id'];?>">
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label text-right">Department Name</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="department_id" name="department_id" required="">
                                                    <?php if(!empty($data['department_id'])){?>
                                                    <option value="<?=$data['department_id'] ?>"><?= $data['dept_name_hi'] ?></option>
                                                    <?php }?>
                                                    <option value="">Select Department Name</option>
                                                    <?php foreach ($get_department as $val) { ?>
                                                        <option value="<?=$val['dept_id'] ?>"><?= $val['dept_name_hi'] ?></option>
                                                      <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label text-right">Designation Name</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="designation_id" name="designation_id" required="">
                                                    <?php if(!empty($data['designation_id'])){?>
                                                    <option value="<?=$data['designation_id'] ?>"><?= $data['designation_name_hindi'] ?></option>
                                                    

                                                    <?php }?>
                                                    <option value="">Select Designation Name</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label text-right">Enter Name</label>

                                                <div class="col-sm-10">
                                                    <input class="form-control" id="example-text-input" name="name" type="text" required="" value="<?php echo $data['name'];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Address (Home)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="text" id="example-text-input" name="home_address"   value="<?php echo $data['home_address'];?>" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Address (Office)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder=""  id="example-text-input" name="office_address" type="text" value="<?php echo $data['office_address'];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Address (Room)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder=""  id="example-text-input" name="siting_address" type="text"  value="<?php echo $data['siting_address'];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Contact Number-1 (Personal)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" id="example-text-input" name="cont_personal_no" value="<?php echo $data['cont_personal_no'];?>">
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Contact Number-2 (Personal)</label>

                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" id="example-text-input" name="cont_personal_no_two"  value="<?php echo $data['cont_personal_no_two'];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Contact Number-1 (Office)</label>

                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" id="example-text-input" name="cont_office_no"  value="<?php echo $data['cont_office_no'];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Contact Number-2 (Office)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" id="example-text-input" name="cont_office_two" value="<?php echo $data['cont_office_two'];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Email ID</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" id="example-text-input" name="cont_email" type="Email"  value="<?php echo $data['cont_email'];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Fax No-1</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="text" id="example-text-input" name="cont_fax" value="<?php echo $data['cont_fax'];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Fax No-2</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="text" id="example-text-input" name="cont_fax_two" value="<?php echo $data['cont_fax_two'];?>">
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