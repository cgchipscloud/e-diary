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
                                        <li class="breadcrumb-item active">Add-Dapartments</li>
                                    </ol>
                                </div>
                                <div class="col-auto align-self-center">
                                    <a class="btn btn-sm btn-primary" href="<?=base_url('Ediary-List-Department')?>"><i data-feather=briefcase class="align-self-center menu-icon"></i><span>&nbsp;List-Department</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                <form action="<?= base_url(); ?>Ediary-Insert-Department" enctype="multipart/form-data" method="post">  
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label text-right">Department Category Name</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="category_id" name="fk_dept_category_id" required="">
                                                    <option value="">Select Department Category Name</option>
                                                    <?php foreach ($dept_cate as $val) { ?>
                                                        <option value="<?=$val['sequence'] ?>"><?= $val['category_name_eng'].' ('.$val['category_name_hin'].')' ?></option>
                                                      <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                         </div>

                                         <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label text-right">Sub-category Name</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="subcategory_id" name="subcategory_id" required="">
                                                    <option value="">Select Sub-category Name</option>
                                                   
                                                    </select>
                                                </div>
                                            </div>
                                         </div>

                                         <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label text-right">Order Number</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" placeholder="विभाग का क्रम लिखें " id="example-text-input" name="order_id" type="text" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label text-right">Department Name(Hindi)</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" placeholder="विभाग का नाम हिंदी में लिखें " id="example-text-input" name="dept_hindi_name" type="text" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label text-right">Department Name(English)</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" placeholder="Department Name write in English" type="text"  id="example-text-input" name="dept_eng_name">
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