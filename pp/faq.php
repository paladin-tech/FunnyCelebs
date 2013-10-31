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

		$(['FAQ-2-1.jpg', 'FAQ-2-2.jpg', 'FAQ-2-3.jpg', 'FAQ-3-1.jpg', 'FAQ-3-2.jpg', 'FAQ-3-3.jpg']).preload();
	});
</script>
<div class="clear"></div>
<div id="faqSeparator"></div>
<div class="clear"></div>
<div id="homeText">
	<h1>Top 10 f-AQ (with answers)!</h1>
	<p>Here are top ten FAQs by visitors to our website. We asked celebrities to give their exclusive answers. Some of them may surprise you or you may disagree with some, but please “like” those that you think are correct!</p>
	<p>Please, note that some questions have only one answer, because any other would be untrue and could possibly mislead you.</p>
</div>
<div id="funnyNewsSticker"></div>
<div class="clear"></div>
<div class="separator"></div>
<div id="faqContainer">
	<div class="faqQuestion">
		<div style="background: url(images/faq_pitanje_001.jpg) no-repeat; background-position: 15px 15px; width: 441px; height: 400px;">
			<div class="faqQuestionTitle">1. DOES GOD EXIST?</div>
		</div>
		<div style="padding: 20px 81px 0 82px"><img src="images/faq_like_01.jpg"></div>
	</div>
	<div class="faqQuestion faqQuestionRight">
		<div style="padding: 15px">
			<img src="images/FAQ-2.jpg" border="0" usemap="#Map2" id="FAQ-2" />
			<map name="Map2" id="Map2">
				<area shape="rect" coords="0,70,149,376" href="#" alt="Brad Pitt" title="Brad Pitt" celeb="2" celebOrder="1" />
				<area shape="rect" coords="149,70,278,376" href="#" alt="Oprah Winfrey" title="Oprah Winfrey" celeb="2" celebOrder="2" />
				<area shape="rect" coords="278,70,426,376" href="#" alt="Britney Spears" title="Britney Spears" celeb="2" celebOrder="3" />
			</map>
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
		<div style="padding: 15px">
			<img src="images/FAQ-3.jpg" border="0" usemap="#Map3" id="FAQ-3" />
			<map name="Map3" id="Map3">
				<area shape="rect" coords="0,70,149,376" href="#" alt="Julia Roberts" title="Julia Roberts" celeb="3" celebOrder="1" />
				<area shape="rect" coords="149,70,278,376" href="#" alt="Angelina Jolie" title="Angelina Jolie" celeb="3" celebOrder="2" />
				<area shape="rect" coords="278,70,426,376" href="#" alt="Ben Affleck" title="Ben Affleck" celeb="3" celebOrder="3" />
			</map>
		</div>
		<div class="faqLike3">
			<div style="float: left; width: 112px; padding-left: 30px;"><img src="images/faq_like_02.jpg"></div>
			<div style="float: left; width: 125px; padding-left: 16px;"><img src="images/faq_like_03.jpg"></div>
			<div style="float: left; width: 126px; padding-left: 16px;"><img src="images/faq_like_03.jpg"></div>
		</div>
	</div>
	<div class="faqQuestion faqQuestionRight">
		<div style="background: url(images/faq_pitanje_004.jpg) no-repeat; background-position: 15px 15px; width: 441px; height: 400px;">
			<div class="faqQuestionTitle">4. DOES SANTA CLAUS EXIST?</div>
		</div>
		<div style="padding: 20px 81px 0 82px"><img src="images/faq_like_01.jpg"></div>
	</div>
	<div class="clear"></div>
</div>
<div id="pager">
	<div id="pagerContainer">
		<div class="pagerField">&lt;</div>
		<div class="pagerField activePage">1</div>
		<div class="pagerField" onclick="location.href = 'index.php?pg=faq-more'">2</div>
		<div class="pagerField" onclick="location.href = 'index.php?pg=faq-more'">&gt;</div>
		<div class="clear"></div>
	</div>
</div>
<div id="adsContainer">
	<img src="images/ads.png">
</div>
<div id="faqCommentsBlock">
	<div id="commentsBox" style="padding: 10px 0 20px 14; width: 300px; float: left;">
		<div id="cbTitle">Comments (36)</div>
		<div class="comment"><span class="cbCelebrity">Jessie James</span><span class="cbDate">, June 03, 2012, 8.20 PM</span><br>
			<span class="cbText">Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet.</span>
		</div>
		<div class="comment"><span class="cbCelebrity">Abdulah Muhamed</span><span class="cbDate">, June 03, 2012, 8.20 PM</span><br>
			<span class="cbText">Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget.</span>
		</div>
		<div class="comment"><span class="cbCelebrity">Darko Šarić</span><span class="cbDate">, June 03, 2012, 8.20 PM</span><br>
			<span class="cbText">Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet.</span>
		</div>
		<div><img src="images/faq_komentari_isprekidana.jpg"></div>
		<div style="padding: 15px 0 5px 0">
			<div style="float: left;"><span class="cbCelebrity">Post comment</span></div>
			<div class="cbCelebrity" style="float: right;">View all</div>
			<div class="clear"></div>
		</div>
	</div>
	<div id="faqGuster" onclick="location.href = 'index.php?pg=galleryDetails&celebrity=4'" title="Go to Gallery"></div>
	<div class="clear"></div>
</div>
<? include('disclaimer.php'); ?>