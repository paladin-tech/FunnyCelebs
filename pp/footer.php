<div id="footerContainer">
	<div id="footer">
		<div id="copyright">
			© 2013 by <span style="color: #FFFFFF">Michael Wolf</span>&nbsp;&nbsp;&nbsp;All rights reserved<br>
			<a href="index.php?pg=privacyPolicy">Privacy policy</a><br>
			<a href="index.php?pg=termsOfUse">Terms of use</a>
		</div>
		<div id="footerMenu">
			<ul>
				<li<? if($pg == 'home') { ?> class="activeFooter footerStrelica"<? } else { ?> onclick="location.href = 'index.php?pg=home'"<? } ?>>home</li>
				<li<? if($pg == 'gallery' || $pg == 'galleryDetails') { ?> class="activeFooter footerStrelica"<? } else { ?> onclick="location.href = 'index.php?pg=gallery&pager=1'"<? } ?>>gallery</li>
				<li<? if($pg == 'f-news' || $pg == 'f-news-more') { ?> class="activeFooter footerStrelica"<? } else { ?> onclick="location.href = 'index.php?pg=f-news&pager=1'"<? } ?>>f-news</li>
				<li<? if($pg == 'faq' || $pg == 'faq-more') { ?> class="activeFooter footerStrelica"<? } else { ?> onclick="location.href = 'index.php?pg=faq'"<? } ?>>f-AQ</li>
				<li<? if($pg == 'contact') { ?> class="activeFooter footerStrelica"<? } else { ?> onclick="location.href = 'index.php?pg=contact'"<? } ?>>contact</li>
			</ul>
		</div>
		<div id="arrowUp">
			<a href="#top" title="Back to Top"><img id="arrowUpImg" src="images/arrowUp.jpg"></a>
		</div>
		<div class="clear"></div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#arrowUpImg').mouseover(function() {
			$(this).attr('src', 'images/arrowUp-over.jpg');
		});

		$('#arrowUpImg').mouseout(function() {
			$(this).attr('src', 'images/arrowUp.jpg');
		});

		$('#footerMenu ul li').mouseover(function() {
			$('.activeFooter').removeClass('footerStrelica');
//			$(this).addClass('footerStrelica');
		});

		$('#footerMenu').mouseout(function() {
//			$('.footerStrelica').removeClass('footerStrelica');
			$('.activeFooter').addClass('footerStrelica');
		});
	});
</script>