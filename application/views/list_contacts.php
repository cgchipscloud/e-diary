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
                                        <li class="breadcrumb-item active">List-Contact</li>
                                    </ol>
                                </div>
                                <div class="col-auto align-self-center">
                                    <a class="btn btn-sm btn-primary" href="<?=base_url('Ediary-Add-Contacts')?>"><i data-feather=award class="align-self-center menu-icon"></i><span>&nbsp;Add-Contact</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Contact List</h4>
                            </div><!--end card-header-->
                             <div class="card-body">
                                <div class="table-responsive" style="width:1060px;">
                                <table id="datatable_contact" class="table table-bordered display" >
                                     <thead>
                                            <tr>
                                                <th width="5%">S.No.</th>
                                                 <th width="15%">Name</th>
                                                <th width="15%">Department</th>
                                                <th width="10%">Designation</th>
                                                <th width="5%">Contact No-1 (Personal)</th>
                                                <th width="5%">Contact No-2 (Personal)</th>
                                                <th width="10%">Contact No-1 (Office)</th>
                                                <th width="10%">Contact No-2 (Office)</th>
                                                <th width="5%">Email ID</th>
                                                <th width="10%">Address (Home)</th>
                                                <th width="10%">Address (Office)</th> 
                                                <th width="10%">Address (Room)</th>
                                                <th width="5%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 1;
                                                foreach($contact_data as $val){ ?>
                                            <tr>
                                                <td width="5%"><?=$i++;?></td>
                                                <td width="15%"><?= $val['name']?></td>
                                                <td width="15%"><?= $val['dept_name_hi']?></td>
                                                <td width="10%"><?= $val['designation_name_hindi']?></td>
                                                <td width="5%"><?= $val['cont_personal_no']
                                                    ?></td>
                                                <td width="5%"><?= $val['cont_personal_no_two']?></td>
                                                <td width="10%"><?= $val['cont_office_no']?></td>
                                                <td width="10%"><?= $val['cont_office_two']?></td> 
                                                <td width="5%"><?= $val['cont_email']?></td>
                                                <td width="10%"><?= $val['home_address']?></td>
                                                <td width="10%"><?= $val['office_address']?></td>
                                                <td width="10%"><?= $val['siting_address']?></td>
                                                <td width="5%"><a class="btn btn-sm btn-primary" href="<?=base_url('Ediary-Edit-Contacts')?>?id=<?=$val['id']?>">Update</a></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                </table>
                            </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>