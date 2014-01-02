<?
$pager = (isset($_GET['pager']))?(int)$_GET['pager']:1;
$rsNews = $infosystem->Execute("SELECT `newsId`, `celebrity`, `date`, `title`, `text` FROM `fc_news` WHERE `mustRead` = 'false' ORDER BY `date` DESC LIMIT ".(2 + ($pager - 1) * 6).", 6");

$qs = explode('&code', $_SERVER['QUERY_STRING']);
$qs = $qs[0];
$page = $_SERVER['PHP_SELF'] . "?" . $qs;

if(isset($_POST['btnSubmit'])) {
	$fbID = $user_profile['id'];
	$fbName = $user_profile['name'];
	$fbData = serialize($user_profile);
	$comment = mysql_real_escape_string($_POST['txtComment']);
	$infosystem->Execute("INSERT INTO `fc_comment` SET `fbID` = '{$fbID}', `fbName` = '{$fbName}', `fbData` = '{$fbData}', `page` = '{$page}', `comment` = '{$comment}', `date` = NOW()");
}

while(!$rsNews->EOF) {
	list($x_newsId, $x_celebrity, $x_date, $x_title, $x_text) = $rsNews->fields;
	$newsImagePreload[] = "'news-{$x_newsId}-small-over.jpg'";
	$rsNews->MoveNext();
}
$newsImagePreload = implode(", ", $newsImagePreload);

$rsComment = $infosystem->Execute("SELECT `fbName`, `date`, `comment` FROM `fc_comment` WHERE `page` = '{$page}' ORDER BY `date` DESC")
?>
<script>
	$(document).ready(function() {

		$('.newsLatest').mouseover(function() {
			$(this).attr('src', 'images/news-' + $(this).attr('newsId') + '-small-over.jpg');
//			$('#mustReadTitle' + $(this).attr('newsId')).css('color', '#12c1dc');
//			$('#mustReadTextMoreLink' + $(this).attr('newsId')).css('color', '#12c1dc');
		});

		$('.newsLatest').mouseout(function() {
			$(this).attr('src', 'images/news-' + $(this).attr('newsId') + '-small.jpg');
//			$('#mustReadTitle' + $(this).attr('newsId')).css('color', '#173e75');
//			$('#mustReadTextMoreLink' + $(this).attr('newsId')).css('color', '#173e75');
		});

		$.fn.preload = function() {
			this.each(function(){
				$('<img/>')[0].src = 'images/' + this;
			});
		}

		$([<?= $newsImagePreload ?>, 'moreFunnyNewsHeader-over.jpg', 'faq_like_03-over.jpg']).preload();

	});
</script>
<div class="clear"></div>
<div id="fNewsSeparator"></div>
<div class="clear"></div>
<div id="latestNews">
	<div id="latestNewsHeaderMore"><span>READ ALSO</span></div>
	<?
    $i = 1;
	$rsNews->MoveFirst();
	while(!$rsNews->EOF) {
		?>
		<div class="latestNewsRow">
		<div class="latestNewsImage"><img class="newsLatest" newsId="<?= $rsNews->Fields("newsId") ?>" src="images/news-<?= $rsNews->Fields("newsId") ?>-small.jpg"></div>
			<div class="mustReadBody">
				<div><?= $rsNews->Fields("date") ?></div>
				<div class="mustReadTitle" id="mustReadTitle<?= $rsNews->Fields("newsId") ?>"><?= $rsNews->Fields("celebrity") ?></div>
				<div class="mustReadTitle2" newsId="<?= $rsNews->Fields("newsId") ?>"><?= $rsNews->Fields("title") ?></div>
				<div class="mustReadText" id="news-<?= $rsNews->Fields("newsId") ?>"><?= truncateWords($rsNews->Fields("text")) ?>... <a class="mustReadTextMoreLink" id="mustReadTextMoreLink<?= $rsNews->Fields("newsId") ?>" newsId="<?= $rsNews->Fields("newsId") ?>" href="#" onclick="return false">more</a></div>
				<div class="mustReadText" id="newsMore-<?= $rsNews->Fields("newsId") ?>" style="display: none">
					<?= $rsNews->Fields("text") ?>&nbsp;<a class="mustReadTextLessLink" href="#" onclick="return false">less</a><br>
					<div class="newsLike"></div>
				</div>
			</div>
			<div class="clear"></div>
        </div><?
        if($i < $rsNews->RecordCount()) { ?>
	        <div id="gallerySeparator2"></div><?
        }
		$rsNews->MoveNext();
        $i++;
	}
	?>
	<div style="height: 22px;"></div>
</div>
<? include('ads.php'); ?>
<div id="commentsFNewsContainer">
	<div id="commentsBox" style="float: left; text-align: left;">
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
		<div style="padding: 15px 0 5px 0">
			<div style="float: left;"><span class="cbCelebrity">Post comment</span></div>
			<div class="cbCelebrity" style="float: right;">View all</div>
			<div class="clear"></div>
		</div>
		<? if ($user) { ?>
			<form name="frmComment" id="frmComment" method="post" action="<?= $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] ?>">
				<div><textarea name="txtComment" id="txtComment"></textarea></div>
				<div><input type="submit" name="btnSubmit" value="Send Comment"></div>
<!--								<div><a href="--><?php //echo $logoutUrl; ?><!--">Logout</a></div>-->
			</form>
		<? } else { ?>
			<div>
				<div>You need to be connected to your Facebook account if you want to leave a comment.</div>
				<div><a href="<?php echo $loginUrl; ?>"><img src="images/facebook-connect.gif" border="0"></a></div>
			</div>
		<? } ?>
	</div>
	<div id="pagerContainer" style="padding: 20px; float: left; padding: 20px 73px 0 73px;">
		<div class="pagerFieldFirst" <? if($pager > 1) { ?>onclick="location.href = 'index.php?pg=f-news-more&pager=<?= ($pager - 1) ?>'"<? } else { ?>onclick="location.href = 'index.php?pg=f-news'"<? } ?>></div>
		<div class="<?= ($pager==0)?" pagerFieldActive":"pagerField"?>" onclick="location.href = 'index.php?pg=f-news'">1</div>
		<div class="<?= ($pager==1)?" pagerFieldActive":"pagerField"?>" onclick="location.href = 'index.php?pg=f-news-more&pager=1'">2</div>
		<!--		<div class="--><?//= ($pager==3)?" pagerFieldActive":"pagerField"?><!--" onclick="location.href = 'index.php?pg=f-news-more&pager=2'">3</div>-->
		<div class="pagerFieldLast"<? if($pager < 1) { ?> onclick="location.href = 'index.php?pg=f-news-more&pager=<?= ($pager + 1) ?>'"<? } ?>></div>
		<div class="clear"></div>
	</div>
	<div class="bull" onclick="location.href = 'index.php?pg=galleryDetails&celebrity=24'" title="Go to Gallery"></div>
</div>
<div class="clear"></div>
<? include('disclaimer.php'); ?>
<script>
$(document).ready(function() {
	$('.mustReadTextMoreLink, .mustReadTitle2').click(function() {
		newsId = $(this).attr('newsid');
		$('#news-'+newsId).hide();
		$('#newsMore-'+newsId).show('fast');
	});
	$('.mustReadTextLessLink').click(function() {
		newsId = $(this).parent().attr('id').replace('newsMore-', '');
		$('#newsMore-'+newsId).hide('fast');
		$('#news-'+newsId).show();
	});

	$('.bull').css('height', $('#commentsFNewsContainer').outerHeight() + 20);

});
</script>