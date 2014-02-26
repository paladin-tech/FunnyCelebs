<?
$ip = $_SERVER['REMOTE_ADDR'];
$likedCheckArray = $likedCount = array();

if(isset($_POST['btnSubmit'])) {
	$fbID = $user_profile['id'];
	$fbName = $user_profile['name'];
	$fbData = serialize($user_profile);
	$comment = mysql_real_escape_string($_POST['txtComment']);
	$infosystem->Execute("INSERT INTO `fc_comment` SET `fbID` = '{$fbID}', `fbName` = '{$fbName}', `fbData` = '{$fbData}', `page` = '{$page}', `comment` = '{$comment}', `date` = NOW()");
}

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

$rsComment = $infosystem->Execute("SELECT `fbName`, `date`, `comment` FROM `fc_comment` WHERE `page` = '{$page}' ORDER BY `date` DESC");
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

		$('#frmComment').submit(function(e) {
			if($('#txtComment').val() == '') {
				alert('You can\'t send an empty comment');
				e.preventDefault();
			}
		});

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
			<div class="faqLikeContainer" celeb="1">
				<div class="faqLike1Liked" id="faqLiked1" celeb="1"></div>
				<div class="faqLikeBox1" id="faqLikeBox1" celeb="1" style="display: none">
					<span><?= number_format($likedCount[11] + 5812) ?></span>
				</div>
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
		<?
		if(!isset($likedCheckArray[2])) {
		?>
			<div class="faqLike3">
				<div class="faqLike3-1 like3" celeb="21"></div>
				<div class="faqLike3-2 like3" celeb="22"></div>
				<div class="faqLike3-3 like3" celeb="23"></div>
			</div>
		<?
		} else {
		?>
			<div class="faqLikeContainer3" celeb="2">
				<div class="faqLikeContainerInner">
					<div class="faqLike3-1L-blank<?= ($likedCheckArray[2] == 1) ? " faqLikeD3" : "" ?>"></div>
					<div class="faqLike3-2L-blank<?= ($likedCheckArray[2] == 2) ? " faqLikeD3" : "" ?>"></div>
					<div class="faqLike3-3L-blank<?= ($likedCheckArray[2] == 3) ? " faqLikeD3" : "" ?>"></div>
				</div>
				<div class="faqLikeBox3" id="faqLikeBox2" celeb="2" style="display: none">
					<div style="float: left; width: 112px; height: 64px; margin-left: 30px; text-align: center;"><span><?= number_format($likedCount[21] + 2710) ?></span></div>
					<div style="float: left; width: 141px; height: 64px; margin-left: 16px; text-align: center;"><span><?= number_format($likedCount[22] + 1573) ?></span></div>
					<div style="float: left; width: 114px; height: 64px; margin-left: 16px; text-align: center;"><span><?= number_format($likedCount[23] + 1498) ?></span></div>
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
			<img src="images/FAQ-3.jpg" border="0" usemap="#Map3" id="FAQ-3" />
			<map name="Map3" id="Map3">
				<area shape="rect" coords="0,70,149,376" href="#" alt="Julia Roberts" title="Julia Roberts" celeb="3" celebOrder="1" />
				<area shape="rect" coords="149,70,278,376" href="#" alt="Bruce Willis" title="Bruce Willis" celeb="3" celebOrder="2" />
				<area shape="rect" coords="278,70,426,376" href="#" alt="Jennifer Lopez" title="Jennifer Lopez" celeb="3" celebOrder="3" />
			</map>
		</div>
		<?
		if(!isset($likedCheckArray[3])) {
		?>
			<div class="faqLike3">
				<div class="faqLike3-1 like3" celeb="31"></div>
				<div class="faqLike3-2 like3" celeb="32"></div>
				<div class="faqLike3-3 like3" celeb="33"></div>
			</div>
		<?
		} else {
		?>
			<div class="faqLikeContainer3" celeb="3">
				<div class="faqLikeContainerInner">
					<div class="faqLike3-1L-blank<?= ($likedCheckArray[3] == 1) ? " faqLikeD3" : "" ?>"></div>
					<div class="faqLike3-2L-blank<?= ($likedCheckArray[3] == 2) ? " faqLikeD3" : "" ?>"></div>
					<div class="faqLike3-3L-blank<?= ($likedCheckArray[3] == 3) ? " faqLikeD3" : "" ?>"></div>
				</div>
				<div class="faqLikeBox3" id="faqLikeBox3" celeb="3" style="display: none">
					<div style="float: left; width: 112px; height: 64px; margin-left: 30px; text-align: center;"><span><?= number_format($likedCount[31] + 1075) ?></span></div>
					<div style="float: left; width: 141px; height: 64px; margin-left: 16px; text-align: center;"><span><?= number_format($likedCount[32] + 4112) ?></span></div>
					<div style="float: left; width: 114px; height: 64px; margin-left: 16px; text-align: center;"><span><?= number_format($likedCount[33] + 878) ?></span></div>
				</div>
			</div>
		<?
		}
		?>
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
			<div class="faqLikeContainer" celeb="4">
				<div class="faqLike1Liked" id="faqLiked1" celeb="4"></div>
				<div class="faqLikeBox1" id="faqLikeBox1" celeb="4" style="display: none">
					<span><?= number_format($likedCount[41] + 5280) ?></span>
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
		<div class="pagerFieldActive">1</div>
		<div class="pagerField" onclick="location.href = 'index.php?pg=faq-more'">2</div>
		<div class="pagerFieldLast" onclick="location.href = 'index.php?pg=faq-more'"></div>
		<div class="clear"></div>
	</div>
</div>
<? include('ads.php'); ?>
<div id="faqCommentsBlock">
	<div style="float: left">
		<div id="commentsBox">
			<div id="cbTitle" style="padding-top: 0">Comments (<?= $rsComment->RecordCount() ?>)</div>
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
		<div class="clear"></div>
		<div style="width: 300px;">
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
	<div id="faqGuster" style="float: right" onclick="location.href = 'index.php?pg=galleryDetails&celebrity=4'" title="Go to Gallery">
		<img src="images/Gmazox-1.jpg" onmouseover="this.src='images/Gmazox-2.jpg'" onmouseout="this.src='images/Gmazox-1.jpg'" onclick="location.href = 'index.php?pg=galleryDetails&celebrity=4'">
	</div>
	<div class="clear"></div>
</div>
<? include('disclaimer.php'); ?>