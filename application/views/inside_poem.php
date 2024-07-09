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
	
		    <?php foreach (json_decode($data2, true) as $row): ?>
	    <?php foreach (json_decode($data3, true) as $poet): ?>
<title>آهو » <?php echo $poet['poet_name']; ?> » <?php echo $row['name']; ?></title>
</head>

<body>
	
	<!-- Start Header -->
	
	<header class="bg-navbar shadow-lg">
		<div class="container">
			<nav class="navbar navbar-light px-0">
				<a href="<?php echo base_url() ?>index.php/ahooController" class="navbar-brand">
					<img src="<?php echo base_url() ?>files/logo3.png" height="85px" alt="Logo">
				</a>
				<form action="<?php echo base_url('index.php/ahooController/simpleSearchPoem'); ?>" method="post">
                   <div class=" nav-item form-group ml-0 d-flex flex-row hsearch mb-0">
                       <input type="search" name="poem" class="form-control mr-sm-2 rounded-pill border-0 pt-1 pb-1" aria-label="Search" placeholder="کلمه مورد نظر خود را وارد کنید ..." style="width: 400px">
                       <button class="btn btn-outline-primary my-2 my-sm-0 rounded-start" type="submit"> <i class="fa fa-search align-middle" style="font-size: 13px"></i> </button>
                   </div>
				</form>							
				<div class="d-flex align-items-center justify-content-between align-content-center">
					<ul class="navbar-nav text-center ml-auto d-flex flex-row">
						<li class="nav-item logbtn pr-3 pl-3">
							<a class="nav-link" href="<?php echo base_url() ?>index.php/ahooController/goToIndex/10">
								<i class="fa fa-angle-double-left align-middle" style="font-size: 13px"></i>
								ورود</a>
						</li>
						<li class="nav-item signbtn pr-4 pl-4 mr-2">
							<a class="nav-link" href="<?php echo base_url() ?>index.php/ahooController/goToIndex/20">
								<i class="fa fa-plus align-middle" style="font-size: 12px"></i>
								ثبت نام</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>
	
	<!-- End Header -->

	
	<!-- Start Pro Search -->
	
	<div class="bg-white py-3 mt-3">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<form class="d-flex justify-content-center align-items-center text-center" method="post" action="<?php echo base_url()?>index.php/ahoocontroller/search">
						<select class="custom-select ml-3 select-custom" id="filter" name="poetField" >
							<option value="" selected>نام شاعر ...</option>
							<option value="حافظ">حافظ</option>
							<option value="سعدی">سعدی</option>
							<option value="خیام">خیام</option>
							<option value="مولانا">مولانا</option>
							<option value="هوشنگ ابتهاج">هوشنگ ابتهاج</option>
							<option value="فرخی یزدی">فرخی یزدی</option>
							<option value="سهراب سپهری">سهراب سپهری</option>
						</select>
						<select class="custom-select ml-3 select-custom" id="filter" name="formField" >
							<option value="" selected>قالب شعری ...</option>
							<option value="مثنوی">مثنوی</option>
							<option value="غزل">غزل</option>
							<option value="رباعی">رباعی</option>
							<option value="کلاسیک و نیمایی">کلاسیک و نیمایی</option>
						</select>
						<select class="custom-select ml-3 select-custom" id="filter" name="bookField">
							<option value="" selected>نام اثر ...</option>
							<option value="دیوان حافظ">دیوان حافظ</option>
							<option value="رباعیات خیام">رباعیات خیام</option>
							<option value="آینه در آینه">آینه در آینه</option>
							<option value="سیاه مشق">سیاه مشق</option>
							<option value="تاسیان">تاسیان</option>
							<option value="مثنوی معنوی">مثنوی معنوی</option>
							<option value="دیوان شمس">دیوان شمس</option>
							<option value="دیوان اشعار">دیوان اشعار</option>
							<option value="بوستان">بوستان</option>
							<option value="حجم سبز">حجم سبز</option>
							<option value="مرگ رنگ">مرگ رنگ</option>
						</select>
						<button type="submit" class="btn btn-block search-ctgr-btn mt-2" id="search" name="search" value="submit" > جستجو</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!-- End Pro Search -->
	
	<!-- Start Image -->
	 
	<div class="imgm d-flex justify-content-center">
		<img src="<?php echo base_url() ?>files/poet<?php echo $poet['pid']; ?>.jpg" alt="<?php echo $poet['poet_name']; ?>" class="img-fluid imgcu2 imgcu" width="1360px">
		<div class="imgcolor"></div>
	</div>
		<?php endforeach; ?>

	<!-- End Image -->
	
	<!-- Start Poem -->
	
	<main>
		<div class="mt-5">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="bg-poem py-1 px-1" style="width: 650px">
						<div class="bg-poem2 py-1 px-1">
							 <div class="bg-poem3 py-1 px-1">
								 <div class="bg-poem4 py-4 px-1">
									<div class="col-12 text-center text-dark">
										<h4 style="font-family: iybd"><?php echo $row['name']; ?></h4>
										<a href="#"> <?php echo $row['book']; ?></a>
									</div>
									<div class="d-flex justify-content-center mt-3">
										<div class="flex-row text-center" style="width: 750px">
											<div class="col-12 d-flex justify-content-center align-items-center lh-ins">
												<div class="col-lg-12">
													<p style="text-align: center">
														<?php
	                                                    
	                                                    $poemhtm = htmlspecialchars_decode($row['poem']);
	                                                    echo $poemhtm;
														
														?>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>					
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
	<!-- End Poem -->
		
	<!-- Start Comments -->

		<div class="mt-5">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-12 text-center text-dark">
						<h4 style="font-family: iybd"> دیدگاه ها</h4>
					</div>
					<div class="d-flex justify-content-center mt-3">
						<div class="col-12">
							<div class="card border-0 shadow-lg" style="width: 740px">
								<div class="card-body">
									
									
										<?php
	                                    foreach (json_decode($data4, true) as $row4):    
	                                    ?>

									<div class="d-flex flex-column flex-lg-row align-items-center mb-0 review p-3 m-0 bd-btm">
										<div>
											<div class="d-flex align-items-center">
												<p class="mb-0"> <?php echo $row4['uname']; ?> </p>
											</div>
												<p><small class="d-block"> <?php echo $row4['comment_date']; ?></small></p>
												<p>
												  <small> <?php echo $row4['comment']; ?> </small></p>
										</div>
									</div>
									
									<?php endforeach; ?>
									
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	<!-- End Comments -->
	<!-- Start Write Comment -->

		<div class="mt-5">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-12 text-center text-dark">
						<h4 style="font-family: iybd">نوشتن دیدگاه</h4>
					</div>
					<div class="d-flex justify-content-center mt-3">
						<div class="col-12">
							<div class="card border-0 shadow-lg">
								<div class="card-body review2">
									<form style="width: 710px" method="post" action="<?php echo base_url('index.php/ahooController/goToIndex/10')  ?>">
										<div class="form-group">
											<p class="mb-1"> نام </p>
											<input class="form-control" name="name" type="text" placeholder="نام خود را وارد کنید ...">
										</div>
										<div class="form-group">
											<p class="mb-1"> دیدگاه </p>
											<textarea class="form-control" name="comment" cols="30" rows="7" placeholder="دیدگاه خود را وارد کنید ..."></textarea>
										</div>
									  <input class="btn comm-btn py-2" type="submit" name="submit" id="submit" value="ارسال دیدگاه">
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	<!-- End Write Comment -->
<?php endforeach; ?>		
	
	<!--Start Register -->

	<div class="register py-5">
		<div class="container">
			<div class="row flex-column flex-lg-row align-items-center justify-content-between text center">
				<div>
					<h5> با ثبت نام در آهو به جمع عاشقان شعر پارسی به پیوندید ... </h5>
				</div>
				<div class="mt-3 mt-lg-0">
					<a href="<?php echo base_url() ?>index.php/ahooController/goToIndex/20" class="btn px-4"> عضویت </a>
				</div>
			</div>
		</div>
	</div>

	<!--End Register -->	
	
	</main>	
	<!--Start Footer -->
<footer>
	<div class="footer-top py-5">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-3 text-right mb-3">
					<h6 class="ttf mb-4 h6dr" style="font-family: iybd"> درباره ما </h6>
					<p class="dtf"> این پروژه توسط دانشجویان بدبخت رشته ی کامپیوتر به ثمر رسیده است. برای رسیدن به مرحله ی نوشتن متن با محتوایی در این قسمت، به زمان کافی نیاز است. </p>
				</div>
				<div class="col-12 col-lg-3 text-right mb-3">
					<h6 class="ttf mb-4 h6dr" style="font-family: iybd"> ارتباط با ما </h6>
					<p class="d-block dtf mb-2"> تهران، بهشت زهرا، مزار شهدا </p>
					<p class="d-block dtf mb-2"> info@beheshtzahra.com </p>
					<p class="d-block dtf mb-2"> 021-9022061202 </p>
				</div>
				<div class="col-12 col-lg-3 text-right mb-3">
					<h6 class="ttf mb-4 h6dr" style="font-family: iybd"> شاعران پرطرفدار </h6>
					<ul class="nav pr-0 flex-column">
						<li class="nav-item"> <a href="<?php echo base_url() ?>index.php/ahooController/InsidePoet/1" class="nav-link pt-0 pr-0 dtf"> حافظ </a> </li>
						<li class="nav-item"> <a href="<?php echo base_url() ?>index.php/ahooController/InsidePoet/6" class="nav-link pt-0 pr-0 dtf"> سعدی </a> </li>
						<li class="nav-item"> <a href="<?php echo base_url() ?>index.php/ahooController/InsidePoet/2" class="nav-link pt-0 pr-0 dtf"> خیام </a> </li>
						<li class="nav-item"> <a href="<?php echo base_url() ?>index.php/ahooController/InsidePoet/7" class="nav-link pt-0 pr-0 dtf"> سهراب </a> </li>
						<li class="nav-item"> <a href="<?php echo base_url() ?>index.php/ahooController/InsidePoet/4" class="nav-link pt-0 pr-0 dtf"> مولانا </a> </li>
					</ul>
				</div>
				<div class="col-12 col-lg-3 text-right mb-3">
					<h6 class="ttf mb-4 h6dr" style="font-family: iybd"> عضویت در غزلنامه </h6>
					<div class="follow2 d-flex justify-content-between justify-content-lg-between">
						<div class="form-group ml-0 d-flex flex-row">
							<input pe="text" class="form-control rounded-pill py-3 border-0" placeholder="ایمیل خود را وارد کنید . . . .">
							<a href="#" class="btn text-light"> <i class="fa fa-chevron-left align-middle" style="font-size: 13px"></i> </a>

						</div>

					</div>
					<h6 class="ttf my-4 h6dr" style="font-family: iybd"> شبکه های اجتماعی </h6>
					<div class="follow">
					 	<a href="#" class="ml-3 ttf"> <i class="fab fa-telegram align-middle"></i> </a>
						<a href="#" class="ml-3 ttf"> <i class="fab fa-instagram align-middle"></i> </a>
						<a href="#" class="ml-3 ttf"> <i class="fab fa-facebook align-middle"></i> </a>
						<a href="#" class="ml-3 ttf"> <i class="fab fa-google-plus align-middle"></i> </a>
						<a href="#" class="ml-3 ttf"> <i class="fab fa-twitter align-middle"></i> </a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom py-3 fmbg">
		<div class="container">
			<div class="row d-flex flex-column flex-lg-row justify-content-center align-items-center text-center">
				<p class="mb-0 text-dark mt-2 mt-lg-0 fsz-footer"> هرگونه کپی برداری از این سایت نه از لحاظ شرعی و نه از لحاظ قانونی هیچ مشکلی ندارد </p>
			</div>
		</div>
	</div>
</footer>
	<!--End Footer -->

</body>
	
	
	
	
<script src="<?php echo base_url() ?>js/all.min.js"></script>
<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url() ?>js/slick.min.js"></script>
<script src="<?php echo base_url() ?>js/myscripts.js"></script>
<script src="<?php echo base_url() ?>js/popper.min.js"></script>
</html>
