<?
require("adodb/adodb.inc.php");
require("infosystem.php");

$acceptedTypes = array('gallery', 'news', 'faq');

if(in_array($_POST['type'], $acceptedTypes)) {
	$type = $_POST['type'];
	$item = $_POST['item'];
	$ip = $_SERVER['REMOTE_ADDR'];
	$infosystem->Execute("INSERT IGNORE INTO `fc_like` SET `ip` = '{$ip}', `type` = '{$type}', `item` = {$item}, `date` = NOW()");
	list($likeCount) = $infosystem->Execute("SELECT COUNT(`ip`) FROM `fc_like` WHERE `type` = '{$type}' AND `item` = {$item}")->fields;
	echo ($likeCount);
}
?>