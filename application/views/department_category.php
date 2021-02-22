        
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
                                        <li class="breadcrumb-item active">Add-Department Category</li>
                                    </ol>
                                </div>
                                <div class="col-auto align-self-center">
                                    <a class="btn btn-sm btn-primary" href="<?=base_url('Ediary-List-Department-Category')?>"><i data-feather=briefcase class="align-self-center menu-icon"></i><span>&nbsp;List-Department Category</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                <form action="<?= base_url(); ?>Ediary-Insert-Department-Category" enctype="multipart/form-data" method="post">  
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label text-right">Sequence Number</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" placeholder="डिपार्टमेंट का अनुक्रम दर्ज करें" type="text" value="" id="example-text-input" name="sequence" type="text" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label text-right">Department Category Name (English)</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" placeholder="Department Category Name write in English" type="text" value="" id="example-text-input" name="category_name_eng" type="text" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label text-right">Department Category Name (Hindi)</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" placeholder="विभाग का केटेगरी नाम हिंदी में लिखें " type="text" value="" id="example-text-input" name="category_name_hin" type="text" required="">
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