<body>
    <div class=left-sidenav>
        <div class=brand>
            <a class=logo><span><img src=assets/images/logo-sm.png alt=logo-small class=logo-sm></span>
                <span><img src=assets/images/logo.png alt=logo-large class="logo-lg logo-light"><img src=assets/images/logo-dark.png alt=logo-large class="logo-lg logo-dark"></span>
            </a>
        </div>
        <div class="menu-content h-100" data-simplebar>
            <ul class="metismenu left-sidenav-menu">
                <li class="menu-label mt-0">Home</li>
                <li><a href="<?=base_url('Edairy-Home')?>"> <i data-feather=clipboard class="align-self-center menu-icon"></i><span>Dashboard</span></a></li>
                <li class="menu-label mt-0">Transaction</li>
                <li><a href="<?=base_url('Ediary-Add-Contacts')?>"> <i data-feather=users class="align-self-center menu-icon"></i><span>Contacts</span></a></li>

                <li><a href="<?=base_url('Ediary-Add-IAS')?>"> <i data-feather=users class="align-self-center menu-icon"></i><span>Add-IAS-Officer</span></a></li>
                <hr class="hr-dashed hr-menu">

                <li class="menu-label my-2">Master</li>

               <!--  <li><a href="<?=base_url('Edairy-Department')?>"><i data-feather=briefcase class="align-self-center menu-icon"></i><span>Departments</span></a></li> -->

                <li><a href="<?=base_url('Ediary-Add-Department')?>"><i data-feather=briefcase class="align-self-center menu-icon"></i><span>Add-Departments</span></a></li>

                <li><a href="<?=base_url('Ediary-Add-Designation')?>"><i data-feather=award class="align-self-center menu-icon"></i><span>Add-Designation</span></a></li>

               <!--  <li><a href="<?=base_url('Ediary-List-Department')?>"><i data-feather=align-justify class="align-self-center menu-icon"></i><span>List-Department</span></a></li>

                <li><a href="<?=base_url('Ediary-List-Designation')?>"><i data-feather=align-justify class="align-self-center menu-icon"></i><span>List-Designation</span></a></li> -->

                <li><a href="<?=base_url('Ediary-Department-Designation-list')?>"><i data-feather=award class="align-self-center menu-icon"></i><span>Dept-Designation-list</span></a></li>
            </ul>
        </div>
    </div>