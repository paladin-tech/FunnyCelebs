<?
$celebrity = (isset($_GET['celebrity']))?(int)$_GET['celebrity']:1;
list($celebId, $name, $occupation, $birthDate, $birthPlace, $starSign, $title, $story) = $infosystem->Execute("SELECT `celebId`, `name`, `occupation`, `birthDate`, `birthPlace`, `starSign`, `title`, `story` FROM `fc_celebrity` WHERE `celebId` = {$celebrity}")->fields;
?>

<!-- include jQuery + carouFredSel plugin -->
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.carouFredSel.js"></script>

<link rel="stylesheet" type="text/css" href="css/carousel.css"/>

<script>
$(document).ready(function() {
	// Using custom configuration
	$("#carousel").carouFredSel({
		items				: 3,
		height              : 200,
		scroll : {
			items			: 1,
			easing			: "elastic",
			duration		: 1000,
			pauseOnHover	: true
		},
		prev : {
			button          : "#foo2_prev",
			key             : "left"
		},
		next : {
			button          : "#foo2_next",
			key             : "right"
		}
	});
});
</script>

<div class="clear"></div>
<div id="gallerySeparator"></div>
<div id="galleryDetailsMain">
	<div class="galleryBigImage">
		<div class="galleryLargeFrame"><img src="images/celebrity-<?= $celebId ?>-big.jpg"></div>
<!--		<div id="sectionLike">Click here to <span style="color: #0160a8; background: url('images/like.png')">Like</span> this picture!</div>-->
		<div id="sectionLike"><img src="images/clickHereToLike.jpg"></div>
		<div class="image_carousel">
			<div id="carousel">
				<img src="images/carousel-michaelJackson.jpg" style="" />
				<img src="images/carousel-eminem.jpg" style="" />
				<img src="images/carousel-PSY.jpg" style="" />
				<img src="images/carousel-ladyGaga.jpg" style="" />
				<img src="images/carousel-kobeBryant.jpg" style="" />
				<img src="images/carousel-justinBieber.jpg" style="" />
			</div>
			<div class="clearfix"></div>
			<a class="prev" id="foo2_prev" href="#"><span>prev</span></a>
			<a class="next" id="foo2_next" href="#"><span>next</span></a>
		</div>
		<div class="clear"></div>
<!--		<a href="#" class="prev" style="display: block;">aa</a>-->
	</div>
	<div id="galleryDetailsContainer">
		<div id="celebrity"><?= mb_strtoupper($name) ?></div>
		<div id="title"><?= ucfirst($title) ?></div>
		<div id="text"><?= $story ?></div>
		<div class="galleryIsprekidane"></div>
		<div id="details">
			<span class="span1">NAME:</span> <span class="span2"><?= $name ?></span><br>
			<span class="span1">OCCUPATION:</span> <span class="span2"><?= $occupation ?></span><br>
			<span class="span1">BIRTH DATE:</span> <span class="span2"><?= $birthDate ?></span><br>
			<span class="span1">PLACE OF BIRTH:</span> <span class="span2"><?= $birthPlace ?></span><br>
			<span class="span1">STAR SIGN:</span> <span class="span2"><?= $starSign ?></span>
		</div>
		<div class="galleryIsprekidane"></div>
		<div id="commentsBox">
			<div id="cbTitle">Comments (36)</div>
			<div class="comment"><span class="cbCelebrity">Jessie James</span><span class="cbDate">, June 03, 2012, 8.20 PM</span><br>
				<span class="cbText">Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet.</span>
			</div>
			<div class="comment"><span class="cbCelebrity">Abdulah Muhamed</span><span class="cbDate">, June 03, 2012, 8.20 PM</span><br>
				<span class="cbText">Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget.</span>
			</div>
			<div class="comment"><span class="cbCelebrity">Darko Šarić</span><span class="cbDate">, June 03, 2012, 8.20 PM</span><br>
				<span class="cbText">Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet.</span>
			</div>
			<div><img src="images/faq_komentari_isprekidana.jpg"></div>
			<div style="padding: 15px 0 5px 0">
				<div style="float: left;"><span class="cbCelebrity">Post comment</span></div>
				<div class="cbCelebrity" style="float: right;">View all</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div id="adsContainer">
	<img src="images/ads.png">
</div>
<? include("otherNews.php"); ?>