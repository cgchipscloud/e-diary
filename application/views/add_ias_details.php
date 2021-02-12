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
                                <form action="<?= base_url(); ?>Ediary-Insert-IAS-Officer" enctype="multipart/form-data" method="post">  
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label text-right">IAS ID</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="text" value="" id="example-text-input" name="ias_id" type="text" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label text-right">Enter Name(English)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="text" value="" id="example-text-input" name="ias_name_en" type="text" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label text-right">Enter Name(Hindi)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="text" value="" id="example-text-input" name="ias_name_hi" type="text" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Email ID</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="text" value="" id="example-text-input" name="email_id" type="Email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Mobile Number</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="text" value="" id="example-text-input" name="mobile_no" type="Number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Post (Address)</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" placeholder="" type="text" value="" id="example-text-input" name="post_address" type="text">
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

                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>

