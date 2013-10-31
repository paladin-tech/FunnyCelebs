<script>
	$(document).ready(function() {
		$('area').mouseover(function() {
			$('#FAQ-6').attr('src', 'images/FAQ-6-' + $(this).attr('celeb') + '.jpg');
		});

		$('area').mouseout(function() {
			$('#FAQ-6').attr('src', 'images/FAQ-6.jpg');
		});

		$.fn.preload = function() {
			this.each(function(){
				$('<img/>')[0].src = 'images/' + this;
			});
		}

		$(['FAQ-6-1.jpg', 'FAQ-6-2.jpg', 'FAQ-6-3.jpg']).preload();
	});
</script>
<div class="clear"></div>
<div id="faqSeparator" style="height: 44px;"></div>
<div id="adsContainer">
	<img src="images/ads.png">
</div>
<div id="faqContainer" style="padding: 20px 30px 30px 30px;">
	<div class="faqQuestion">
		<div style="background: url(images/faq_pitanje_005.jpg) no-repeat; background-position: 15px 15px; width: 441px; height: 400px;">
			<div class="faqQuestionTitle">5. IS SEX ALL MEN THINK ABOUT?</div>
		</div>
		<div style="padding: 20px 81px 0 82px"><img src="images/faq_like_01.jpg"></div>
	</div>
	<div class="faqQuestion faqQuestionRight">
<!--		<div style="background: url(images/faq_pitanje_006.jpg) no-repeat; background-position: 15px 15px; width: 441px; height: 376px;">-->
		<div style="padding: 15px">
			<img src="images/FAQ-6.jpg" border="0" usemap="#Map6" id="FAQ-6" />
			<map name="Map6" id="Map6">
				<area shape="rect" coords="0,70,149,376" href="#" alt="Nicole Kidman" celeb="1" />
				<area shape="rect" coords="149,70,278,376" href="#" alt="Angelina Jolie" celeb="2" />
				<area shape="rect" coords="278,70,426,376" href="#" alt="Ben Affleck" celeb="3" />
			</map>
<!--			<div class="faqQuestionTitle" style="padding-top: 24px">6. WHAT CAME FIRST, THE<br>&nbsp;&nbsp;&nbsp;&nbsp;CHICKEN OR THE EGG?</div>-->
		</div>
		<div class="faqLike3">
			<div style="float: left; width: 112px; padding-left: 30px;"><img src="images/faq_like_02.jpg"></div>
			<div style="float: left; width: 125px; padding-left: 16px;"><img src="images/faq_like_03.jpg"></div>
			<div style="float: left; width: 126px; padding-left: 16px;"><img src="images/faq_like_03.jpg"></div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="faqSeparator"></div>
	<div class="faqQuestion">
		<div style="background: url(images/faq_pitanje_007.jpg) no-repeat; background-position: 15px 15px; width: 441px; height: 376px;">
			<div class="faqQuestionTitle" style="padding-top: 24px">7. HOW DOES ONE BECOME<br>&nbsp;&nbsp;&nbsp;&nbsp;RICH?</div>
		</div>
		<div class="faqLike3">
			<div style="float: left; width: 112px; padding-left: 30px;"><img src="images/faq_like_02.jpg"></div>
			<div style="float: left; width: 125px; padding-left: 16px;"><img src="images/faq_like_03.jpg"></div>
			<div style="float: left; width: 126px; padding-left: 16px;"><img src="images/faq_like_03.jpg"></div>
		</div>
	</div>
	<div class="faqQuestion faqQuestionRight">
		<div style="background: url(images/faq_pitanje_008.jpg) no-repeat; background-position: 15px 15px; width: 441px; height: 400px;">
			<div class="faqQuestionTitle" style="padding-top: 24px">8. WILL THERE BE THE END OF<br>&nbsp;&nbsp;&nbsp;&nbsp;THE WORLD?</div>
		</div>
		<div style="padding: 20px 81px 0 82px"><img src="images/faq_like_01.jpg"></div>
	</div>
	<div class="clear"></div>
	<div class="faqSeparator"></div>
	<div class="faqQuestion">
		<div style="background: url(images/faq_pitanje_009.jpg) no-repeat; background-position: 15px 15px; width: 441px; height: 400px;">
			<div class="faqQuestionTitle" style="padding-top: 24px">9. DO EXTRATERRESTRIALS<br>&nbsp;&nbsp;&nbsp;&nbsp;EXIST?</div>
		</div>
		<div style="padding: 20px 81px 0 82px"><img src="images/faq_like_01.jpg"></div>
	</div>
	<div class="faqQuestion faqQuestionRight">
		<div style="background: url(images/faq_pitanje_010.jpg) no-repeat; background-position: 15px 15px; width: 441px; height: 376px;">
			<div class="faqQuestionTitle">10. IS THERE LIFE AFTER DEATH?</div>
		</div>
		<div class="faqLike3">
			<div style="float: left; width: 112px; padding-left: 30px;"><img src="images/faq_like_02.jpg"></div>
			<div style="float: left; width: 125px; padding-left: 16px;"><img src="images/faq_like_03.jpg"></div>
			<div style="float: left; width: 126px; padding-left: 16px;"><img src="images/faq_like_03.jpg"></div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div id="pager">
	<div id="pagerContainer">
		<div class="pagerField">&lt;</div>
		<div class="pagerField" onclick="location.href = 'index.php?pg=faq'">1</div>
		<div class="pagerField activePage">2</div>
		<div class="pagerField" onclick="location.href = 'index.php?pg=faq-more'">&gt;</div>
		<div class="clear"></div>
	</div>
</div>
<div id="adsContainer">
	<img src="images/ads.png">
</div>
<? include('disclaimer.php'); ?>