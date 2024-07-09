<?php
if (isset($info)) {
foreach ($info as $key => $row) {
   
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/bootstrap-rtl.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/hover-min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/slick-theme.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/all.min.css">
<link rel="shortcut icon" href="<?php echo base_url() ?>files/logo.png">

<title>آهو » ویرایش اطلاعات کاربر</title>
</head>

<body class="bg-signup">
			<div class="container align-su-custom">
				<div class="row d-flex justify-content-center">
					<div class="d-flex justify-content-center mt-3 txt-color">
						<div class="col-12">
							<div class="card border-0 shadow-cu-lse">
								<div class="card-body review2">
									<form style="width: 350px" class="plc-font-size" method="post" action="<?php echo base_url() ?>index.php/ahooController/updateInformation">
										<div class="col-12 text-center text-dark mb-3">
											<h5 style="font-family: iybd">ویرایش اظلاعات</h5>
										</div>
										<div class="form-group mb-2">
											<p class="mb-1"> نام </p>
											<?php echo form_input('fname',$row['fname'],'class="form-control"; placeholder="نام خود را وارد کنید ..."'); ?> 
											<font color=red><?php echo form_error('fname');?></font>
										</div>
										<div class="form-group mb-2">
											<p class="mb-1"> نام خانوادگی </p>
											<?php echo form_input('lname',$row['lname'],'class="form-control"; placeholder="نام خانوادگی خود را وارد کنید ..."'); ?> 
											<font color=red><?php echo form_error('lname');?></font>
										</div>
										<div class="form-group mb-2">
											<p class="mb-1"> پست الکترونیکی </p>
											<input class="form-control" type="text" name="email" id="email" value=<?php echo $row["email"];  ?> placeholder="پست الکترونیکی خود را وارد کنید ...">
											<font color=red><?php echo form_error('email');?></font>
											
										</div>
										<div class="form-group mb-2">
											<p class="mb-1"> نام کاربری </p>
											<input class="form-control" type="text" name="user" id="user" value=<?php echo $row["user"];  ?> placeholder="نام کاربری مورد نظر را وارد کنید ...">
											<font color=red><?php echo form_error('user');?></font>
											
										</div>
										<div class="form-group mb-2">
											<p class="mb-1">رمز عبور </p>
											<input class="form-control" type="text" name="pass" id="pass" value=<?php echo $row["pass"];  ?> placeholder="رمز عبور مورد نظر را وارد کنید ...">
											<font color=red><?php echo form_error('pass');?></font>
											
										</div>
<!--
										<div class="form-group mb-2">
											<p class="mb-1"> تکرار رمز عبور </p>
											<input class="form-control" type="text" placeholder="رمز عبور را تکرار کنید ...">
										</div>
-->
										<input class="btn signup-btn py-2" style="width: 350px" type="submit" name="submit" id="submit" value="ویرایش اطلاعات">									
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
</body>
	
	<?php }} ?>
	
	
<script src="<?php echo base_url() ?>js/all.min.js"></script>
<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url() ?>js/slick.min.js"></script>
<script src="<?php echo base_url() ?>js/myscripts.js"></script>
<script src="<?php echo base_url() ?>js/popper.min.js"></script>
</html>
