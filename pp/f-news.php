<?
$ip = $_SERVER['REMOTE_ADDR'];

$pager = 0;
list($newsId, $celebrity, $date, $title, $text) = $infosystem->Execute("SELECT `newsId`, `celebrity`, `date`, `title`, `text` FROM `fc_news` WHERE `mustRead` = 'true'")->fields;
list($likeCountMustRead) = $infosystem->Execute("SELECT COUNT(`ip`) FROM `fc_like` WHERE `type` = 'news' AND `item` = {$newsId}")->fields;
$likeCount[$newsId] = $likeCountMustRead;
$likedCheck[$newsId] =  $infosystem->Execute("SELECT `ip` FROM `fc_like` WHERE `type` = 'news' AND `item` = {$newsId} AND `ip` = '{$ip}'");

$rsNews = $infosystem->Execute("SELECT `newsId`, `celebrity`, `date`, `title`, `text` FROM `fc_news` WHERE `mustRead` = 'false' LIMIT 2");

$newsImagePreload[] = "'news-{$newsId}-big-over.jpg'";
while(!$rsNews->EOF) {
	list($x_newsId, $x_celebrity, $x_date, $x_title, $x_text) = $rsNews->fields;
	$newsImagePreload[] = "'news-{$x_newsId}-small-over.jpg'";

	list($likeCount[$x_newsId]) = $infosystem->Execute("SELECT COUNT(`ip`) FROM `fc_like` WHERE `type` = 'news' AND `item` = {$x_newsId}")->fields;

	$likedCheck[$x_newsId] =  $infosystem->Execute("SELECT `ip` FROM `fc_like` WHERE `type` = 'news' AND `item` = {$x_newsId} AND `ip` = '{$ip}'");
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

		$('.sectionLike').click(function() {

			news = $(this).attr('newsId');
			sectionLikeDiv = '#sectionLike' + news;
			sectionLikeBoxSpan = '#sectionLikeBox' + news + ' span';
			$.ajax({
				type: "POST",
				url: "setVote.php",
				data: { type: 'news', item: news },
				success: function(data) {
					$(sectionLikeDiv)
						.css('background-image', 'url(images/you-have-liked-this.jpg)');

					$(sectionLikeBoxSpan).html(data);
				}
			});
		});

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
				<?
				if($likedCheck[$newsId]->RecordCount() == 0) {
				?>
					<div class="sectionLike" id="sectionLike<?= $newsId ?>" newsId="<?= $newsId ?>"></div>
				<?
				} else {
				?>
					<div class="sectionLikeD" id="sectionLikeD<?= $newsId ?>"></div>
				<?
				}
				?>
				<div class="sectionLikeBox">
					<span><?= $likeCountMustRead ?></span>
				</div>
				<div id="sectionShare" style="float: right">
					<span class='st_facebook_large' displayText='Facebook'></span>
					<span class='st_twitter_large' displayText='Tweet'></span>
					<span class='st_googleplus_large' displayText='Google +'></span>
					<span class='st_pinterest_large' displayText='Pinterest'></span>
					<span class='st_email_large' displayText='Email'></span>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<? include('ads.php'); ?>
<div id="latestNews" style="padding-top: 5px;">
	<div id="latestNewsHeader"><span>HOT GOSSIPS</span></div>
	<?
	$i = 1;
	$rsNews->MoveFirst();
	while(!$rsNews->EOF) {
		list($x_newsId, $x_celebrity, $x_date, $x_title, $x_text) = $rsNews->fields;
	?>
	<div class="latestNewsRow">
		<div class="latestNewsImage"><img class="newsLatest" newsId="<?= $x_newsId ?>" src="images/news-<?= $x_newsId ?>-small.jpg"></div>
		<div class="mustReadBody">
			<div><?= $x_date ?></div>
			<div class="mustReadTitle" id="mustReadTitle<?= $x_newsId ?>"><?= $x_celebrity ?></div>
			<div class="mustReadTitle2" newsId="<?= $x_newsId ?>"><?= $x_title ?></div>
			<div class="mustReadText" id="news-<?= $x_newsId ?>"><?= truncateWords($x_text) ?>... <a class="mustReadTextMoreLink" id="mustReadTextMoreLink<?= $x_newsId ?>" newsId="<?= $x_newsId ?>" href="#" onclick="return false">more</a></div>
			<div class="mustReadText" id="newsMore-<?= $x_newsId ?>" style="display: none">
				<?= $x_text ?>&nbsp;<a class="mustReadTextLessLink" href="#" onclick="return false">less</a><br>
				<?
				if($likedCheck[$x_newsId]->RecordCount() == 0) {
				?>
					<div class="sectionLike" id="sectionLike<?= $x_newsId ?>" newsId="<?= $x_newsId ?>"></div>
				<?
				} else {
				?>
					<div class="sectionLikeD" id="sectionLikeD<?= $x_newsId ?>"></div>
				<?
				}
				?>
				<div class="sectionLikeBox" id="sectionLikeBox<?= $x_newsId ?>">
					<span><?= $likeCount[$x_newsId] ?></span>
				</div>
				<div id="sectionShare" style="float: right">
					<span class='st_facebook_large' displayText='Facebook'></span>
					<span class='st_twitter_large' displayText='Tweet'></span>
					<span class='st_googleplus_large' displayText='Google +'></span>
					<span class='st_pinterest_large' displayText='Pinterest'></span>
					<span class='st_email_large' displayText='Email'></span>
				</div>
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
});
</script>