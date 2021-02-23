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
                                        <li class="breadcrumb-item active">List-IAS-Officer</li>
                                    </ol>
                                </div>
                                <div class="col-auto align-self-center">
                                    <a class="btn btn-sm btn-primary" href="<?=base_url('Ediary-Add-IAS')?>"><i data-feather=award class="align-self-center menu-icon"></i><span>&nbsp;Add-IAS-Officer</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">IAS Officer List</h4>
                            </div><!--end card-header-->
                             <div class="card-body">
                                <div class="table-responsive" style="width:1060px;">
                                <table id="datatable_contact" class="table table-bordered display" >
                                     <thead>
                                            <tr>
                                                <th width="5%">S.No.</th>
                                                 <th width="15%">IAS ID</th>
                                                <th width="15%">IAS Name (English/Hindi)</th>
                                                <!-- <th width="10%">IAS Name (Hindi)</th> -->
                                                <th width="5%">Email ID</th>
                                                <th width="5%">Mobile Number</th>
                                                <th width="10%">Post (Address)</th>
                                                <th width="5%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 1;
                                                foreach($ias_data as $val){ ?>
                                            <tr>
                                                <td width="5%"><?=$i++;?></td>
                                                <td width="15%"><?= $val['ias_id']?></td>
                                                <td width="15%"><?= $val['ias_name_en'].'('.$val['ias_name_hi'].')'?></td>
                                                <!-- <td width="10%"><?= $val['ias_name_hi']?></td> -->
                                                <td width="5%"><?= $val['email_id']
                                                    ?></td>
                                                <td width="10%"><?= $val['mobile_no']?></td>
                                                <td width="5%"><?= $val['post_address']?></td>
                                                
                                                <td width="5%"><a class="btn btn-sm btn-primary" href="<?=base_url('Ediary-Edit-IAS-Officer')?>?id=<?=$val['id']?>">Update</a></td>
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