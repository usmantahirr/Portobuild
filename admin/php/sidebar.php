<section id="side-bar" class="pull-left">	
	<span class="side-bar-toggle" data-toggle="1"> <span class="glyphicon glyphicon-th-list"></span> </span>
	<div id="user-info" ng-controller = "UserController">
		<img alt="Profile Picture" src="{{user.image}}" class="img-circle profile-picture">
		<h2 class="profile-heading">{{user.fname}} {{user.lname}}</h2>
		<button class="btn btn-primary">View Public Profile</button>
	</div>

	<nav id="main-nav">
		<ul>
			<li><span class="glyphicon glyphicon-home" ></span><a href="#"> Home</a></li>
			<li class="active"><span class="glyphicon glyphicon-picture" ></span><a href="#"> Portfolio</a></li>
			
			<div ng-controller = "NavController">
				<ul class="gallery-menu">
					<li class="galleries" ng-repeat="item in navList">
						<a href="{{item.link}}"> {{item.name}}</a>
					</li>
				</ul>
			</div>
			<li><span class="glyphicon glyphicon-cog" ></span><a href="#"> Settings</a></li>
			<ul>
				<li class="galleries">
					<a href="canvas/">Canvas</a>
				</li>
			</ul>
		</ul>
	</nav>
</section>