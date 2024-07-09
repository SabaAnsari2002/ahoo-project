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

<title>آهو » ورود به حساب کاربری</title>
</head>

<body class="bg-login">
			<div class="container align-custom">
				<div class="row d-flex justify-content-center">
					<div class="d-flex justify-content-center mt-3 txt-color">
						<div class="col-12">
							<div class="card border-0 shadow-cu-lse">
								<div class="card-body review2">
									<form style="width: 350px" class="plc-font-size" method="post" action="<?php echo base_url() ?>index.php/ahooController/signIn">
										<div class="col-12 text-center text-dark mb-3">
											<h5 style="font-family: iybd">ورود</h5>
										</div>
										<p>
										  <?php
	                                    if($this->session->flashdata('error')){
											echo '<font color="red">'.$this->session->flashdata('error').'</font>';
										}
	                                    ?>
										<br>	
									  </p>
										<div class="form-group mb-2">
										  <p class="mb-1"> پست الکترونیکی یا نام کاربری </p>
											<input class="form-control" type="text" name="user" id="user" autocomplete="off" placeholder="پست الکترونیکی یا نام کاربری ...">
										</div>
									  <div class="form-group mb-2">
										<p class="mb-1"> رمز عبور </p>
										  <p>
											  <input class="form-control" type="password" name="pass" id="pass" autocomplete="off" placeholder="رمز عبور خود را وارد کنید ...">
									    </p>
										</div>
									    <input  class="btn login-btn py-2" style="width: 350px" type="submit" name="submit" id="submit" value="ورود">
										
										<div class="col-12 text-center text-dark mt-2">
											<a href="<?php echo base_url() ?>index.php/ahooController/insertUserData">هنوز ثبت نام نکرده اید؟ ثبت نام </a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
</body>
	
	
	
	
<script src="<?php echo base_url() ?>js/all.min.js"></script>
<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url() ?>js/slick.min.js"></script>
<script src="<?php echo base_url() ?>js/myscripts.js"></script>
<script src="<?php echo base_url() ?>js/popper.min.js"></script>
</html>