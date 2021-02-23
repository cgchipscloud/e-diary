
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
                                        <li class="breadcrumb-item active">List-Department</li>
                                    </ol>
                                </div>
                                <div class="col-auto align-self-center">
                                    <a class="btn btn-sm btn-primary" href="<?=base_url('Ediary-Add-Department')?>"><i data-feather=briefcase class="align-self-center menu-icon"></i><span>&nbsp;Add-Department</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Department List</h4>
                                   
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <div class="table-responsive" style="width:1060px;">
                                        <table id="datatables_list" class="table table-bordered dt-responsive nowrap">
                                            <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Contact Number(Count)</th>
                                                <th>Department Category Name (English/Hindi)</th>
                                                <th>Department Name (English/Hindi)</th>
                                                <!-- <th>Department Name (English)</th> -->
                                                <th>Action</th>
                                                

                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i = 1;
                                                    foreach($dept_data as $val){ ?>
                                                <tr>
                                                    <td><?=$i++;?></td>
                                                    <td><?= $val['num']?></td>
                                                    <td><?= $val['category_name_eng'].'('.$val['category_name_hin'].')'?></td>
                                                    <td><?= $val['dept_name_en'].'('.$val['dept_name_hi'].')'?></td>
                                                    <!-- <td><?= $val['dept_name_en']?></td> -->
                                                    <td><a class="btn btn-sm btn-primary" href="<?=base_url('Ediary-Edit-department')?>?dept_id=<?=$val['dept_id']?>">Update</a></td>

                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
        
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
            </div>