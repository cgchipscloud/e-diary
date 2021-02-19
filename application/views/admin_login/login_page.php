<!DOCTYPE html>
<html lang=en>

<head>
    <meta charset=utf-8 />
    <title>CG eDiary - Official Dirary of Chhattisgarh Government</title>
    <meta name=viewport content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv=X-UA-Compatible content="IE=edge" />
    <link rel="shortcut icon" href=assets/images/favicon.ico>
    <link href=assets/css/bootstrap.min.css rel=stylesheet type=text/css />
    <link href=assets/css/icons.min.css rel=stylesheet type=text/css />
    <link href=assets/css/app.min.css rel=stylesheet type=text/css />
</head>

<body class="account-body accountbg">
    <div class=container>
        <div class="row d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class=row>
                    <div class="col-lg-5 mx-auto mt-4">
                        <div class=card>
                            <div class="card-body p-0 auth-header-box">
                                <div class="text-center p-3">
                                    <a href=# class="logo logo-admin">
                                        <img src=assets/images/logo-sm.png height=50 alt=logo class=auth-logo>
                                    </a>
                                    <h4 class="mt-3 mb-1 font-weight-semibold text-white font-18">CG - eDiary</h4>
                                    <p class="text-muted mb-0">Sign in to manage contents.</p>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul class="nav-border nav nav-pills" role=tablist>
                                    <li class=nav-item><a class="nav-link active font-weight-semibold" data-toggle=tab href=#LogIn_Tab role=tab>Log In</a></li>
                                </ul>
                                <div class=tab-content>
                                    <div class="tab-pane active p-3" id=LogIn_Tab role=tabpanel>
                                        <!-- <div class="icon-alert">   
                                            <?php if($this->session->set_flashdata('error')){ ?>                 
                                            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mb-0" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <i class="mdi mdi-close-circle mr-2"></i><?= $this->session->set_flashdata('error')?>
                                            </div> 
                                            <?php } ?>
                                        </div>   -->
                                        <form class="form-horizontal auth-form" method="post">
                                            <div class="form-group mb-2 <?= !empty(form_error('username'))?'has-error  has-feedback':'' ?>">
                                                <label for=username>Username</label>
                                                <div class=input-group>
                                                    <input type=text class=form-control name=username id=username placeholder="Enter username" value="<?php echo set_value('username') ?>">
                                                </div>
                                                <?= !empty(form_error('username'))?'<span class="glyphicon glyphicon-remove form-control-feedback"></span>':'' ?>
                                                <?= form_error('username') ?>
                                            </div>
                                            <div class="form-group mb-2 <?= !empty(form_error('password'))?'has-error  has-feedback':'' ?>">
                                                <label for=userpassword>Password</label>
                                                <div class=input-group>
                                                    <input type=password class=form-control name=password id=userpassword placeholder="Enter password" value="<?php echo set_value('password') ?>">
                                                </div>
                                                <?= !empty(form_error('password'))?'<span class="glyphicon glyphicon-remove form-control-feedback"></span>':'' ?>
                                                <?= form_error('password') ?>
                                            </div>
                                            <div class="form-group mb-0 row">
                                                <div class=col-12>
                                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class=account-social>
                                            <h6 class=mb-3>Desclaimer</h6>
                                        </div>
                                        <div class="btn-group btn-block">
                                            <p class="mb-0 text-center">लॉगिन की सुविधा केवल छत्तीसगढ़ शासन के अधिकृत विभागों के अधीनस्थ कार्यरत अधिकारियों/कर्मचारियों एवं पंजीकृत उपयोगकर्ताओं के लिए है।</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body bg-light-alt text-center"><span class="text-muted d-none d-sm-inline-block"> &copy;  <script>document.write(new Date().getFullYear())</script> eDiary | Designed and Developed by  <a href="http://chips.gov.in/" target="_blank">CHiPS<br/><img src="<?=base_url('assets/images/chips.png')?>" height="50"></a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src=assets/js/jquery.min.js></script>
    <script src=assets/js/bootstrap.bundle.min.js></script>
    <script src=assets/js/waves.js></script>
    <script src=assets/js/feather.min.js></script>
    <script src=assets/js/simplebar.min.js></script>
</body>

</html>