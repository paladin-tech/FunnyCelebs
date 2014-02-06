<?
$celebrity = (isset($_GET['celebrity']))?(int)$_GET['celebrity']:1;
list($celebId, $name, $occupation, $birthDate, $birthPlace, $starSign, $title, $story) = $infosystem->Execute("SELECT `celebId`, `name`, `occupation`, `birthDate`, `birthPlace`, `starSign`, `title`, `story` FROM `fc_celebrity` WHERE `celebId` = {$celebrity}")->fields;

$page = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];

if(isset($_POST['btnSubmit'])) {
	$fbID = $user_profile['id'];
	$fbName = $user_profile['name'];
	$fbData = serialize($user_profile);
	$comment = mysql_real_escape_string($_POST['txtComment']);
	$infosystem->Execute("INSERT INTO `fc_comment` SET `fbID` = '{$fbID}', `fbName` = '{$fbName}', `fbData` = '{$fbData}', `page` = '{$page}', `comment` = '{$comment}', `date` = NOW()");
}

function calculateAge($date) {
    $today = date('Y-m-d');
    $dateDet = explode('-', $date);
    $dateComp = date('Y').'-'.$dateDet[1].'-'.$dateDet[2];
    $ageComp = date('Y') - $dateDet[0];
    $age = ($dateComp <= $today) ? $ageComp : ($ageComp - 1);
    return $age;
}

$rsCelebrity = $infosystem->Execute("SELECT `celebId` FROM `fc_celebrity`");
$carouselImagePreload = array();
while(!$rsCelebrity->EOF) {
	list($xCelebId) = $rsCelebrity->fields;
	$carouselImagePreload[] = "'celebrity-{$xCelebId}-carousel-over.jpg'";
	$rsCelebrity->MoveNext();
}

$carouselImagePreload = implode(", ", $carouselImagePreload);

$rsComment = $infosystem->Execute("SELECT `fbName`, `date`, `comment` FROM `fc_comment` WHERE `page` = '{$page}' ORDER BY `date` DESC");

list($likeCount) = $infosystem->Execute("SELECT COUNT(`ip`) FROM `fc_like` WHERE `type` = 'gallery' AND `item` = {$celebrity}")->fields;

$ip = $_SERVER['REMOTE_ADDR'];
$likedCheck =  $infosystem->Execute("SELECT `ip` FROM `fc_like` WHERE `type` = 'gallery' AND `item` = {$celebrity} AND `ip` = '{$ip}'");
?>

<!-- include jQuery + carouFredSel plugin -->
<!--<script type="text/javascript" language="javascript" src="js/jquery.js"></script>-->
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

	$('#mapLeft').mouseover(function() {
		$('#galleryLayerPrevious').show();
	});
	$('#mapLeft').mouseout(function() {
		$('#galleryLayerPrevious').hide();
	});
	$('#galleryLayerPrevious').click(function() {
		window.location.href = 'index.php?pg=galleryDetails&celebrity=<?= ($celebrity > 1) ? ($celebrity - 1) : $numberOfCelebrities ?>';
	});

	$('#mapRight').mouseover(function() {
		$('#galleryLayerNext').show();
	});

	$('#mapRight').mouseout(function() {
		$('#galleryLayerNext').hide();
	});

	$('#galleryLayerNext').click(function() {
		window.location.href = 'index.php?pg=galleryDetails&celebrity=<?= ($celebrity < $numberOfCelebrities) ? ($celebrity + 1) : 1 ?>';
	});
	$('#frmComment').submit(function(e) {
		if($('#txtComment').val() == '') {
			alert('You can\'t send an empty comment');
			e.preventDefault();
		}
	});

	$('.sectionLike').mouseover(function() {
		$('.sectionLikeBox span').css('color', '#12c1dc');
	});

	$('.sectionLike').mouseout(function() {
		$('.sectionLikeBox span').css('color', '#0160a8');
	});

	$('.sectionLike').click(function() {
		$.ajax({
			type: "POST",
			url: "setVote.php",
			data: { type: 'gallery', item: '<?= $celebrity ?>' },
			success: function(data) {
				$('.sectionLike')
					.css('background-image', 'url(images/you-have-liked-this.jpg)');

				$('.sectionLikeBox span').html(data);
			}
		});
	});

	$(".galleryLargeFrame").mousemove(function(e){
		var parentOffset = $(this).parent().offset();
		var relX = e.pageX - parentOffset.left;
		var relY = e.pageY - parentOffset.top;
		if(relX < 309) {
			$('#galleryLayerPrevious').show();
			$('#galleryLayerNext').hide();
			$('#galleryLayerPrevious').mouseover(function() {
				$(this).attr('src', 'images/gallery-arrow-previous-over.png');
			});
			$('#galleryLayerPrevious').mouseout(function() {
				$(this).attr('src', 'images/gallery-arrow-previous.png');
			});
		} else {
			$('#galleryLayerPrevious').hide();
			$('#galleryLayerNext').show();
			$('#galleryLayerNext').mouseover(function() {
				$(this).attr('src', 'images/gallery-arrow-next-over.png');
			});
			$('#galleryLayerNext').mouseout(function() {
				$(this).attr('src', 'images/gallery-arrow-next.png');
			});
		}
	});
	$('.galleryLargeFrame').mouseout(function() {
		$('#galleryLayerPrevious').hide();
		$('#galleryLayerNext').hide();
	});
	$(['you-have-liked-this.jpg']).preload();
});
</script>

<div class="clear"></div>
<div id="gallerySeparator"></div>
<div id="galleryDetailsMain">
	<div class="galleryBigImage">
		<div class="galleryLargeFrame">
			<img id="galleryBigImage" src="images/celebrity-<?= $celebId ?>-big.jpg" border="0">
			<img id="galleryLayerPrevious" src="images/gallery-arrow-previous.png" style="display: none" title="Previous Image">
			<img id="galleryLayerNext" src="images/gallery-arrow-next.png" style="display: none" title="Next Image">
		</div>
		<div>
			<?
			if($likedCheck->RecordCount() == 0) {
			?>
			<div class="sectionLike"></div>
			<?
			} else {
			?>
			<div class="sectionLikeD"></div>
			<?
			}
			?>
			<div class="sectionLikeBox">
				<span><?= $likeCount ?></span>
			</div>
			<div id="sectionShare" style="float: right">
				<span class='st_facebook_large' displayText='Facebook'></span>
				<span class='st_twitter_large' displayText='Tweet'></span>
				<span class='st_googleplus_large' displayText='Google +'></span>
				<span class='st_pinterest_large' displayText='Pinterest'></span>
				<span class='st_email_large' displayText='Email'></span>
			</div>
		</div>
		<div class="clear"></div>
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
			<div id="cbTitle">Comments (<?= $rsComment->RecordCount() ?>)</div>
			<?
			$i = 1;
			while(!$rsComment->EOF) {
				list($xName, $xDate, $xComment) = $rsComment->fields;
			?>
			<div class="comment"><span class="cbCelebrity"><?= $xName ?></span>, <span class="cbDate"><?= date('F d, Y H:i', strtotime($xDate)) ?></span><br>
				<span class="cbText"><?= $xComment ?></span>
			</div>
			<?
				$rsComment->MoveNext();
				$i++;
				if($i > 3) break;
			}
			?>
			<div><img src="images/faq_komentari_isprekidana.jpg"></div>
			<div style="padding: 8px 0 5px 0">
				<div style="float: left;"><span class="cbCelebrity">Post comment</span></div>
				<div class="cbCelebrity" style="float: right;">View all</div>
				<div class="clear"></div>
			</div>
		</div>
		<div>
			<? if ($user) { ?>
			<form name="frmComment" id="frmComment" method="post" action="<?= $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] ?>">
				<div><textarea name="txtComment" id="txtComment"></textarea></div>
				<div><input type="submit" name="btnSubmit" value="Send Comment"></div>
<!--				<div><a href="--><?php //echo $logoutUrl; ?><!--">Logout</a></div>-->
			</form>
			<? } else { ?>
			<div>
				<div>You need to be connected to your Facebook account if you want to leave a comment.</div>
				<div class="fbConnectBtn"><a href="<?php echo $loginUrl; ?>"><img src="images/facebook-connect.gif" border="0"></a></div>
			</div>
			<? } ?>
		</div>
	</div>
	<div class="clear"></div>
</div>
<map name="galleryMap" id="galleryMap">
	<area shape="rect" coords="0,0,299,598" href="#" id="mapLeft">
	<area shape="rect" coords="299,0,598,598" href="#" id="mapRight">
</map>
<? include('ads.php'); ?>
<? include("otherNews.php"); ?>
<? include('disclaimer.php'); ?>