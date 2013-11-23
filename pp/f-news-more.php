<?
$pager = (isset($_GET['pager']))?(int)$_GET['pager']:1;
$rsNews = $infosystem->Execute("SELECT `newsId`, `celebrity`, `date`, `title`, `text` FROM `fc_news` WHERE `mustRead` = 'false' ORDER BY `date` DESC LIMIT ".(2 + ($pager - 1) * 6).", 6");

while(!$rsNews->EOF) {
	list($x_newsId, $x_celebrity, $x_date, $x_title, $x_text) = $rsNews->fields;
	$newsImagePreload[] = "'news-{$x_newsId}-small-over.jpg'";
	$rsNews->MoveNext();
}
$newsImagePreload = implode(", ", $newsImagePreload);
?>
<script>
	$(document).ready(function() {

		$('.newsLatest').mouseover(function() {
			$(this).attr('src', 'images/news-' + $(this).attr('newsId') + '-small-over.jpg');
			$('#mustReadTitle' + $(this).attr('newsId')).css('color', '#12c1dc');
			$('#mustReadTextMoreLink' + $(this).attr('newsId')).css('color', '#12c1dc');
		});

		$('.newsLatest').mouseout(function() {
			$(this).attr('src', 'images/news-' + $(this).attr('newsId') + '-small.jpg');
			$('#mustReadTitle' + $(this).attr('newsId')).css('color', '#173e75');
			$('#mustReadTextMoreLink' + $(this).attr('newsId')).css('color', '#173e75');
		});

		$.fn.preload = function() {
			this.each(function(){
				$('<img/>')[0].src = 'images/' + this;
			});
		}

		$([<?= $newsImagePreload ?>, 'moreFunnyNewsHeader2-over.jpg', 'faq_like_03-over.jpg']).preload();

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
				<div class="mustReadTitle mustReadTitle2"><?= $rsNews->Fields("title") ?></div>
				<div class="mustReadText" id="news-<?= $rsNews->Fields("newsId") ?>"><?= truncateWords($rsNews->Fields("text")) ?>... <a class="mustReadTextMoreLink" id="mustReadTextMoreLink<?= $rsNews->Fields("newsId") ?>" href="#" onclick="return false">more</a></div>
				<div class="mustReadText" id="newsMore-<?= $rsNews->Fields("newsId") ?>" style="display: none">
					<?= $rsNews->Fields("text") ?>&nbsp;<a class="mustReadTextLessLink" href="#" onclick="return false">less</a><br>
					<div class="newsLike"></div>
<!--					<img src="images/fNewsClickHereToLike.jpg">-->
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
</div>
<div id="adsContainer">
	<img src="images/ads.png">
</div>
<div id="pager" style="padding: 0px;">
	<div id="pagerContainer" style="padding: 20px;">
		<div class="pagerFieldFirst" <? if($pager > 1) { ?>onclick="location.href = 'index.php?pg=f-news-more&pager=<?= ($pager - 1) ?>'"<? } else { ?>onclick="location.href = 'index.php?pg=f-news'"<? } ?>></div>
		<div class="<?= ($pager==0)?" pagerFieldActive":"pagerField"?>" onclick="location.href = 'index.php?pg=f-news'">1</div>
		<div class="<?= ($pager==1)?" pagerFieldActive":"pagerField"?>" onclick="location.href = 'index.php?pg=f-news-more&pager=1'">2</div>
		<!--		<div class="--><?//= ($pager==3)?" pagerFieldActive":"pagerField"?><!--" onclick="location.href = 'index.php?pg=f-news-more&pager=2'">3</div>-->
		<div class="pagerFieldLast"<? if($pager < 1) { ?> onclick="location.href = 'index.php?pg=f-news-more&pager=<?= ($pager + 1) ?>'"<? } ?>></div>
		<div class="clear"></div>
	</div>
	<div style="float: left; width: 250px; padding: 20px;">
		<div>Comments (36)</div>
		<div>Jessie James, June 03, 2012, 8.20 PM
			Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet.</div>
		<div>Abdulah Muhamed, June 03, 2012, 8.20 PM
			Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget.</div>
		<div>Kim Džung Il, June 03, 2012, 8.20 PM
			Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget.</div>
		<div>Post comment</div>
		<div>View All</div>
	</div>
	<div class="bull" onclick="location.href = 'index.php?pg=galleryDetails&celebrity=24'" title="Go to Gallery"></div>
	<div class="clear"></div>
</div>
<script>
$(document).ready(function() {
	$('.mustReadTextMoreLink').click(function() {
		newsId = $(this).parent().attr('id').replace('news-', '');
		$('#news-'+newsId).hide();
		$('#newsMore-'+newsId).show('fast');
	});
	$('.mustReadTextLessLink').click(function() {
		newsId = $(this).parent().attr('id').replace('newsMore-', '');
		$('#newsMore-'+newsId).hide('fast');
		$('#news-'+newsId).show();
	});

});
</script>