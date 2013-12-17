<?
$celebrity = (isset($_GET['celebrity']))?(int)$_GET['celebrity']:1;
list($celebId, $name, $occupation, $birthDate, $birthPlace, $starSign, $title, $story) = $infosystem->Execute("SELECT `celebId`, `name`, `occupation`, `birthDate`, `birthPlace`, `starSign`, `title`, `story` FROM `fc_celebrity` WHERE `celebId` = {$celebrity}")->fields;

function calculateAge($date) {
    $today = date('Y-m-d');
    $dateDet = explode('-', $date);
    $dateComp = date('Y').'-'.$dateDet[1].'-'.$dateDet[2];
    $ageComp = date('Y') - $dateDet[0];
    $age = ($dateComp <= $today) ? $ageComp : ($ageComp - 1);
    return $age;
}

$rsCelebrity = $infosystem->Execute("SELECT `celebId` FROM `fc_celebrity` WHERE `celebId` = {$celebrity}");
$carouselImagePreload[] = "";
while(!$rsCelebrity->EOF) {
	list($xCelebId) = $rsCelebrity->fields;
	$newsImagePreload[] = "'celebrity-{$xCelebId}-carousel-over.jpg'";
	$rsCelebrity->MoveNext();
}
$carouselImagePreload = implode(", ", $carouselImagePreload);
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

	$.fn.preload = function() {
		this.each(function(){
			$('<img/>')[0].src = 'images/' + this;
		});
	}

	$('.carouselCelebrity').mouseover(function() {
		$(this).attr('src', $(this).attr('src').replace('.jpg', '-over.jpg'));
	});

	$('.carouselCelebrity').mouseout(function() {
		$(this).attr('src', $(this).attr('src').replace('-over.jpg', '.jpg'));
	});

	$('.carouselCelebrity').click(function() {
		window.location.href = 'index.php?pg=galleryDetails&celebrity=' + $(this).attr('celeb');
	});

	$([<?= $carouselImagePreload ?>, 'clickHereToLike-over.jpg']).preload();
});
</script>

<div class="clear"></div>
<div id="gallerySeparator"></div>
<div id="galleryDetailsMain">
	<div class="galleryBigImage">
		<div class="galleryLargeFrame"><img src="images/celebrity-<?= $celebId ?>-big.jpg"></div>
<!--		<div id="sectionLike">Click here to <span style="color: #0160a8; background: url('images/like.png')">Like</span> this picture!</div>-->
		<div id="sectionLike"></div>
		<div class="image_carousel">
			<div id="carousel">
				<?
				for($j = 1; $j <= 34; $j++) {
				?>
				<img src="images/celebrity-<?= $j ?>-carousel.jpg" style="cursor: pointer" class="carouselCelebrity" celeb="<?= $j ?>">
				<?
				}
				?>
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
		<div id="text"><br><?= $story ?></div>
		<div class="galleryIsprekidane"></div>
		<div id="details">
			<span class="span1">NAME:</span> <span class="span2"><?= $name ?></span><br>
			<span class="span1">OCCUPATION:</span> <span class="span2"><?= $occupation ?></span><br>
			<span class="span1">BIRTH DATE:</span> <span class="span2"><?= date('F d, Y', strtotime($birthDate)) ?> / Age <?= calculateAge($birthDate)  ?></span><br>
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
<? include('ads.php'); ?>
<? include("otherNews.php"); ?>
<? include('disclaimer.php'); ?>