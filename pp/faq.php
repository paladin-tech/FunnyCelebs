<?
$ip = $_SERVER['REMOTE_ADDR'];
$likedCheckArray = $likedCount = array();

$rsLikeCount = $infosystem->Execute("SELECT COUNT(`ip`) `itemCount`, `item` FROM `fc_like` WHERE `type` = 'faq' GROUP BY `item`");
if($rsLikeCount->RecordCount() > 0) {
	while(!$rsLikeCount->EOF) {
		list($xItemCount, $xItem) = $rsLikeCount->fields;
		$itemId = floor($xItem / 10);
		$itemData = $xItem - $itemId * 10;
		$likedCount[$itemId] = $xItemCount;
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
			itemData = $(this).attr('celeb') + $(this).attr('celebOrder');
			console.log(itemData);
			$.ajax({
				type: "POST",
				url: "setVote.php",
				data: { type: 'faq', item: itemData },
				success: function() {
					$('.faqLike1').css('background-image', 'url(images/faq_like_01_liked.jpg)');
				}
			});
		});

		$('.faqLike1Liked').mouseover(function() {
			faqItem = $(this).attr('celeb');
			$('#faqLiked' + faqItem).hide();
			$('#faqLikeBox' + faqItem).show();
		});

		$('.faqLike1Liked').mouseout(function() {
			faqItem = $(this).attr('celeb');
			$('#faqLikeBox' + faqItem).hide();
			$('#faqLiked' + faqItem).show();
		});

		$.fn.preload = function() {
			this.each(function(){
				$('<img/>')[0].src = 'images/' + this;
			});
		}

		$(['FAQ-1-1.jpg', 'FAQ-2-1.jpg', 'FAQ-2-2.jpg', 'FAQ-2-3.jpg', 'FAQ-3-1.jpg', 'FAQ-3-2.jpg', 'FAQ-3-3.jpg', 'FAQ-4-1.jpg', 'Gmazox-2.jpg', 'faq_like_01-over.jpg', 'faq_like_03-over.jpg']).preload();
	});
</script>
<div class="clear"></div>
<div id="faqSeparator"></div>
<div class="clear"></div>
<div id="homeText">
	<h1>Top 10 f-AQ (with answers)!</h1>
	<p>Here are top ten FAQs by visitors to our website. We asked celebrities to give their exclusive answers. Some of them may surprise you or you may disagree with some, but please “like” those that you think are correct!</p>
	<p>Please, note that some questions have only one answer, because any other would be untrue and could possibly mislead you.</p>
</div>
<div id="funnyNewsSticker"></div>
<div class="clear"></div>
<div class="separator"></div>
<div id="faqContainer">
	<div class="faqQuestion">
		<div class="faqQuestion1">
			<img src="images/FAQ-1.jpg" border="0" usemap="#Map1" id="FAQ-1" />
			<map name="Map1" id="Map1">
				<area shape="rect" coords="0,70,426,400" href="#" alt="Christina Aguilera" title="Christina Aguilera" celeb="1" celebOrder="1" />
			</map>
		</div>
		<?
		if(!isset($likedCheckArray[1])) {
		?>
			<div class="faqLike1" celeb="1" celebOrder="1"></div>
		<?
		} else {
		?>
			<div class="faqLike1Liked" id="faqLiked1" celeb="1"></div>
			<div class="faqLikeBox1" id="faqLikeBox1" celeb="1" style="display: none">
				<span><?= $likeCount ?></span>
			</div>
		<?
		}
		?>
	</div>
	<div class="faqQuestion faqQuestionRight">
		<div class="faqQuestion3">
			<img src="images/FAQ-2.jpg" border="0" usemap="#Map2" id="FAQ-2" />
			<map name="Map2" id="Map2">
				<area shape="rect" coords="0,70,149,376" href="#" alt="Brad Pitt" title="Brad Pitt" celeb="2" celebOrder="1" />
				<area shape="rect" coords="149,70,278,376" href="#" alt="Oprah Winfrey" title="Oprah Winfrey" celeb="2" celebOrder="2" />
				<area shape="rect" coords="278,70,426,376" href="#" alt="Britney Spears" title="Britney Spears" celeb="2" celebOrder="3" />
			</map>
		</div>
		<div class="faqLike3">
			<div class="faqLike3-1L"></div>
			<div class="faqLike3-2"></div>
			<div class="faqLike3-3"></div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="faqSeparator"></div>
	<div class="faqQuestion">
		<div class="faqQuestion3">
			<img src="images/FAQ-3.jpg" border="0" usemap="#Map3" id="FAQ-3" />
			<map name="Map3" id="Map3">
				<area shape="rect" coords="0,70,149,376" href="#" alt="Julia Roberts" title="Julia Roberts" celeb="3" celebOrder="1" />
				<area shape="rect" coords="149,70,278,376" href="#" alt="Bruce Willis" title="Bruce Willis" celeb="3" celebOrder="2" />
				<area shape="rect" coords="278,70,426,376" href="#" alt="Jennifer Lopez" title="Jennifer Lopez" celeb="3" celebOrder="3" />
			</map>
		</div>
		<div class="faqLike3">
			<div class="faqLike3-1L"></div>
			<div class="faqLike3-2"></div>
			<div class="faqLike3-3"></div>
		</div>
	</div>
	<div class="faqQuestion faqQuestionRight">
		<div class="faqQuestion1">
			<img src="images/FAQ-4.jpg" border="0" usemap="#Map4" id="FAQ-4" />
			<map name="Map4" id="Map4">
				<area shape="rect" coords="0,70,426,400" href="#" alt="Ronaldinho" title="Ronaldinho" celeb="4" celebOrder="1" />
			</map>
		</div>
		<?
		if(!isset($likedCheckArray[4])) {
			?>
			<div class="faqLike1" celeb="4" celebOrder="1"></div>
		<?
		} else {
			?>
			<div class="faqLike1Liked"></div>
			<div class="faqLikeBox1" style="display: none">
				<span><?= $likeCount ?></span>
			</div>
		<?
		}
		?>
	</div>
	<div class="clear"></div>
</div>
<div id="pager">
	<div id="pagerContainer">
		<div class="pagerField">&lt;</div>
		<div class="pagerFieldActive">1</div>
		<div class="pagerField" onclick="location.href = 'index.php?pg=faq-more'">2</div>
		<div class="pagerField" onclick="location.href = 'index.php?pg=faq-more'">&gt;</div>
		<div class="clear"></div>
	</div>
</div>
<? include('ads.php'); ?>
<div id="faqCommentsBlock">
	<div id="commentsBox" style="padding: 10px 0 20px 14; width: 300px; float: left;">
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
	<div id="faqGuster" onclick="location.href = 'index.php?pg=galleryDetails&celebrity=4'" title="Go to Gallery">
		<img src="images/Gmazox-1.jpg" onmouseover="this.src='images/Gmazox-2.jpg'" onmouseout="this.src='images/Gmazox-1.jpg'" onclick="location.href = 'index.php?pg=galleryDetails&celebrity=4'">
	</div>
	<div class="clear"></div>
</div>
<? include('disclaimer.php'); ?>