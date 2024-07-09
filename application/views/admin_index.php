

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

<title>آهو » ادمین</title>
</head>

<body>
<?php
if (isset($info)) {
foreach ($info as $key => $row) {
   
?>
	
	<!-- Start Header -->
	
	<header class="bg-navbar">
		<div class="container">
			<nav class="navbar navbar-light px-0">
				<a href="<?php echo base_url() ?>index.php/ahooController/adminIndex" class="navbar-brand">
					<img src="<?php echo base_url() ?>files/logo3.png" height="85px" alt="Logo">
				</a>
				<form action="<?php echo base_url('index.php/ahooController/loginSimpleSearchPoem'); ?>" method="post">
                   <div class=" nav-item form-group ml-0 d-flex flex-row hsearch mb-0">
                       <input type="search" name="poem" class="form-control mr-sm-2 rounded-pill border-0 pt-1 pb-1" aria-label="Search" placeholder="کلمه مورد نظر خود را وارد کنید ..." style="width: 400px">
                       <button class="btn btn-outline-primary my-2 my-sm-0 rounded-start" type="submit"> <i class="fa fa-search align-middle" style="font-size: 13px"></i> </button>
                   </div>
				</form>							
				<div class="d-flex align-items-center justify-content-between align-content-center navbar-expand-sm">
					<ul class="navbar-nav text-center ml-auto d-flex flex-row menu">
						<li class="nav-item dropdown"> 
							<a href="#" class="nav-link fsz-nav" id="navbardrop1" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-person-circle align-items-center" viewBox="0 0 16 16">
								  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
								  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
								</svg> 
								 <?php
	                             echo $row['fname']; 
								 echo ' ';
	                             echo $row['lname'];
	                             ?>
							</a>
							<div class="dropdown-menu border-0 text-right shadow-sm dropdown-menu-center">
								<a href="<?php echo base_url('index.php/ahooController/goToIndex/'.$row['id'])  ?>" class="dropdown-item d-flex justify-content-center">درج شعر</a>
								<a href="<?php echo base_url() ?>index.php/ahooController/showAllPoem" class="dropdown-item d-flex justify-content-center">ویرایش شعر</a>
								<a href="<?php echo base_url() ;}} ?>index.php/ahooController/showUserInformation" class="dropdown-item d-flex justify-content-center">ویرایش اطلاعات</a>
								<a href="<?php echo base_url() ?>index.php/ahooController" class="dropdown-item d-flex justify-content-center">خروج از حساب کاربری</a>

							</div>
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
					<form class="d-flex justify-content-center align-items-center text-center" method="post" action="<?php echo base_url()?>index.php/ahoocontroller/logedinSearch">
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
	
	<!-- Start Poets  -->
	<main>
		<div class="bg-white mt-5">
			<div class="container">
				<div class="row">
					<div class="col-12 d-flex flex-row justify-content-between">
						<div class="d-flex justify-content-center align-items-center text-center pl-4">
							<a href="<?php echo base_url() ?>index.php/ahooController/loginInsidePoet/7">
								<div class="imgcu imgcu2">
									<img src="<?php echo base_url() ?>files/Sohrab.jpg" alt="Sohrab" width="122px">
									<div class="imghcolor"></div>
									<div class="imgtxt">
										<p class="mb-0"> سهراب سپهری</p>
									</div>
								</div>
							</a>
						</div>
						<div class="d-flex justify-content-center align-items-center text-center pl-4">
							<a href="<?php echo base_url() ?>index.php/ahooController/loginInsidePoet/2">
								<div class="imgcu imgcu2">
									<img src="<?php echo base_url() ?>files/Khayam.jpg" alt="khayiam" width="122px">
									<div class="imghcolor"></div>
									<div class="imgtxt">
										<p class="mb-0">خیام</p>
									</div>
								</div>
							</a>
						</div>
						<div class="d-flex justify-content-center align-items-center text-center pl-4">
							<a href="<?php echo base_url() ?>index.php/ahooController/loginInsidePoet/4">
								<div class="imgcu imgcu2">
									<img src="<?php echo base_url() ?>files/Molana.jpg" alt="molana" width="122px">
									<div class="imghcolor"></div>
									<div class="imgtxt">
										<p class="mb-0">مولانا</p>
									</div>
								</div>
							</a>
						</div>
						<div class="d-flex justify-content-center align-items-center text-center pl-4">
							<a href="<?php echo base_url() ?>index.php/ahooController/loginInsidePoet/1">
								<div class="imgcu imgcu2">
									<img src="<?php echo base_url() ?>files/Hafez.jpg" alt="hafez" width="170px">
									<div class="imghcolor"></div>
									<div class="imgtxt">
										<p class="mb-0">حافظ</p>
									</div>
								</div>
							</a>
						</div>
						<div class="d-flex justify-content-center align-items-center text-center pl-4">
							<a href="<?php echo base_url() ?>index.php/ahooController/loginInsidePoet/6">
								<div class="imgcu imgcu2">
									<img src="<?php echo base_url() ?>files/Saadi.jpg" alt="Saadi" width="122px">
									<div class="imghcolor"></div>
									<div class="imgtxt">
										<p class="mb-0">سعدی</p>
									</div>
								</div>
							</a>
						</div>
						<div class="d-flex justify-content-center align-items-center text-center pl-4">
							<a href="<?php echo base_url() ?>index.php/ahooController/loginInsidePoet/3">
								<div class="imgcu imgcu2">
									<img src="<?php echo base_url() ?>files/Hooshang.jpg" alt="ebtehaj" width="122px">
									<div class="imghcolor"></div>
									<div class="imgtxt">
										<p class="mb-0">هوشنگ ابتهاج</p>
									</div>
								</div>
							</a>
						</div>
						<div class="d-flex justify-content-center align-items-center text-center4">
							<a href="<?php echo base_url() ?>index.php/ahooController/loginInsidePoet/5">
								<div class="imgcu imgcu2">
									<img src="<?php echo base_url() ?>files/farrokhi.jpg" alt="farokhi" width="122px">
									<div class="imghcolor"></div>
									<div class="imgtxt">
										<p class="mb-0">فرخی یزدی</p>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

	<!-- End Poets -->

	<!-- Start Little Poem  -->

		<div class="grbg1 py-5 mt-5">
			<div class="container">
				<div class="row d-flex justify-content-center mb-3">
					<div class="col12 text-center text-white">
						<h4>لحظه ی ماندگار ...</h4>
					</div>
				</div>
				<div class=" d-flex justify-content-center">
					<div class="bg-white py-4 bg-radius flex-row text-center" style="width: 600px">
						<div class="col-12 d-flex justify-content-center align-items-center">
							<div class="col-6">
								<p style="text-align: left">اگر ایران به جز ویران سرا نیست</p>
							</div>
							<div class="col-6">
								<p style="text-align:right">من این ویران سرا را دوست دارم</p>
							</div>
						</div>
						<div class="col-12 d-flex justify-content-center align-items-center">
							<div class="col-6">
								<p style="text-align: left">اگر تاریخ ما افسانه رنگ است</p>
							</div>
							<div class="col-6">
								<p style="text-align:right">من این افسانه ها را دوست دارم</p>
							</div>
						</div>
						<div class="col-12 d-flex justify-content-center align-items-center">
							<div class="col-6">
								<p style="text-align: left">نوای نای ما گر جان گداز است</p>
							</div>
							<div class="col-6">
								<p style="text-align:right">من این نای و نوا را دوست دارم</p>
							</div>
						</div>
						<div>
							<a href="#" class="a-txt-clr">شهریار</a>				
						</div>
					</div>
				</div>
			</div>
		</div>

	<!-- End Little Poem -->

	<!-- Start Ghazal  -->

		<div class="mt-5">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-12 text-center text-dark">
						<h4 style="font-family: iybd">غزلی از حافظ ...</h4>
					</div>
					<div class="d-flex justify-content-center mt-3">
						<div class="text-center">
							<p class="lh">ای نسیم سحر آرامگه یار کجاست؟
								<br>منزلِ آن مه عاشق‌کش عیّار کجاست؟
								<br>شب تار است و ره وادی ایمن در پیش
								<br>آتش طور کجا موعد دیدار کجاست؟
								<br>هر که آمد به جهان نقش خرابی دارد
								<br>در خرابات بگویید که هشیار کجاست؟
								<br>آن‌کس است اهل بشارت که اشارت داند
								<br>نکته‌ها هست بسی محرم اسرار کجاست؟
								<br>هر سر موی مرا با تو هزاران کار است
								<br>ما کجاییم و ملامت‌گر بی‌کار کجاست؟
								<br>باز پرسید ز گیسوی شکن در شکنش
								<br>کاین دل غم‌زده سرگشته گرفتار کجاست؟
								<br>عقل دیوانه شد آن سلسله مشکین کو؟
								<br>دل ز ما گوشه گرفت ابروی دلدار کجاست؟
								<br>ساقی و مطرب و می جمله مهیاست ولی
								<br>عیش بی‌یار مهیّا نشود یار کجاست؟
								<br>حافظ از باد خزان در چمنِ دهر مرنج
								<br>فکرِ معقول بفرما گل بی‌خار کجاست؟
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	<!-- End Ghazal -->

	<!-- Start Audio Player  -->

		<div class="grbg2 py-5 mt-2">
			<div class="container">
				<div class="row d-flex justify-content-center mb-3">
					<div class="col12 text-center text-white">
						<h4>با چشمان بسته ...</h4>
					</div>
				</div>
				<div class="d-flex justify-content-center">
					<audio controls preload="metadata">
						<source src="<?php echo base_url() ?>files/Audio.mp3" type="audio/mpeg">
					</audio>
				</div>
				<div class="text-white text-center mt-4">
					<p>غزل شماره 357 حافظ
					<br>با خوانش فریدون فرح اندوز</p>
				</div>
			</div>
		</div>
		
	<!-- End Audio Player  -->

	
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
						<li class="nav-item"> <a href="<?php echo base_url() ?>index.php/ahooController/loginInsidePoet/1" class="nav-link pt-0 pr-0 dtf"> حافظ </a> </li>
						<li class="nav-item"> <a href="<?php echo base_url() ?>index.php/ahooController/loginInsidePoet/6" class="nav-link pt-0 pr-0 dtf"> سعدی </a> </li>
						<li class="nav-item"> <a href="<?php echo base_url() ?>index.php/ahooController/loginInsidePoet/2" class="nav-link pt-0 pr-0 dtf"> خیام </a> </li>
						<li class="nav-item"> <a href="<?php echo base_url() ?>index.php/ahooController/loginInsidePoet/7" class="nav-link pt-0 pr-0 dtf"> سهراب </a> </li>
						<li class="nav-item"> <a href="<?php echo base_url() ?>index.php/ahooController/loginInsidePoet/4" class="nav-link pt-0 pr-0 dtf"> مولانا </a> </li>
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
