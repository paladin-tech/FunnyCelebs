<?
require("adodb/adodb.inc.php");
require("infosystem.php");
$pg = (isset($_GET['pg']))?$_GET['pg']:'home';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="language" content="en"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<title>FunnyCelebs</title>
	<script src="js/jquery-1.5.2.js"></script>
</head>
<body>
<a name="top"></a>
<div id="container">
	<div id="topContainer">
		<div id="menuContainer">
			<div id="logo"></div>
			<div id="menu">
				<ul>
					<li onclick="location.href = 'index.php?pg=home'"<? if($pg=="home") { ?> class="active"<? } ?>>home</li>
					<li onclick="location.href = 'index.php?pg=gallery&pager=1'"<? if($pg=="gallery"||$pg=="galleryDetails") { ?> class="active"<? } ?>>gallery</li>
					<li onclick="location.href = 'index.php?pg=f-news'"<? if($pg=="f-news" || $pg == "f-news-more") { ?> class="active"<? } ?>>f-news</li>
					<li onclick="location.href = 'index.php?pg=faq'"<? if($pg=="faq"||$pg=="faq-more") { ?> class="active"<? } ?>>f-AQ</li>
					<li>contact</li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div id="headerContainer">
		<div id="characterContainer"><img src="images/header2.png"></div>
<!--		<div id="characterContainer">-->
<!--			<div id="character1">-->
<!--				<img src="images/opra.png">-->
<!--			</div>-->
<!--			<div id="character2">-->
<!--				<img src="images/ashton.png">-->
<!--			</div>-->
<!--			<div class="clear"></div>-->
<!--		</div>-->
	</div>
	<div id="main">
		<? include($pg.'.php'); ?>
	</div>
	<? include('footer.php'); ?>
</div>
</body>
</html>