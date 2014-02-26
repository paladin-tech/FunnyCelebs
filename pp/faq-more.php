<?
$ip = $_SERVER['REMOTE_ADDR'];
$likedCheckArray = $likedCount = array();

$rsLikeCount = $infosystem->Execute("SELECT COUNT(`ip`) `itemCount`, `item` FROM `fc_like` WHERE `type` = 'faq' GROUP BY `item`");
if($rsLikeCount->RecordCount() > 0) {
	while(!$rsLikeCount->EOF) {
		list($xItemCount, $xItem) = $rsLikeCount->fields;
		$likedCount[$xItem] = $xItemCount;
		$rsLikeCount->MoveNext();
	}
}

$likedCheck =  $infosystem->Execute("SELECT `ip`, `item` FROM `fc_like` WHERE `type` = 'faq' AND `ip` = '{$ip}'");
if($likedCheck->RecordCount() > 0) {
	while(!$likedCheck->EOF) {
		list($xIp, $xItem) = $likedCheck->fields;
		$itemId = floor($xItem / 10);
		$itemData = $xItem - $itemId * 10;
		$likedCheckArray[$itemId] = $itemData;
		$likedCheck->MoveNext();
	}
}
?>
<script>
	$(document).ready(function() {
		$('area').mouseover(function() {
			$('#FAQ-' + $(this).attr('celeb')).attr('src', 'images/FAQ-' + $(this).attr('celeb') + '-' + $(this).attr('celebOrder') + '.jpg');
		});

		$('area').mouseout(function() {
			$('#FAQ-' + $(this).attr('celeb')).attr('src', 'images/FAQ-' + $(this).attr('celeb') + '.jpg');
		});

		$('.faqLike1').click(function() {
			elem = $(this);
			itemData = elem.attr('celeb') + elem.attr('celebOrder');
			$.ajax({
				type: "POST",
				url: "setVote.php",
				data: { type: 'faq', item: itemData },
				success: function() {
					elem.css('background-image', 'url(images/faq_like_01_liked.jpg)');
				}
			});
		});

		$('.like3').click(function() {
			elem = $(this);
			itemData = elem.attr('celeb');
			$.ajax({
				type: "POST",
				url: "setVote.php",
				data: { type: 'faq', item: itemData },
				success: function() {
					elem.css('background-image', 'url(images/faq_likeD_03.jpg)');
				}
			});
		});

		$('.faqLikeContainer').mouseover(function() {
			faqItem = $(this).attr('celeb');
			$(this).children('.faqLike1Liked').hide();
			$(this).children('.faqLikeBox1').show();
		});

		$('.faqLikeContainer').mouseout(function() {
			faqItem = $(this).attr('celeb');
			$(this).children('.faqLike1Liked').show();
			$(this).children('.faqLikeBox1').hide();
		});

		$('.faqLikeContainer3').mouseover(function() {
			faqItem = $(this).attr('celeb');
			$(this).children('.faqLikeContainerInner').hide();
			$(this).children('.faqLikeBox3').show();
		});

		$('.faqLikeContainer3').mouseout(function() {
			faqItem = $(this).attr('celeb');
			$(this).children('.faqLikeContainerInner').show();
			$(this).children('.faqLikeBox3').hide();
		});

		$.fn.preload = function() {
			this.each(function(){
				$('<img/>')[0].src = 'images/' + this;
			});
		}

		$(['FAQ-5-1.jpg', 'FAQ-6-1.jpg', 'FAQ-6-2.jpg', 'FAQ-6-3.jpg', 'FAQ-7-1.jpg', 'FAQ-7-2.jpg', 'FAQ-7-3.jpg', 'FAQ-8-1.jpg', 'FAQ-9-1.jpg', 'FAQ-10-1.jpg', 'FAQ-10-2.jpg', 'FAQ-10-3.jpg', 'faq_like_01-over.jpg', 'faq_like_03-over.jpg']).preload();
	});
</script>
<div class="clear"></div>
<div id="faqSeparator" style="height: 48px;"></div>
<? include('ads.php'); ?>
<div id="faqContainer" style="padding: 20px 30px 30px 30px;">
	<div class="faqQuestion">
		<div class="faqQuestion1">
			<img src="images/FAQ-5.jpg" border="0" usemap="#Map5" id="FAQ-5" />
			<map name="Map5" id="Map5">
				<area shape="rect" coords="0,70,426,400" href="#" alt="George Clooney" title="George Clooney" celeb="5" celebOrder="1" />
			</map>
		</div>
		<?
		if(!isset($likedCheckArray[5])) {
			?>
			<div class="faqLike1" celeb="5" celebOrder="1"></div>
		<?
		} else {
			?>
			<div class="faqLikeContainer" celeb="5">
				<div class="faqLike1Liked" id="faqLiked5" celeb="5"></div>
				<div class="faqLikeBox1" id="faqLikeBox5" celeb="5" style="display: none">
					<span><?= number_format($likedCount[51] + 5695) ?></span>
				</div>
			</div>
		<?
		}
		?>
	</div>
	<div class="faqQuestion faqQuestionRight">
		<div class="faqQuestion3">
			<img src="images/FAQ-6.jpg" border="0" usemap="#Map6" id="FAQ-6" />
			<map name="Map6" id="Map6">
				<area shape="rect" coords="0,70,149,376" href="#" alt="Nicole Kidman" title="Nicole Kidman" celeb="6" celebOrder="1" />
				<area shape="rect" coords="149,70,278,376" href="#" alt="Angelina Jolie" title="Angelina Jolie" celeb="6" celebOrder="2" />
				<area shape="rect" coords="278,70,426,376" href="#" alt="Ben Affleck" title="Ben Affleck" celeb="6" celebOrder="3" />
			</map>
		</div>
		<?
		if(!isset($likedCheckArray[6])) {
			?>
			<div class="faqLike3">
				<div class="faqLike3-1 like3" celeb="61"></div>
				<div class="faqLike3-2 like3" celeb="62"></div>
				<div class="faqLike3-3 like3" celeb="63"></div>
			</div>
		<?
		} else {
			?>
			<div class="faqLikeContainer3" celeb="6">
				<div class="faqLikeContainerInner">
					<div class="faqLike3-1L-blank<?= ($likedCheckArray[6] == 1) ? " faqLikeD3" : "" ?>"></div>
					<div class="faqLike3-2L-blank<?= ($likedCheckArray[6] == 2) ? " faqLikeD3" : "" ?>"></div>
					<div class="faqLike3-3L-blank<?= ($likedCheckArray[6] == 3) ? " faqLikeD3" : "" ?>"></div>
				</div>
				<div class="faqLikeBox3" id="faqLikeBox6" celeb="6" style="display: none">
					<div style="float: left; width: 112px; height: 64px; margin-left: 30px; text-align: center;"><span><?= number_format($likedCount[61] + 1712) ?></span></div>
					<div style="float: left; width: 141px; height: 64px; margin-left: 16px; text-align: center;"><span><?= number_format($likedCount[62] + 1380) ?></span></div>
					<div style="float: left; width: 114px; height: 64px; margin-left: 16px; text-align: center;"><span><?= number_format($likedCount[63] + 2112) ?></span></div>
				</div>
			</div>
		<?
		}
		?>
	</div>
	<div class="clear"></div>
	<div class="faqSeparator"></div>
	<div class="faqQuestion">
		<div class="faqQuestion3">
			<img src="images/FAQ-7.jpg" border="0" usemap="#Map7" id="FAQ-7" />
			<map name="Map7" id="Map7">
				<area shape="rect" coords="0,70,149,376" href="#" alt="Kim Kardashian" title="Kim Kardashian" celeb="7" celebOrder="1" />
				<area shape="rect" coords="149,70,278,376" href="#" alt="Megan Fox" title="Megan Fox" celeb="7" celebOrder="2" />
				<area shape="rect" coords="278,70,426,376" href="#" alt="50 cent" title="50 cent" celeb="7" celebOrder="3" />
			</map>
		</div>
		<?
		if(!isset($likedCheckArray[7])) {
			?>
			<div class="faqLike3">
				<div class="faqLike3-1 like3" celeb="71"></div>
				<div class="faqLike3-2 like3" celeb="72"></div>
				<div class="faqLike3-3 like3" celeb="73"></div>
			</div>
		<?
		} else {
			?>
			<div class="faqLikeContainer3" celeb="7">
				<div class="faqLikeContainerInner">
					<div class="faqLike3-1L-blank<?= ($likedCheckArray[7] == 1) ? " faqLikeD3" : "" ?>"></div>
					<div class="faqLike3-2L-blank<?= ($likedCheckArray[7] == 2) ? " faqLikeD3" : "" ?>"></div>
					<div class="faqLike3-3L-blank<?= ($likedCheckArray[7] == 3) ? " faqLikeD3" : "" ?>"></div>
				</div>
				<div class="faqLikeBox3" id="faqLikeBox7" celeb="7" style="display: none">
					<div style="float: left; width: 112px; height: 64px; margin-left: 30px; text-align: center;"><span><?= number_format($likedCount[71] + 785) ?></span></div>
					<div style="float: left; width: 141px; height: 64px; margin-left: 16px; text-align: center;"><span><?= number_format($likedCount[72] + 1412) ?></span></div>
					<div style="float: left; width: 114px; height: 64px; margin-left: 16px; text-align: center;"><span><?= number_format($likedCount[73] + 3250) ?></span></div>
				</div>
			</div>
		<?
		}
		?>
	</div>
	<div class="faqQuestion faqQuestionRight">
		<div class="faqQuestion1">
			<img src="images/FAQ-8.jpg" border="0" usemap="#Map8" id="FAQ-8" />
			<map name="Map8" id="Map8">
				<area shape="rect" coords="0,70,426,400" href="#" alt="Eminem" title="Eminem" celeb="8" celebOrder="1" />
			</map>
		</div>
		<?
		if(!isset($likedCheckArray[8])) {
			?>
			<div class="faqLike1" celeb="8" celebOrder="1"></div>
		<?
		} else {
			?>
			<div class="faqLikeContainer" celeb="8">
				<div class="faqLike1Liked" id="faqLiked8" celeb="8"></div>
				<div class="faqLikeBox1" id="faqLikeBox8" celeb="8" style="display: none">
					<span><?= number_format($likedCount[81] + 3670) ?></span>
				</div>
			</div>
		<?
		}
		?>
	</div>
	<div class="clear"></div>
	<div class="faqSeparator"></div>
	<div class="faqQuestion">
		<div class="faqQuestion1">
			<img src="images/FAQ-9.jpg" border="0" usemap="#Map9" id="FAQ-9" />
			<map name="Map9" id="Map9">
				<area shape="rect" coords="0,70,426,400" href="#" alt="Michael Jackson" title="Michael Jackson" celeb="9" celebOrder="1" />
			</map>
		</div>
		<?
		if(!isset($likedCheckArray[9])) {
			?>
			<div class="faqLike1" celeb="9" celebOrder="1"></div>
		<?
		} else {
			?>
			<div class="faqLikeContainer" celeb="9">
				<div class="faqLike1Liked" id="faqLiked9" celeb="9"></div>
				<div class="faqLikeBox1" id="faqLikeBox9" celeb="9" style="display: none">
					<span><?= number_format($likedCount[91] + 4880) ?></span>
				</div>
			</div>
		<?
		}
		?>
	</div>
	<div class="faqQuestion faqQuestionRight">
		<div class="faqQuestion3">
			<img src="images/FAQ-10.jpg" border="0" usemap="#Map10" id="FAQ-10" />
			<map name="Map10" id="Map10">
				<area shape="rect" coords="0,70,149,376" href="#" alt="David Beckham" title="David Beckham" celeb="10" celebOrder="1" />
				<area shape="rect" coords="149,70,278,376" href="#" alt="Lady Gaga" title="Lady Gaga" celeb="10" celebOrder="2" />
				<area shape="rect" coords="278,70,426,376" href="#" alt="Richard Gere" title="Richard Gere" celeb="10" celebOrder="3" />
			</map>
		</div>
		<?
		if(!isset($likedCheckArray[10])) {
			?>
			<div class="faqLike3">
				<div class="faqLike3-1 like3" celeb="101"></div>
				<div class="faqLike3-2 like3" celeb="102"></div>
				<div class="faqLike3-3 like3" celeb="103"></div>
			</div>
		<?
		} else {
			?>
			<div class="faqLikeContainer3" celeb="10">
				<div class="faqLikeContainerInner">
					<div class="faqLike3-1L-blank<?= ($likedCheckArray[10] == 1) ? " faqLikeD3" : "" ?>"></div>
					<div class="faqLike3-2L-blank<?= ($likedCheckArray[10] == 2) ? " faqLikeD3" : "" ?>"></div>
					<div class="faqLike3-3L-blank<?= ($likedCheckArray[10] == 3) ? " faqLikeD3" : "" ?>"></div>
				</div>
				<div class="faqLikeBox3" id="faqLikeBox7" celeb="10" style="display: none">
					<div style="float: left; width: 112px; height: 64px; margin-left: 30px; text-align: center;"><span><?= number_format($likedCount[101] + 2014) ?></span></div>
					<div style="float: left; width: 141px; height: 64px; margin-left: 16px; text-align: center;"><span><?= number_format($likedCount[102] + 1098) ?></span></div>
					<div style="float: left; width: 114px; height: 64px; margin-left: 16px; text-align: center;"><span><?= number_format($likedCount[103] + 2470) ?></span></div>
				</div>
			</div>
		<?
		}
		?>
	</div>
	<div class="clear"></div>
</div>
<div id="pager">
	<div id="pagerContainer">
		<div class="pagerFieldFirst"></div>
		<div class="pagerField" onclick="location.href = 'index.php?pg=faq'">1</div>
		<div class="pagerFieldActive">2</div>
		<div class="pagerFieldLast" onclick="location.href = 'index.php?pg=faq-more'"></div>
		<div class="clear"></div>
	</div>
</div>
<? include('ads.php'); ?>
<? include('disclaimer.php'); ?>