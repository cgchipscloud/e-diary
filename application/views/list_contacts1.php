        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col-9">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">E-Diary
                                        </li>
                                        <li class="breadcrumb-item active">List-Contacts</li>
                                    </ol>
                                </div>
                                <div class="col-auto align-self-center">
                                    <a class="btn btn-sm btn-primary" href="<?=base_url('Add-Contacts')?>"><i data-feather=users class="align-self-center menu-icon"></i><span>&nbsp;Add-Contacts</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Contacts List</h4>
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive wrap">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Name</th>
                                                <th>Department</th>
                                                <th>Designation</th>
                                                <th>contact No.<br/>(Personal)</th>
                                                <th>contact No.<br/>(Office)</th>
                                                <th>Email ID</th>
                                                <th>Address<br/>(Home)</th>
                                                <th>Address<br/>(Office)</th>
                                                <th>Address<br/>(Room)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 1;
                                                foreach($contact_data as $val){ ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?= $val['name']?></td>
                                                <td><?= $val['dept_name_hi']?></td>
                                                <td><?= $val['designation_name_hindi']?></td>
                                                <td><?= $val['cont_personal_no']?></td>
                                                <td><?= $val['cont_office_no']?></td>
                                                <td><?= $val['cont_email']?></td>
                                                <td><?= $val['home_address']?></td>
                                                <td><?= $val['office_address']?></td>
                                                <td><?= $val['siting_address']?></td>

                                               <!--  <td class="text-center">
                                                    <?php $data = urlencode(base64_encode($val['id'])) ?>
                                                    <a href="<?= base_url()?>Edit-Contacts?var=<?= $data?>" class="btn btn-primary btn-xs reset_password" >Update</a>
                                                </td> -->

                                                <td><a class="btn btn-sm btn-primary" href="<?=base_url('Edit-Contacts')?>?id=<?=$val['id']?>">Update</a></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
