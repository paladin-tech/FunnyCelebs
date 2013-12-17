<?
$pager = 0;
list($newsId, $celebrity, $date, $title, $text) = $infosystem->Execute("SELECT `newsId`, `celebrity`, `date`, `title`, `text` FROM `fc_news` WHERE `mustRead` = 'true'")->fields;
$rsNews = $infosystem->Execute("SELECT `newsId`, `celebrity`, `date`, `title`, `text` FROM `fc_news` WHERE `mustRead` = 'false' LIMIT 2");

$newsImagePreload[] = "'news-{$newsId}-big-over.jpg'";
while(!$rsNews->EOF) {
	list($x_newsId, $x_celebrity, $x_date, $x_title, $x_text) = $rsNews->fields;
	$newsImagePreload[] = "'news-{$x_newsId}-small-over.jpg'";
	$rsNews->MoveNext();
}
$newsImagePreload = implode(", ", $newsImagePreload);
?>
<script>
	$(document).ready(function() {
		$('.newsMustRead').mouseover(function() {
			$(this).attr('src', 'images/news-' + $(this).attr('newsId') + '-big-over.jpg');
		});

		$('.newsMustRead').mouseout(function() {
			$(this).attr('src', 'images/news-' + $(this).attr('newsId') + '-big.jpg');
		});

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

		$([<?= $newsImagePreload ?>, 'breakingFunnyNewsHeader-over.jpg', 'moreFunnyNewsHeader-over.jpg', 'latestNewsSeparator-over.jpg', 'faq_like_03-over.jpg']).preload();
	});
</script>
<div class="clear"></div>
<div id="fNewsSeparator"></div>
<div class="clear"></div>
<div id="homeText">
	<h1>Funny news</h1>
	<p>We are often interested in finding out as much as possible about famous people’s professional and, especially, private lives. What they had for breakfast, where they had coffee, what they wore, who they slept with the day before and whether they had a fight with someone or not – these are just some of the questions that we want quick and exclusive answers to.</p>
	<p>This is precisely why we are presenting to you our celebrity news, unheard of as yet. Some news may seem stupid and meaningless to you, but do not get astonished if one day they turn out to be true.</p>
</div>
<div id="funnyNewsSticker"></div>
<div class="clear"></div>
<div id="latestNewsSeparator"></div>
<div class="clear"></div>
<div id="mustRead">
	<div id="mustReadHeader"><span>MUST READ</span></div>
    <div class="latestNewsRow">
		<div class="mustReadImage"><img class="newsMustRead" newsId="<?= $newsId ?>" src="images/news-<?= $newsId ?>-big.jpg"></div>
		<div class="mustReadBody">
			<div><?= $date ?></div>
			<div class="mustReadTitle"><?= $celebrity ?></div>
			<div class="mustReadTitle2"><?= $title ?></div>
			<div class="mustReadText">
				<?= $text ?><br>
				<div class="newsLike"></div>
<!--				<img src="images/fNewsClickHereToLike.jpg">-->
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<? include('ads.php'); ?>
<div id="latestNews">
	<div id="latestNewsHeader"><span>HOT GOSSIPS</span></div>
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
			<div class="mustReadTitle2"><?= $rsNews->Fields("title") ?></div>
			<div class="mustReadText" id="news-<?= $rsNews->Fields("newsId") ?>"><?= truncateWords($rsNews->Fields("text")) ?>... <a class="mustReadTextMoreLink" id="mustReadTextMoreLink<?= $rsNews->Fields("newsId") ?>" href="#" onclick="return false">more</a></div>
			<div class="mustReadText" id="newsMore-<?= $rsNews->Fields("newsId") ?>" style="display: none">
				<?= $rsNews->Fields("text") ?>&nbsp;<a class="mustReadTextLessLink" href="#" onclick="return false">less</a><br>
				<div class="newsLike"></div>
<!--				<img src="images/fNewsClickHereToLike.jpg">-->
<!--				<a class="mustReadTextlessLink" href="#" onclick="return false">less</a>-->
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<?
	if($i < $rsNews->RecordCount()) {
	?>
	<div id="gallerySeparator2"></div>
	<?
		}
		$rsNews->MoveNext();
		$i++;
	}
	?>
</div>
<div id="pager">
	<div id="pagerContainer">
		<div class="pagerFieldFirst"></div>
		<div class="pagerFieldActive">1</div>
		<div class="pagerField" onclick="location.href = 'index.php?pg=f-news-more&pager=1'">2</div>
<!--		<div class="--><?//= ($pager==3)?" pagerFieldActive":"pagerField"?><!--" onclick="location.href = 'index.php?pg=f-news-more&pager=2'">3</div>-->
		<div class="pagerFieldLast"<? if($pager < 1) { ?> onclick="location.href = 'index.php?pg=f-news-more&pager=<?= ($pager + 1) ?>'"<? } ?>></div>
		<div class="clear"></div>
	</div>
</div>
<? include('disclaimer.php'); ?>
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