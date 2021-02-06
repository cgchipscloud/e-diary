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
                                <form action="<?= base_url(); ?>Ediary-Insert-Contacts" enctype="multipart/form-data" method="post">  
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
                                                <label for="" class="col-sm-2 col-form-label text-right">Designation Name</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="designation_id" name="designation_id" required="">
                                                    <option value="">Select Designation Name</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label text-right">Enter Name</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="text" value="" id="example-text-input" name="name" type="text" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Address (Home)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="text" value="" id="example-text-input" name="home_address" type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Address (Office)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="text" value="" id="example-text-input" name="office_address" type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Address (Room)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="text" value="" id="example-text-input" name="siting_address" type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Contact Number-1 (Personal)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="text" value="" id="example-text-input" name="cont_personal_no" type="Number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Contact Number-2 (Personal)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="text" value="" id="example-text-input" name="cont_personal_no_two" type="Number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Contact Number-1 (Office)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="tel" value="" id="example-text-input" name="cont_office_no" type="Number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Contact Number-2 (Office)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="tel" value="" id="example-text-input" name="cont_office_two" type="Number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Email ID</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="text" value="" id="example-text-input" name="cont_email" type="Email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Fax No-1</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="text" value="" id="example-text-input" name="cont_fax" type="number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Fax No-2</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="text" value="" id="example-text-input" name="cont_fax_two" type="number">
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

                                    </div> <!-- end row -->
                                </form>    <!-- end form -->
                                </div>
                            </div>
                        </div>
                    </div>

            </div>

