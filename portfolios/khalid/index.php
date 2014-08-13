<!DOCTYPE HTML>
<html ng-app="SideMenuTheme">
	<head ng-controller="UserController">
		<title>{{user.username}}</title>
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600" rel="stylesheet" type="text/css" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>

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

	<!-- Body -->
	<body>
		<!-- Header -->
			<header id="header" class="skel-panels-fixed" ng-controller="UserController">

				<section class="top">

					<!-- Logo -->
						<div id="logo">
                            <span class="image avatar48"><img src="{{user.display_picture}}" alt="" /></span>
							<h1 id="title">{{user.first_name}} {{user.last_name}}</h1>
							<span class="byline">{{user.profession}}</span>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="#top" id="top-link" class="skel-panels-ignoreHref"><span class="fa fa-home">Intro</span></a></li>
								<li><a href="#portfolio" id="portfolio-link" class="skel-panels-ignoreHref"><span class="fa fa-th">Portfolio</span></a></li>
								<li><a href="#about" id="about-link" class="skel-panels-ignoreHref"><span class="fa fa-user">About Me</span></a></li>
								<li><a href="#contact" id="contact-link" class="skel-panels-ignoreHref"><span class="fa fa-envelope">Contact</span></a></li>
							</ul>
						</nav>
				</section>
				
				<section class="bottom">
					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="http:\\{{user.facebook_id}}" class="fa fa-twitter solo"><span>Facebook</span></a></li>
							<li><a href="http:\\{{user.twitter_id}}" class="fa fa-facebook solo"><span>Twitter</span></a></li>
							<li><a href="http:\\{{user.github_id}}" class="fa fa-github solo"><span>Github</span></a></li>
							<li><a href="http:\\{{user.dribbble_id}}" class="fa fa-dribbble solo"><span>Dribbble</span></a></li>
							<li><a href="http:\\{{user.email_address}}" class="fa fa-envelope solo"><span>Email</span></a></li>
						</ul>
				</section>
			
			</header>

		<!-- Main -->
			<div id="main">
			
				<!-- Intro -->
					<section id="top" class="one" ng-controller="UserController">
						<div class="container">

							<a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>

							<header>
								<h2 class="alt">This is <strong>{{user.first_name}} {{user.last_name}}</strong>. A <a href="#">{{user.profession}}</a>, Designer<br />
								{{user.define_myself}}</h2>
							</header>
							
							<p>Ligula scelerisque justo sem accumsan diam quis. Vitae natoque dictum 
							etiam semper magnis enim feugiat convallis convallis egestas rhoncus ridiculus 
							in quis risus curabitur tempor. Orci penatibus quisque laoreet condimentum 
							sollicitudin accumsan elementum.</p>

							<footer>
								<a href="#portfolio" class="button scrolly">Magna Aliquam</a>
							</footer>

						</div>
					</section>
					
				<!-- Portfolio -->
					<section id="portfolio" class="two" ng-controller="UserController">
						<div class="container">
					
							<header>
								<h2>Portfolio</h2>
							</header>
							
							<p>{{user.portfolio_info}}</p>
						
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
						</div>
					</section>

				<!-- About Me -->
					<section id="about" class="three">
						<div class="container" ng-controller="UserController">
							<header>
								<h2>About Me</h2>
							</header>
							<a href="#" class="image featured"><img src="images/pic08.jpg" alt="" /></a>
							<p style="margin-top: 2em;">{{user.about_me}}</p>
						</div>
					</section>
			
				<!-- Contact -->
					<section id="contact" class="four" ng-controller="UserController">
						<div class="container">

							<header>
								<h2>Contact</h2>
							</header>

							<p>{{user.contact_info}}</p>
							
							<form method="post" action="#">
								<div class="row half">
									<div class="6u"><input type="text" class="text" name="name" placeholder="Name" /></div>
									<div class="6u"><input type="text" class="text" name="email" placeholder="Email" /></div>
								</div>
								<div class="row half">
									<div class="12u">
										<textarea name="message" placeholder="Message"></textarea>
									</div>
								</div>
								<div class="row">
									<div class="12u">
										<a href="#" class="button submit">Send Message</a>
									</div>
								</div>
							</form>

						</div>
					</section>
			
			</div>

		<!-- Footer -->
			<div id="footer">
				
				<!-- Copyright -->
					<div class="copyright">
						<p>&copy; 2014 {{user.username}}. All rights reserved.</p>
						<ul class="menu">
							<li>Design: <a href="#">PortoBuild</a></li>
						</ul>
					</div>	
			</div>
	</body>
</html>