        
<?php 
if(isset($_GET['dept_id']) && !empty($_GET['dept_id']))
{

  $dept_id =$_GET['dept_id'];

  $query = "SELECT d.dept_id,sc.id,sc.sub_category_name_hi, d.fk_dept_category_id,mdept.category_name_eng,mdept.sequence, d.dept_name_en, d.order_id, d.dept_name_hi FROM mst_department d
left join mst_dept_category mdept on d.fk_dept_category_id= mdept.sequence
LEFT JOIN sub_category sc ON  d.fk_sub_category_id=sc.id where d.dept_id=" .$dept_id;
    $data = $this->db->query($query)->row_array();
  //print_r($data);exit();
}
?>
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
                                        <li class="breadcrumb-item active">Update-Department</li>
                                    </ol>
                                </div>
                                 <div class="col-auto align-self-center">
                                    <a class="btn btn-sm btn-primary" href="<?=base_url('Ediary-List-Department')?>"><i data-feather=users class="align-self-center menu-icon"></i><span>&nbsp;List-Department</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                <form action="<?= base_url(); ?>Ediary-Update-department" enctype="multipart/form-data" method="post">  
                                    <div class="row"> 

                                    <input type="hidden" name="dept_id" id="dept_id" value="<?php echo $data['dept_id'];?>">
                                    <input type="hidden" name="subcate_id" id="subcate_id" 
                                     value="<?php echo $data['id'];?>">

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label text-right">Department Category Name</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="category_id" name="fk_dept_category_id" required="">
                                                        <?php if(!empty($data['sequence'])){?>
                                                    <option value="<?=$data['sequence'] ?>"><?= $data['category_name_eng'] ?></option>
                                                    <?php }?>
                                                    <option value="">Select Department Category Name</option>
                                                    <?php foreach ($dept_cate as $val) { ?>
                                                        <option value="<?=$val['sequence'] ?>"><?= $val['category_name_eng'].' ('.$val['category_name_hin'].')' ?></option>
                                                      <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                         </div>

                                         <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label text-right">Sub-category Name</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="subcategory_id" name="subcategory_id" required="">
                                                    <?php if(!empty($data['id'])){?>
                                                    <option value="<?=$data['id'] ?>"><?= $data['sub_category_name_hi'] ?></option>
                                                    <?php }?>
                                                    <option value="">Select Sub-category Name</option>
                                                   
                                                    </select>
                                                </div>
                                            </div>
                                         </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label text-right">Order Number</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" placeholder="विभाग का क्रम लिखें " type="text" id="example-text-input" name="order_id" type="text" required="" value="<?php echo $data['order_id'];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label text-right">Department Name(Hindi)</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" placeholder="विभाग का नाम हिंदी में लिखें " type="text" id="example-text-input" name="dept_name_hi" type="text" required="" value="<?php echo $data['dept_name_hi'];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label text-right">Department Name(English)</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" placeholder="Department Name write in English" type="text" id="example-text-input" name="dept_name_en" type="text"  value="<?php echo $data['dept_name_en'];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-sm-12 text-right">
                                                    <button type="submit" class="btn btn-primary px-4">Save</button>
                                                     <button type="clear" class="btn btn-warning px-4">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end row -->

                                </form>    <!-- end form -->

                                <!-- start data table -->

                                <!-- end data table -->

                                </div>
                            </div>
                        </div>
                    </div>
            </div>