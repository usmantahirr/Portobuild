<!DOCTYPE HTML>
<html ng-app="SideMenuTheme">
	<head ng-controller="UserController">
		<title>{{user.username}}</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!-- Gallery -->
		<link rel="stylesheet" type="text/css" media="all" href="./gallery/css/font-awesome.min.css" />
	    <link rel="stylesheet" type="text/css" media="all" href="./gallery/css/jgallery.min.css" />
	    <script type="text/javascript" src="./gallery/js/tinycolor-0.9.16.min.js"></script>
	    <script type="text/javascript" src="./gallery/js/jgallery.min.js"></script>

		<!-- FancyBox Files -->
		<script type="text/javascript" src="../../_lib/fancyBox/jquery.mousewheel-3.0.6.pack.js"></script>
		<script type="text/javascript" src="../../_lib/fancyBox/jquery.fancybox.pack.js"></script>
		<script type="text/javascript" src="../../_lib/jquery.easing.1.3.js"></script>
		<link rel="stylesheet" type="text/css" href="../../_lib/fancyBox/jquery.fancybox.css" media="screen" />
		
		<script type="text/javascript" src="modal/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="modal/css/bootstrap.css" media="screen" />
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->

		<!-- Angular Includes -->
		<script type="text/javascript" src="../../_lib/angular.min.js"></script>
		<script type="text/javascript" src="js/themeSettings.js"></script>
	</head>
	<body ng-controller="UserController">

		<!-- Header -->
			<div id="header" >
						
				<!-- Logo -->
					<h1><a href="index.pph" id="logo"><em>Hii!!</em> I am "{{user.first_name}} {{user.last_name}}"</a></h1>
				
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="#intro">Intro</a></li>
							<li><a href="#portfolio">Portfolio</a></li>
							<li><a href="#about">About Me</a></li>
							<li><a href="#contact">Contact</a></li>
						</ul>
					</nav>
			</div>
			
		<!-- Banner -->
			<section id="banner" style="background-image: url('{{user.best_pic_1}}')">
				<header>
					<h2>I am a <strong>{{user.profession}}</strong>, {{user.define_myself}}</h2>
					<a href="#portfolio" class="button">Check my work</a>
				</header>
			</section>

		<!-- Portfolio -->
			<section class="wrapper style1">
				<article id="portfolio">
					<header class="major">
						<h2>Portfolio</h2>
						<p>{{user.portfolio_info}}</p>
					</header>
					<div style="margin-left: 10px;">
						<article ng-controller="GalleryController">
							<div id="gallery">
							    <div ng-repeat="item in galleryData.albums" class="album" data-jgallery-album-title="{{item.name}}">
		               		 		<div ng-repeat="imgs in item.images" on-finish-render>{{item.name}}
		                				<a href="{{imgs.url}}"><img src="{{imgs.thumb}}" alt=""  data-jgallery-bg-color="{{imgs.color}}" data-jgallery-text-color="#fff" /></a>
						      		</div>
						     	</div>
		          			</div>
						</article>
					</div>
					<footer>
						<a href="#contact" class="button button-big" style="margin: 30px 40%;">Get in touch with me</a>
					</footer>
				</article>
			</section>

		<!-- About -->
			<section class="wrapper style2">
				<div class="container" id="about">
					<header class="major">
						<h2>About</h2>
						<p>{{user.about_me}}</p>
					</header>
					<div class="row">
						<div class="12u">
							<img style="width: 100%;" src="{{user.best_pic_2}}" alt="" />
						</div>
					</div>
					<footer>
						<a href="#portfolio" class="button" style="margin: 30px 40%;">look for my Work</a>
					</footer>
				</div>
			</section>
	<!-- Footer -->
			<div id="footer">
				<div class="container">
					<h2 style="margin: 10px 40%;">Get in Touch</h2>
					<div class="row">
						<div class="12u">
							<form method="post" action="#">
								<div>
									<div class="row half">
										<div class="6u">
											<input type="text" name="name" id="name" placeholder="Name" />
										</div>
										<div class="6u">
											<input type="text" name="email" id="email" placeholder="Email" />
										</div>
									</div>
									<div class="row half">
										<div class="12u">
											<input type="text" name="subject" id="subject" placeholder="Subject" />
										</div>
									</div>
									<div class="row half">
										<div class="12u">
											<textarea name="message" id="message" placeholder="Message"></textarea>
										</div>
									</div>
									<div class="row">
										<div style="margin: 10px 35%;" class="6u">
											<a href="#" class="button form-button-submit">Send Message</a>
											<a href="#" class="button button-alt form-button-reset">Clear Form</a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- Icons -->
					<ul class="icons">
						<li><a href="http:\\{{user.facebook_id}}" class="fa fa-twitter solo"></a></li>
						<li><a href="http:\\{{user.twitter_id}}" class="fa fa-facebook solo"></a></li>
						<li><a href="http:\\{{user.github_id}}" class="fa fa-github solo"></a></li>
						<li><a href="http:\\{{user.dribbble_id}}" class="fa fa-dribbble solo"></a></li>
						<li><a href="http:\\{{user.email_address}}" class="fa fa-envelope solo"></a></li>
					</ul>

				<!-- Copyright -->
					<footer style="margin-left: 20px;">
						<ul id="copyright">
							<li>&copy; 2014 Portobuild</li>
						</ul>
					</footer>

			</div>

	</body>
</html>