
<!doctype html>
<html lang="en" ng-app="mbdApp">
<head>
	<meta charset="UTF-8">
	<title>Anas Music</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="extra/css/bootstrap.min.css">
	<link rel="stylesheet" href="extra/css/mycss.css">
	
</head>
<body ng-controller="mainController">
<!-- Headder row -->
    <div class="row">
       <div class="container">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<a class="navbar-brand" href="http://hrshadhin.tk">
				TuxBot
				<br/> <em><small>Another Tux Lover</small></em> 
			</a>
			<h2 class="navbar-text navbar-middle">
			Welcome To Anas Music [Beta]
		</h2>
	
		<div class="navbar-text btn-group navbar-right">
			
			<a href="#" class="btn btn-danger btn-large"><i class="icon-white glyphicon glyphicon-user"></i> SingUp</a>
			<a href="#" class="btn btn-success btn-large"><i class="icon-white glyphicon glyphicon-log-in"></i> SingIn</a>
		</div>
	</nav>
</div>
 </div>
<!--End header here-->
<!--Left panel-->

<div class="container bs-docs-container">
	<div class="row">
		<div class="col-lg-1">
			<div class="bs-sidebar hidden-print affix" role="complementary">
				<ul class="nav bs-sidenav">
						<li>
							<a href="#">Home</a>
							<a href="#/explore">Explore</a>
							<a href="#/playlist">Playlist</a>
							<a href="#about">About</a>
						</li>
					</ul>
			</div>
		</div>
		<!--right panel-->
		<div class="col-lg-11">
			<div class="bs-docs-selection" role="main">
				
					<div ng-view> </div>
					
					
			</div>
		</div>

	</div>
</div>
<!--right panel end-->


<!-- Player codes -->
<div class="row">
    <div class="container player">
		<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
			<h1> An@s Player here</h1>
		</nav>
	</div>
</div>


<!--Scripts are here-->
<script src="extra/js/angular.min.js"></script>
<script src="extra/js/angular-route.min.js"></script>
<script src="extra/js/myscript.js"></script>
</body>
</html>