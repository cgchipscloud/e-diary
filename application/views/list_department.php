
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
                                        <li class="breadcrumb-item active">List-Department</li>
                                    </ol>
                                </div>
                                <div class="col-auto align-self-center">
                                    <a class="btn btn-sm btn-primary" href="<?=base_url('Add-Department')?>"><i data-feather=briefcase class="align-self-center menu-icon"></i><span>&nbsp;Add-Department</span></a>
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
                                    <table id="datatables_list" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Department Name (Hindi)</th>
                                            <th>Department Name (English)</th>
                                            
                                        </tr>
                                        </thead>
    
    
                                        <tbody>
                                            <?php
                                                $i = 1;
                                                foreach($dept_data as $val){ ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?= $val['dept_name_hi']?></td>
                                                <td><?= $val['dept_name_en']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
    
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
            </div>