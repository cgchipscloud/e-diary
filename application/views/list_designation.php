        <!-- <script>
          $("#dept_designation").DataTable();
         </script> -->
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
                                        <li class="breadcrumb-item active">List-Designation</li>
                                    </ol>
                                </div>
                                <div class="col-auto align-self-center">
                                    <a class="btn btn-sm btn-primary" href="<?=base_url('Ediary-Add-Designation')?>"><i data-feather=award class="align-self-center menu-icon"></i><span>&nbsp;Add-Designation</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Designation List</h4>
                                   
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <div class="table-responsive" style="width:1060px;">
                                        <table id="datatables_list" class="table table-bordered wrap">
                                            <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Department Name (Hindi/English)</th>
                                                <th>Designation Name (Hindi/English)</th>
                                                 <th>Action</th>
                                                
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            <?php
                                                $i = 1;
                                                    foreach($desig_data as $val){ ?>
                                                <tr>
                                                    <td><?=$i++;?></td>
                                                    <td><?= $val['dept_name_hi'].' ('.$val['dept_name_en'].')'?></td>
                                                    <td><?= $val['designation_name_hindi'].' ('.$val['designation_name_eng'].')'?></td>

                                                    <td><a class="btn btn-sm btn-primary" href="<?=base_url('Ediary-Edit-designation')?>?designation_id=<?=$val['designation_id']?>">Update</a></td>

                                                   <!--  <td><?= $val['designation_name_eng'].' ('.$val['designation_name_eng'].')'?></td> -->
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