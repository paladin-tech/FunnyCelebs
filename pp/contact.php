<?
include_once 'securimage/securimage.php';
$securimage = new Securimage();

$errorMsg = $confirmMsg = false;
if(isset($_POST['btnSubmit'])) {
	if ($securimage->check($_POST['captcha_code']) == false) {
		$errorMsg = true;
	} else {
		$confirmMsg = true;
		$message = "A new message from FunnyCelebs: Online Contact\r\n\r\n\r\nFrom: " . $_POST['txtName'] . "\r\n\r\nE-mail: " . $_POST['txtEmail'] . "\r\n\r\nSubject: " . $_POST['txtSubject'] . "\r\n\r\nMessage Body:\r\n " . $_POST['txtBody'];
		mail("johnsie@gmail.com, milan.vukovic1975@gmail.com", "FunnyCelebs: Online Contact", $message, "From: contact@funnycelebs.com");
	}
}

list($newsId, $celebrity, $date, $title, $text) = $infosystem->Execute("SELECT `newsId`, `celebrity`, `date`, `title`, `text` FROM `fc_news` WHERE `mustRead` = 'true'")->fields;
?>
<script>
	$(document).ready(function() {

		$('.newsMustRead').mouseover(function() {
			$(this).attr('src', 'images/news-' + $(this).attr('newsId') + '-big-over.jpg');
		});

		$('.newsMustRead').mouseout(function() {
			$(this).attr('src', 'images/news-' + $(this).attr('newsId') + '-big.jpg');
		});

		$.fn.preload = function() {
			this.each(function(){
				$('<img/>')[0].src = 'images/' + this;
			});
		}

		$(['contactSeparator-over.jpg', 'contact-over.jpg']).preload();

	});
</script>
<div id="contactSeparator"></div>
<div class="clear"></div>
<div id="contactBody">
	<div style="padding: 34px">
		<h1>Contact Us</h1>
		<? if($errorMsg) { ?>
		<p style="color: red">The security code entered was incorrect.</p>
		<? } ?>
		<? if($confirmMsg) { ?>
		<p style="color: green">Your message was successfully sent. FunnyCelebs will reply soon.</p>
		<? } ?>
		<?
		if(!$errorMsg && !$confirmMsg) {
		?>
		<p>If you have business inquiries or other questions, please fill out the following form to contact us. Thank you!</p>
	<!--</div>-->
	<!--<div class="clear"></div>-->
		<div id="contactForm">
			<form name="frmContact" method="post" action="index.php?pg=contact">
				<div>
					<label for="txtName">Name</label><br>
					<input type="text" name="txtName" id="txtName">
				</div>
				<div>
					<label for="txtName">E-mail</label><br>
					<input type="text" name="txtEmail">
				</div>
				<div>
					<label for="txtSubject">Subject</label><br>
					<input type="text" name="txtSubject" style="width: 400px;">
				</div>
				<div>
					<label for="txtBody">Body</label><br>
					<textarea name="txtBody" style="width: 400px; height: 100px;"></textarea>
				</div>
				<div>
					<img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" /><br>
					<input type="text" name="captcha_code" size="10" maxlength="6" />
					<a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
				</div>
				<div><input type="submit" name="btnSubmit" value="Submit"></div>
			</form>
		</div>
		<?
		}
		?>
	</div>
</div>
<div id="contactImage"></div>
<div class="clear"></div>
<? include('disclaimer.php'); ?>