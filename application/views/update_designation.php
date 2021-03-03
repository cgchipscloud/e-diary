        
<?php 
    if(isset($_GET['designation_id']) && !empty($_GET['designation_id']))
    {

      $designation_id =$_GET['designation_id'];

        $query = "SELECT des.designation_id,dep.dept_id,des.department_id,dep.dept_name_hi,dep.dept_name_en, des.designation_name_eng, des.designation_name_hindi,des.designation_name_eng FROM mst_designation des
                JOIN mst_department dep on dep.dept_id=des.department_id where des.designation_id=" .$designation_id;
        $data = $this->db->query($query)->row_array();
      //print_r($data);exit();
    }
?> 
        <div class=page-content>
            <div class=container-fluid>
                <div class=row>
                    <div class=col-sm-12>
                        <div class=page-title-box>
                            <div class=row>
                                <div class=col>
                                    <ol class=breadcrumb>
                                        <li class=breadcrumb-item><a href='Edairy-Home'>E-diary Home</a>
                                        </li>
                                        <li class="breadcrumb-item active">Update-Designation</li>
                                    </ol>
                                </div>
                                <div class="col-auto align-self-center">
                                    <a class="btn btn-sm btn-primary" href="<?=base_url('Ediary-List-Designation')?>"><i data-feather=briefcase class="align-self-center menu-icon"></i><span>&nbsp;List-Designation</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                <form action="<?= base_url(); ?>Ediary-Update-designation" enctype="multipart/form-data" method="post">  
                                    <div class="row">

                                        <input type="hidden" name="designation_id" id="designation_id" value="<?php echo $data['designation_id'];?>">

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label text-right">Department Name</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="department_id" name="department_id" required="">
                                                    <?php if(!empty($data['department_id'])){?>
                                                    <option value="<?=$data['department_id'] ?>"><?= $data['dept_name_en'].'('.$data['dept_name_hi'].')' ?></option>
                                                    <?php }?>
                                                    <option value="">Select Department Name</option>
                                                    <?php foreach ($get_department as $val) { ?>
                                                        <option value="<?=$val['dept_id'] ?>"><?= $val['dept_name_en'].'('.$val['dept_name_hi'].')' ?></option>
                                                      <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label text-right">Designation Name(Hindi)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="पद का नाम हिंदी में लिखें " id="example-text-input" name="designation_name_hindi" type="text" required=""  value="<?php echo $data['designation_name_hindi'];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Designation Name(English)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="Designation Name write in English" type="text" id="example-text-input" name="designation_name_eng"  value="<?php echo $data['designation_name_eng'];?>">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-sm-12 text-right">
                                                    <button type="submit" class="btn btn-primary px-4">Update</button>
                                                     <button type="clear" class="btn btn-warning px-4">Cancel</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div><!-- end row -->
                                </form><!-- end form -->

                                <!-- start data table -->

                                <!-- end data table -->

                                </div>
                            </div>
                        </div>
                    </div>

            </div>