<?php
	session_start();
	$rem = "";
	$uname = $_SESSION['uname'];
	if(empty($uname)) header("location:login.php");
	if(isset($_GET['user'])) {
		$rec = $_GET['user'];
		$file = $uname."_".$rec;
		fopen("files/$file.txt", "w");
		chmod("files/$file.txt", 0777);
		$_SESSION['rec'] = $rec;
		$rem = "<span>rem : {{rem()}}</span>";
	}
?>
<!DOCTYPE html>
<html ng-app="crypto">
<head>
	<title>Crypto !</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />

	<script src="js/jquery.js"></script>
	<script src="js/angular.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/crypto.css" />
</head>
<body ng-controller="main">
	<h2 class="logo">Crypto ! <?php print ucwords($uname) ?></h2>
	<hr class="sep" />
	<div class="main row">
		<div class="left col-xs-12 col-sm-3 col-lg-3 col-xl-3">
			<p>
				<span class="glyphicon glyphicon-search"></span> <input type="text" placeholder="Search user" ng-model="search" autofocus />
			</p>
			<ul>
				<li ng-repeat="person in people | filter:search" ng-show="search"><a id="selected_name" href="./?user={{person.uname}}">{{person.uname}}</a></li>
			</ul>
		</div>

		<div class="right col-xs-12 col-sm-9 col-lg-9 col-xl-9">
			<div class="chart_zone">
				<h3>Crypto</h3>
				<p>
				<?php
					$user = $_GET['user'];
					if(isset($user)) {
						print "<span class='glyphicon glyphicon-user'> $user</span>";
					}else print "";
				 ?>
				 </p>
				 <textarea class="form-control" rows="4" ng-model="message" maxlength="250" ng-keyup="sender()"></textarea><?php print $rem; ?>
				<br />
				 <p><button class="btn btn-sm btn-warning" ng-click="clear()">Clear</button>&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="terminate" ng-click="terminate()">Terminate</button></p>
				 <? print $_SESSION['rec']; ?>
				 <br />
				 <span>{{stat}}</span>
				 <h3><?php print "$rec says..."; ?></h3>
				  <p ng-bind="convo"></p>
			</div>
		</div>
	</div>

	<script src="js/crypto.js"></script>
</body>
</html>
