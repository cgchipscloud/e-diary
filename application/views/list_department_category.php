
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
                                        <li class="breadcrumb-item active">List-Department-Category</li>
                                    </ol>
                                </div>
                                <div class="col-auto align-self-center">
                                    <a class="btn btn-sm btn-primary" href="<?=base_url('Ediary-Add-Daepartment-Category')?>"><i data-feather=briefcase class="align-self-center menu-icon"></i><span>&nbsp;Add-Department-Category</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Department Category List</h4>
                                   
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <table id="datatables_list" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Sequence Number</th>
                                            <th>Department Category Name (English)</th>
                                            <th>Department Category Name (Hindi)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 1;
                                                foreach($dept_category as $val){ ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?= $val['sequence']?></td>
                                                <td><?= $val['category_name_eng']?></td>
                                                <td><?= $val['category_name_hin']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
    
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
            </div>