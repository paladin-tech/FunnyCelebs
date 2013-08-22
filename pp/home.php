<div id="homeSeparator"></div>
<div class="clear"></div>
<div id="homeText">
	<h1>What's this all about?</h1>
	<p>We believe that everybody has wished at least once in their life to live like a celebrity and to be adored, famous, rich and sexy.</p>
	<p>You may have asked yourselves, however, whether celebrities' lives are really that perfect as they seem or whether they may have faults or secrets they want to keep for themselves or what would they look like in everyday situations that we find almost impossible to imagine them in.</p>
</div>
<div id="homeTextSticker"></div>
<div class="clear"></div>
<div id="mostPopularSeparator"></div>
<div id="mostPopular">
	<div class="mostPopularThumb mostPopularThumbFirst" onclick="location.href = 'index.php?pg=galleryDetails&amp;celebrity=1'">
		<div class="mostPopularImage" style="background: url('images/celebrity-1-small.jpg') no-repeat; background-position: 13px 13px; position: relative">
			<div class="transparentCover"></div>
			<img class="sticker" src="images/veryHot.png">
		</div>
		<div class="mostPopularTitle">CHRISTINA AGUILERA</div>
		<div class="mostPopularLink">Devilishly good voice!</div>
	</div>
	<div class="mostPopularThumb" onclick="location.href = 'index.php?pg=galleryDetails&amp;celebrity=2'">
		<div class="mostPopularImage" style="background: url('images/celebrity-2-small.jpg') no-repeat; background-position: 13px 13px; position: relative">
			<div class="transparentCover"></div>
		</div>
		<div class="mostPopularTitle">ANGELINA JOLIE</div>
		<div class="mostPopularLink">Heroine of Crime Films</div>
	</div>
	<div class="mostPopularThumb" onclick="location.href = 'index.php?pg=galleryDetails&amp;celebrity=3'">
		<div class="mostPopularImage" style="background: url('images/celebrity-3-small.jpg') no-repeat; background-position: 13px 13px; position: relative">
			<div class="transparentCover"></div>
			<img class="sticker" src="images/mustSee.png">
		</div>
		<div class="mostPopularTitle">BRAD PITT</div>
		<div class="mostPopularLink">Sexy or not sexy?</div>
	</div>
	<div class="clear"></div>
	<div id="mostPopularSeparator2"></div>
	<div class="mostPopularThumb mostPopularThumbFirst" onclick="location.href = 'index.php?pg=galleryDetails&amp;celebrity=4'">
		<div class="mostPopularImage" style="background: url('images/celebrity-4-small.jpg') no-repeat; background-position: 13px 13px; position: relative">
			<div class="transparentCover"></div>
		</div>
		<div class="mostPopularTitle">BEYONCÉ KNOWLES</div>
		<div class="mostPopularLink">Extraordinary dream</div>
	</div>
	<div class="mostPopularThumb" onclick="location.href = 'index.php?pg=galleryDetails&amp;celebrity=5'">
		<div class="mostPopularImage" style="background: url('images/celebrity-5-small.jpg') no-repeat; background-position: 13px 13px; position: relative">
			<div class="transparentCover"></div>
			<img class="sticker" src="images/new.png">
		</div>
		<div class="mostPopularTitle">PSY</div>
		<div class="mostPopularLink">The most viwed jockey</div>
	</div>
	<div class="mostPopularThumb" onclick="location.href = 'index.php?pg=galleryDetails&amp;celebrity=6'">
		<div class="mostPopularImage" style="background: url('images/celebrity-6-small.jpg') no-repeat; background-position: 13px 13px; position: relative">
			<div class="transparentCover"></div>
		</div>
		<div class="mostPopularTitle">EMINEM</div>
		<div class="mostPopularLink">A distant relative from a Roman legion</div>
	</div>
	<div class="clear"></div>
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