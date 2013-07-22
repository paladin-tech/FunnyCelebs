<?
$pager = (isset($_GET['pager']))?(int)$_GET['pager']:1;
$rsGallery = $infosystem->Execute("SELECT `celebId`, `name`, `title` FROM `fc_celebrity` LIMIT ".(($pager - 1) * 12).", 12");
?>
<div class="clear"></div>
<div id="gallerySeparator"></div>
<div id="mostPopular">
	<?
	$i = 1;
	while(!$rsGallery->EOF) {
	?>
	<div class="mostPopularThumb<? if($i % 3 == 1) { ?> mostPopularThumbFirst<? } ?>" onclick="location.href = 'index.php?pg=galleryDetails&celebrity=<?= $rsGallery->Fields("celebId") ?>'">
		<img src="images/celebrity-<?= $rsGallery->Fields("celebId") ?>-small.png">
		<div class="mostPopularTitle"><?= mb_strtoupper($rsGallery->Fields("name")) ?></div>
		<div class="mostPopularLink"><?= $rsGallery->Fields("title") ?></div>
	</div>
		<?
		if($i % 3 == 0) {
		?>
		<div class="clear"></div>
		<div id="mostPopularSeparator2"></div>
		<?
		}
		$i++;
		$rsGallery->MoveNext();
	}
	?>
	<div class="clear"></div>
	<div id="pager">
		<div id="pagerContainer">
			<div class="pagerField">&lt;</div>
			<div class="pagerField<?= ($pager==1)?" activePage":""?>">1</div>
			<div class="pagerField<?= ($pager==2)?" activePage":""?>" onclick="location.href = 'index.php?pg=gallery&pager=2'">2</div>
			<div class="pagerField<?= ($pager==3)?" activePage":""?>" onclick="location.href = 'index.php?pg=gallery&pager=3'">3</div>
			<div class="pagerField"<? if($pager < 3) { ?> onclick="location.href = 'index.php?pg=gallery&pager=<?= ($pager + 1) ?>'"<? } ?>>&gt;</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<div id="adsContainer">
	<img src="images/ads.png">
</div>
<? include("otherNews.php"); ?>