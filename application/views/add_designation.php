        
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
                                        <li class="breadcrumb-item active">Add-Designation</li>
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
                                <form action="<?= base_url(); ?>Ediary-Insert-Designation" enctype="multipart/form-data" method="post">  
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label text-right">Department Name</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="department_id" name="department_id" required="">
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
                                                <label for="" class="col-sm-2 col-form-label text-right">Department Name(Hindi)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="विभाग का नाम हिंदी में लिखें " type="text" value="" id="example-text-input" name="designation_name_eng" type="text" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Department Name(English)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="Department Name write in English" type="text" value="" id="example-text-input" name="designation_name_hindi" type="text" required="">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-sm-12 text-right">
                                                    <button type="submit" class="btn btn-primary px-4">Save</button>
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