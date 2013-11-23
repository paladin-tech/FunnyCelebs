<script>
	$(document).ready(function() {
		$('area').mouseover(function() {
			$('#FAQ-' + $(this).attr('celeb')).attr('src', 'images/FAQ-' + $(this).attr('celeb') + '-' + $(this).attr('celebOrder') + '.jpg');
		});

		$('area').mouseout(function() {
			$('#FAQ-' + $(this).attr('celeb')).attr('src', 'images/FAQ-' + $(this).attr('celeb') + '.jpg');
		});

		$.fn.preload = function() {
			this.each(function(){
				$('<img/>')[0].src = 'images/' + this;
			});
		}

		$(['FAQ-5-1.jpg', 'FAQ-6-1.jpg', 'FAQ-6-2.jpg', 'FAQ-6-3.jpg', 'FAQ-7-1.jpg', 'FAQ-7-2.jpg', 'FAQ-7-3.jpg', 'FAQ-8-1.jpg', 'FAQ-9-1.jpg', 'FAQ-10-1.jpg', 'FAQ-10-2.jpg', 'FAQ-10-3.jpg', 'faq_like_01-over.jpg', 'faq_like_03-over.jpg']).preload();
	});
</script>
<div class="clear"></div>
<div id="faqSeparator" style="height: 44px;"></div>
<div id="adsContainer">
	<img src="images/ads.png">
</div>
<div id="faqContainer" style="padding: 20px 30px 30px 30px;">
	<div class="faqQuestion">
		<div class="faqQuestion1">
			<img src="images/FAQ-5.jpg" border="0" usemap="#Map5" id="FAQ-5" />
			<map name="Map5" id="Map5">
				<area shape="rect" coords="0,70,426,400" href="#" alt="George Clooney" title="George Clooney" celeb="5" celebOrder="1" />
			</map>
		</div>
		<div class="faqLike1"></div>
	</div>
	<div class="faqQuestion faqQuestionRight">
		<div class="faqQuestion3">
			<img src="images/FAQ-6.jpg" border="0" usemap="#Map6" id="FAQ-6" />
			<map name="Map6" id="Map6">
				<area shape="rect" coords="0,70,149,376" href="#" alt="Nicole Kidman" title="Nicole Kidman" celeb="6" celebOrder="1" />
				<area shape="rect" coords="149,70,278,376" href="#" alt="Angelina Jolie" title="Angelina Jolie" celeb="6" celebOrder="2" />
				<area shape="rect" coords="278,70,426,376" href="#" alt="Ben Affleck" title="Ben Affleck" celeb="6" celebOrder="3" />
			</map>
		</div>
		<div class="faqLike3">
			<div class="faqLike3-1L"></div>
			<div class="faqLike3-2"></div>
			<div class="faqLike3-3"></div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="faqSeparator"></div>
	<div class="faqQuestion">
		<div class="faqQuestion3">
			<img src="images/FAQ-7.jpg" border="0" usemap="#Map7" id="FAQ-7" />
			<map name="Map7" id="Map7">
				<area shape="rect" coords="0,70,149,376" href="#" alt="Christina Aguilera" title="Christina Aguilera" celeb="7" celebOrder="1" />
				<area shape="rect" coords="149,70,278,376" href="#" alt="Megan Fox" title="Megan Fox" celeb="7" celebOrder="2" />
				<area shape="rect" coords="278,70,426,376" href="#" alt="Will Smith" title="Will Smith" celeb="7" celebOrder="3" />
			</map>
		</div>
		<div class="faqLike3">
			<div class="faqLike3-1L"></div>
			<div class="faqLike3-2"></div>
			<div class="faqLike3-3"></div>
		</div>
	</div>
	<div class="faqQuestion faqQuestionRight">
		<div class="faqQuestion1">
			<img src="images/FAQ-8.jpg" border="0" usemap="#Map8" id="FAQ-8" />
			<map name="Map8" id="Map8">
				<area shape="rect" coords="0,70,426,400" href="#" alt="Eminem" title="Eminem" celeb="8" celebOrder="1" />
			</map>
		</div>
		<div class="faqLike1"></div>
	</div>
	<div class="clear"></div>
	<div class="faqSeparator"></div>
	<div class="faqQuestion">
		<div class="faqQuestion1">
			<img src="images/FAQ-9.jpg" border="0" usemap="#Map9" id="FAQ-9" />
			<map name="Map9" id="Map9">
				<area shape="rect" coords="0,70,426,400" href="#" alt="Michael Jackson" title="Michael Jackson" celeb="9" celebOrder="1" />
			</map>
		</div>
		<div class="faqLike1"></div>
	</div>
	<div class="faqQuestion faqQuestionRight">
		<div class="faqQuestion3">
			<img src="images/FAQ-10.jpg" border="0" usemap="#Map10" id="FAQ-10" />
			<map name="Map10" id="Map10">
				<area shape="rect" coords="0,70,149,376" href="#" alt="David Beckham" title="David Beckham" celeb="10" celebOrder="1" />
				<area shape="rect" coords="149,70,278,376" href="#" alt="Lady Gaga" title="Lady Gaga" celeb="10" celebOrder="2" />
				<area shape="rect" coords="278,70,426,376" href="#" alt="Richard Gere" title="Richard Gere" celeb="10" celebOrder="3" />
			</map>
		</div>
		<div class="faqLike3">
			<div class="faqLike3-1L"></div>
			<div class="faqLike3-2"></div>
			<div class="faqLike3-3"></div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div id="pager">
	<div id="pagerContainer">
		<div class="pagerField">&lt;</div>
		<div class="pagerField" onclick="location.href = 'index.php?pg=faq'">1</div>
		<div class="pagerFieldActive">2</div>
		<div class="pagerField" onclick="location.href = 'index.php?pg=faq-more'">&gt;</div>
		<div class="clear"></div>
	</div>
</div>
<div id="adsContainer">
	<img src="images/ads.png">
</div>
<? include('disclaimer.php'); ?>