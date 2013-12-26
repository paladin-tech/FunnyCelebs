<?
session_start();

require("adodb/adodb.inc.php");
require("infosystem.php");
$pg = (isset($_GET['pg']))?$_GET['pg']:'home';

list($numberOfCelebrities) = $infosystem->Execute("SELECT COUNT('celebId') FROM `fc_celebrity`")->fields;

function truncateWords($text, $maxLength = 20)
{
	// explode the text into an array of words
	$wordArray = explode(' ', $text);

	// do we have too many?
	if( sizeof($wordArray) > $maxLength )
	{
		// remove the unwanted words
		$wordArray = array_slice($wordArray, 0, $maxLength);

		// turn the word array back into a string and add our ...
		return implode(' ', $wordArray) . '&hellip;';
	}

	// if our array is under the limit, just send it straight back
	return $text;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="language" content="en"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<title>FunnyCelebs</title>
	<script src="js/jquery-1.5.2.js"></script>
	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "11bdf58d-6cc5-4ecd-b0ef-8f21b3d9c6bf", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</head>
<body>
<a name="top"></a>
<div id="container">
	<div id="topContainer">
		<div id="menuContainer">
			<div id="logo" onclick="window.location.href = 'index.php?pg=home'"></div>
			<div id="menu">
				<ul>
					<li onclick="location.href = 'index.php?pg=home'" class="<?= ($pg=="home") ? "menuHomeActive active" : "" ?>">home</li>
					<li onclick="location.href = 'index.php?pg=gallery&pager=1'" class="<?= ($pg=="gallery"||$pg=="galleryDetails") ? "menuGalleryActive active" : "" ?>">gallery</li>
					<li onclick="location.href = 'index.php?pg=f-news'" class="<?= ($pg=="f-news" || $pg == "f-news-more") ? "menuFnewsActive active" : "" ?>">f-news</li>
					<li onclick="location.href = 'index.php?pg=faq'" class="<?= ($pg=="faq"||$pg=="faq-more") ? "menuFaqActive active" : "" ?>">f-AQ</li>
					<li onclick="location.href = 'index.php?pg=contact'" class="<?= ($pg=="contact") ? "menuContactActive active" : "" ?>">contact</li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div id="headerContainer">
		<div id="characterContainer">
<!--			<img src="images/header2.png" style="margin-top: -58px;">-->
		</div>
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