        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href=javascript:void(0)>E-Diary</a>
                                        </li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>
                                <div class="col-auto align-self-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=row>
                    <div class=col-lg-12>
                        <div class="row justify-content-center">
                        
                            <div class="col-md-6 col-lg-4">
                                <a href="<?= base_url('List-Contacts')?>">
                                <div class="card report-card">
                                    <div class=card-body>
                                        <div class="row d-flex justify-content-center">
                                            <div class=col>
                                                <p class="text-dark mb-0 font-weight-semibold">Contacts</p>
                                                <h3 class=m-0><?= $contact_count['contacts'];?></h3>
                                                <p class="mb-0 text-truncate text-muted">Directory Contact List</p>
                                            </div>
                                            <div class="col-auto align-self-center">
                                                <div class="report-main-icon bg-light-alt"><i data-feather=users class="align-self-center text-muted icon-sm"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        
                        
                            <div class="col-md-6 col-lg-4">
                                <a  href="<?= base_url('List-Department')?>">
                                <div class="card report-card">
                                    <div class=card-body>
                                        <div class="row d-flex justify-content-center">
                                            <div class=col>
                                                <p class="text-dark mb-0 font-weight-semibold">Departments</p>
                                                <h3 class=m-0><?= $dept_count['dept'];?></h3>
                                                <p class="mb-0 text-truncate text-muted">Currently Registered Departments</p>
                                            </div>
                                            <div class="col-auto align-self-center">
                                                <div class="report-main-icon bg-light-alt"><i data-feather=briefcase class="align-self-center text-muted icon-sm"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        
                        
                            <div class="col-md-6 col-lg-4">
                                <a  href="<?= base_url('List-Designation')?>">
                                <div class="card report-card">
                                    <div class=card-body>
                                        <div class="row d-flex justify-content-center">
                                            <div class=col>
                                                <p class="text-dark mb-0 font-weight-semibold">Designations</p>
                                                <h3 class=m-0><?= $desig_count['desig'];?></h3>
                                                <p class="mb-0 text-truncate text-muted">Designations Under Departments</p>
                                            </div>
                                            <div class="col-auto align-self-center">
                                                <div class="report-main-icon bg-light-alt"><i data-feather=award class="align-self-center text-muted icon-sm"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>