<?
list($newsId, $celebrity, $date, $title, $text) = $infosystem->Execute("SELECT `newsId`, `celebrity`, `date`, `title`, `text` FROM `fc_news` WHERE `mustRead` = 'true'")->fields;
$rsNews = $infosystem->Execute("SELECT `newsId`, `celebrity`, `date`, `title`, `text` FROM `fc_news` WHERE `mustRead` = 'false' LIMIT 2");
?>
<div class="clear"></div>
<div id="fNewsSeparator"></div>
<div class="clear"></div>
<div id="homeText">
	<h1>Funny news</h1>
	<p>Često smo zainteresovani da o poznatim ličnostima saznamo sve što je moguće o njihovom profesionalnom, a posebno privatnom životu. Šta su doručkovali, gde su pili kafu, šta su obukli, sa kim su i gde juče spavali – to su samo neka od pitanja na koja želimo brze i ekskluzivne odgovore...</p>
	<p>Upravo iz tog razloga, vam predstavljamo naše  vesti o poznatima! Možda će vam neke od njih izgledati glupo i besmisleno - skoro kao i “prave” vesti, međutim, nemojte se iznenenaditi, ukoliko se jednog dana pokažu kao istinite!</p>
</div>
<div id="funnyNewsSticker"></div>
<div class="clear"></div>
<div id="latestNewsSeparator"></div>
<div class="clear"></div>
<div id="mustRead">
	<div id="mustReadHeader"><span>MUST READ</span></div>
	<div>
		<div class="mustReadImage"><img src="images/news-<?= $newsId ?>-big.jpg"></div>
		<div class="mustReadBody">
			<div><?= $date ?></div>
			<div class="mustReadTitle"><?= $celebrity ?></div>
			<div class="mustReadTitle mustReadTitle2"><?= $title ?></div>
			<div class="mustReadText"><?= $text ?></div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div id="adsContainer">
	<img src="images/ads.png">
</div>
<div id="latestNews">
	<div id="latestNewsHeader"></div>
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
			<div class="mustReadText" id="newsMore-<?= $rsNews->Fields("newsId") ?>" style="display: none"><?= $rsNews->Fields("text") ?> <a class="mustReadTextlessLink" href="#" onclick="return false">less</a></div>
		</div>
		<div class="clear"></div>
	</div>
	<?
		$rsNews->MoveNext();
	}
	?>
</div>
<div id="pager">
	<div id="pagerContainer">
		<div class="pagerField">&lt;</div>
		<div class="pagerField activePage">1</div>
		<div class="pagerField" onclick="location.href = 'index.php?pg=f-news-more&pager=1'">2</div>
		<div class="pagerField" onclick="location.href = 'index.php?pg=f-news-more&pager=2'">3</div>
		<div class="pagerField" onclick="location.href = 'index.php?pg=f-news-more&pager=1'">&gt;</div>
		<div class="clear"></div>
	</div>
</div>
<script>
$(document).ready(function() {
	$('.mustReadTextMoreLink').click(function() {
		newsId = $(this).parent().attr('id').replace('news-', '');
		$('#news-'+newsId).hide();
		$('#newsMore-'+newsId).show('slow');
	});
});
</script>