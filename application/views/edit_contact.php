<!DOCTYPE html>
<html lang="en">
<?php include('admin_includes/head.php'); ?>
<body class="sidebar-dark">
	<div class="main-wrapper">
		<?php include('admin_includes/sidebar.php'); ?>
		<div class="page-wrapper">
			<?php include('admin_includes/header.php'); ?>
			<div class="page-content">
				<section>
					<!-- <form class="forms-sample"> -->
					<div class="container-fluid">
						<div class="row card">
							<div class="col-md-12 card-body">
								<?php if ($this->session->flashdata('error')) { ?>
									<div class="alert alert-warning"><?php echo $this->session->flashdata('error'); ?></div>
								<?php } ?>
								<?php if ($this->session->flashdata('success')) { ?>
									<div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
									<?php redirect(base_url()."helpdesk-admin-users","refresh"); ?>
								<?php  } ?>
								<form class="forms-sample" method="post" >
									<div class="form-group">
										<label >मोबाइल न. / यु.आई.डी.</label>
										<input class="form-control" type="text" id="id" placeholder="मोबाइल न. या यु.आई.डी. दर्ज करें" required name="id">
										<p style="position: absolute;display:none;color:red" id="msg">कृपया मोबाइल न. या यु.आई.डी. दर्ज करें</p>
									</div>
									<div class="flex-wrap form-group">
										<button type="button" id="search" class="btn btn-success mr-2">Search</button>
									</div>
								</form>
								<form class="forms-sample" >
									<div class="form-group">
										<label>Scheme</label>
										<select name="scheme_id" id="scheme_id">
											<option value="">Select Scheme</option>
											<?php foreach($scheme as $value){?>
												<option value="<?= $value['scheme_id']?>"><?= $value['scheme_name']?></option>
											<?php }?>
										</select>										
									</div>
									<div class="form-group">
										<label>District</label>
										<select name="district_id" id="district_id">
											<option value="">Select Distirct</option>
											<?php foreach($district as $value){?>
												<option value="<?= $value['district_code']?>"><?= $value['district_name_eng']?></option>
											<?php }?>
										</select>
										<p style="position: absolute;display:none;color:red" id="msg2">Select Scheme or District</p>
									</div>
									<div class="flex-wrap form-group">
										<button type="button" id="search2" class="btn btn-success mr-2">Search</button>
									</div>
								</form>
								<?php if(isset($_GET['var'])) 
								{
									$tempUrlData = explode("_",base64_decode(urldecode($_GET['var'])));
								?>
								<form class="forms-sample" action="<?= base_url('admin-user-password-reset'); ?>" method="post" >
									<input type="hidden" name="id" value="<?=$details->id ?>">
									<div class="form-group">
										<label >योजना</label>
										<input class="form-control" type="text" name="scheme" readonly value="<?=$details->scheme_name ?>">
									</div>
									<div class="form-group">
										<label >कर्मचारी का नाम</label>
										<input class="form-control" type="text" readonly value="<?=$details->full_name ?>">
									</div>
									<div class="form-group">
										<label >मोबाइल न.</label>
										<input class="form-control" type="text" readonly value="<?= $details->mobile_no ?>">
									</div>
									<div class="form-group">
										<label >यु.आई.डी.</label>
										<input class="form-control" type="text" readonly  value="<?= $details->admin_user ?>">
									</div>
									<div class="form-group">
										<label >पासवर्ड</label>
										<input class="form-control" type="text" autocomplete="off" id="password" placeholder="" required name="password">
									</div>
									<div class="flex-wrap form-group">
										<button type="subkit" id="search" class="btn btn-info mr-2">Password Reset</button>
									</div>
								</form>
								<?php } ?>
								<div class="table-responsive">
									<table id="dataTableExample" class="table">
										<thead>
											<tr>
												<th>क्र.</th>
												<th>यु.आई.डी.</th>
												<th>मोबाइल न.</th>
												<th>कर्मचारी का नाम</th>
												<th>जिला</th>
												<th>भूमिका</th>												
												<th>योजना</th>
												<th>विभाग</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody id="tBody">
											<?php $i = 1; foreach ($admin_users as $value){?>
												<tr>
													<td><?= $i++ ?></td>
													<td style="font-weight:bold"><?= $value['admin_user']?></td>
													<td><?= $value['mobile_no']?></td>
													<td><?= $value['full_name']?></td>													
													<td><?= $value['district_name_eng']!=null?$value['district_name_eng']:"No Given"?></td>
													<td><?= $value['role']?></td>
													<td><?= $value['scheme_name']!=null?$value['scheme_name']:""?></td>
													<td><?= $value['department_name_hi']!=null?$value['department_name_hi']:""?></td>
													<td class="text-center">
														<?php $data = urlencode(base64_encode($value['id'])) ?>
														<a href="<?= base_url()?>helpdesk-admin-users?var=<?= $data?>" class="btn btn-primary btn-xs reset_password" >Password Resest</a>
													</td>
												</tr>
											<?php  } ?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- body close -->
						</div>
						<!-- row close -->
					</div>
					<!-- container close -->
					<?php include('admin_includes/footer.php'); ?>
					<!-- </form> -->
				</section>
			</div>
		</div>
	</div>
	<?php include('admin_includes/foot_js.php'); ?>
	<script>
		$(document).ready(function(){
			function ajaxCall($val, $temp){
				$.ajax({
					type: 'POST',
					//contentType: "application/json; charset=utf8",
					url : '<?php echo base_url('get-admin-users-helpdesk'); ?>',
					data: {'data':$val,'temp':$temp},
					datatype : 'html',
					success: function(res)
					{
						var data = JSON.parse(res);
						$temp = "";
						if(res)
						{
							$("#dataTableExample").dataTable().fnDestroy();
							$j=1;
							for($i=0;$i<data.length;$i++)
                    		{	
								$dTemp = data[$i]['district_name_eng']!=null?data[$i]['district_name_eng']:"Not Given";
								$tmpUrldata = "<?= base_url()?>helpdesk-admin-users?var="+encodeURI(window.btoa(escape(data[$i]['id'])));
								$tmpUrl = "<a href="+$tmpUrldata+" class=\"btn btn-primary btn-xs reset_password\" >Password Resest</a>";
								$tmpDept = data[$i]['department_name_hi']!=null?data[$i]['department_name_hi']:"";
								$tmpScheme = data[$i]['scheme_name']!=null?data[$i]['scheme_name']:"";
								$temp+="<tr>"
										+"<td>"+($j++)+"</td>"																									
										+"<td style=\"font-weight:bold\">"+data[$i]['admin_user']+"</td>"
										+"<td>"+data[$i]['mobile_no']+"</td>"
										+"<td>"+data[$i]['full_name']+"</td>"
										+"<td>"+$dTemp+"</td>"
										+"<td>"+data[$i]['role']+"</td>"	
										+"<td>"+$tmpScheme+"</td>"
										+"<td>"+$tmpDept+"</td>"
										+"<td class=\"text-center\">"+$tmpUrl+"</td>"
									"</tr>";
							}											
							$('#tBody').html($temp);
							$("#dataTableExample").dataTable({
								dom: 'Bfrtip',
								buttons: [
									'excel', 'print'
								]
							});			
						}
						else
							alert("Try again");
					} 
					,error:function(xhr){
						alert(xhr.status);
					}
				});
			}
			$("#search").on("click", function(){
				$val = $("#id").val();
				if($val!=""){
					$('#msg').hide();
					ajaxCall($val,'0');
				}
				else{
					$('#msg').show();
				}
			});
			$("#search2").on("click", function(){
				$scheme_id = $("#scheme_id").val();
				$district_id = $("#district_id").val();
				$val = [$scheme_id,$district_id];
				if($scheme_id!="" && $district_id!=""){
					$('#msg2').hide();
					ajaxCall($val,'1');
				}
				else if($scheme_id!=""){
					$('#msg2').hide();
					ajaxCall($scheme_id,'2');					
				}
				else if($district_id!=""){
					$('#msg2').hide();
					ajaxCall($district_id,'3');					
				}
				else{
					$('#msg2').show();
				}
			});
		});
	</script>
</body>
</html>