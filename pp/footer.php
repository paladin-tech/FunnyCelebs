<div id="footerContainer">
	<div id="footer">
		<div id="copyright">© 2013 by <span style="color: #FFFFFF">Michael Wolf</span>&nbsp;&nbsp;&nbsp;All rights reserved<br>Terms of use</div>
		<div id="footerMenu">
			<ul>
				<li<? if($pg == 'home') { ?> class="active"<? } else { ?> onclick="location.href = 'index.php?pg=home'"<? } ?>>home</li>
				<li<? if($pg == 'gallery' || $pg == 'galleryDetails') { ?> class="active"<? } else { ?> onclick="location.href = 'index.php?pg=gallery&pager=1'"<? } ?>>gallery</li>
				<li<? if($pg == 'f-news' || $pg == 'f-news-more') { ?> class="active"<? } else { ?> onclick="location.href = 'index.php?pg=f-news&pager=1'"<? } ?>>f-news</li>
				<li<? if($pg == 'faq' || $pg == 'faq-more') { ?> class="active"<? } else { ?> onclick="location.href = 'index.php?pg=faq'"<? } ?>>f-AQ</li>
				<li>contact</li>
			</ul>
		</div>
		<div id="arrowUp">
			<img src="images/arrowUp.png">
		</div>
		<div class="clear"></div>
	</div>
</div>