<?
$pager = (isset($_GET['pager']))?(int)$_GET['pager']:1;
$rsGallery = $infosystem->Execute("SELECT `celebId`, `name`, `title`, `special` FROM `fc_celebrity` LIMIT ".(($pager - 1) * 12).", 12");
?>
<div class="clear"></div>
<div id="gallerySeparator"></div>
<div id="mostPopular">
	<?
	$i = 1;
	while(!$rsGallery->EOF) {
	?>
	<div class="mostPopularThumb<? if($i % 3 == 1) { ?> mostPopularThumbFirst<? } ?>" onclick="location.href = 'index.php?pg=galleryDetails&celebrity=<?= $rsGallery->Fields("celebId") ?>'">
		<div class="mostPopularImage" style="background: url('images/celebrity-<?= $rsGallery->Fields("celebId") ?>-small.jpg') no-repeat; background-position: 13px 13px; position: relative">
			<div class="transparentCover"></div><?
			if($rsGallery->Fields("special") != 'none') { ?>
				<img class="sticker" src="images/<?= $rsGallery->Fields("special") ?>.png" style="z-index: 999"><?
			} ?>
		</div>
		<div class="mostPopularTitle"><?= mb_strtoupper($rsGallery->Fields("name")) ?></div>
		<div class="mostPopularLink"><?= $rsGallery->Fields("title") ?></div>
	</div>
		<?
		if($i % 3 == 0 && $i < $rsGallery->_numOfRows) {
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
			<div class="pagerFieldFirst"<? if($pager > 1) { ?> onclick="location.href = 'index.php?pg=gallery&pager=<?= ($pager - 1) ?>'"<? } ?>></div>
			<div class="<?= ($pager==1)?"pagerFieldActive":"pagerField"?>" onclick="location.href = 'index.php?pg=gallery&pager=1'">1</div>
			<div class="<?= ($pager==2)?"pagerFieldActive":"pagerField"?>" onclick="location.href = 'index.php?pg=gallery&pager=2'">2</div>
			<div class="<?= ($pager==3)?"pagerFieldActive":"pagerField"?>" onclick="location.href = 'index.php?pg=gallery&pager=3'">3</div>
			<div class="pagerFieldLast"<? if($pager < 3) { ?> onclick="location.href = 'index.php?pg=gallery&pager=<?= ($pager + 1) ?>'"<? } ?>></div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<? include('ads.php'); ?>
<? include("otherNews.php"); ?>
<? include('disclaimer.php'); ?>
<script>
$(document).ready(function() {
	$('.mostPopularThumb').mouseover(function() {
		$(this).children('.mostPopularImage').children('.sticker').hide();
		$(this).children('.mostPopularImage').children('.transparentCover').show();
		$(this).children('.mostPopularLink').addClass('mostPopularLinkOver');
	});
	$('.mostPopularThumb').mouseout(function() {
		$(this).children('.mostPopularImage').children('.transparentCover').hide();
		$(this).children('.mostPopularLink').removeClass('mostPopularLinkOver');
		$(this).children('.mostPopularImage').children('.sticker').show();
	})
});
</script>