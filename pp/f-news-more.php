<?
$pager = (isset($_GET['pager']))?(int)$_GET['pager']:1;
$rsNews = $infosystem->Execute("SELECT `newsId`, `celebrity`, `date`, `title`, `text` FROM `fc_news` WHERE `mustRead` = 'false' ORDER BY `date` DESC LIMIT ".(0 + ($pager - 1) * 6).", 6");
?>
<div class="clear"></div>
<div id="fNewsSeparator"></div>
<div class="clear"></div>
<div id="latestNews">
	<div id="latestNewsHeader">more f-news...</div>
	<?
	while(!$rsNews->EOF) {
		?>
		<div class="latestNewsRow">
			<div class="latestNewsImage"><img src="images/news-<?= $rsNews->Fields("newsId") ?>-small.jpg"></div>
			<div class="mustReadBody">
				<div><?= $rsNews->Fields("date") ?></div>
				<div class="mustReadTitle"><?= $rsNews->Fields("celebrity") ?></div>
				<div class="mustReadTitle mustReadTitle2"><?= $rsNews->Fields("title") ?></div>
				<div class="mustReadText" id="news-<?= $rsNews->Fields("newsId") ?>"><?= substr($rsNews->Fields("text"), 0, 100) ?>... <a class="mustReadTextMoreLink" href="#" onclick="return false">more</a></div>
				<div class="mustReadText" id="newsMore-<?= $rsNews->Fields("newsId") ?>" style="display: none">
					<?= $rsNews->Fields("text") ?><br>
					<img src="images/fNewsClickHereToLike.jpg">
					<!--					<a class="mustReadTextlessLink" href="#" onclick="return false">less</a>-->
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<?
		$rsNews->MoveNext();
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
	<div class="bull"></div>
	<div class="clear"></div>
</div>
<script>
$(document).ready(function() {
	$('.mustReadTextMoreLink').click(function() {
		newsId = $(this).parent().attr('id').replace('news-', '');
		$('#news-'+newsId).hide();
		$('#newsMore-'+newsId).show('fast');
	});
});
</script>