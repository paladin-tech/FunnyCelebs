<?
require_once("xajax_core/xajaxAIO.inc.php");

$xajax = new xajax();

//$xajax->setFlag('debug', true);

//	Registracija xajax funkcija
$xajax->registerFunction("setVote");

function setVote($type, $item) {

	global $infosystem;

	$objResponse = new xajaxResponse();

	$ip = $_SERVER['REMOTE_ADDR'];
	$infosystem->Execute("INSERT INTO `fc_like` SET `ip` = '{$ip}', `type` = '{$type}', `item` = {$item}, `date` = NOW()");

	$odgovor = "<div>{$datum}</div>";
	$odgovor .= "<div id='divNovostNaslov' nid='{$novost}'><b>{$naslov}</b></div><br /><div style='line-height: 150%'>";
	if(is_file("images/mf-novost-100px-{$novostid}.jpg")) $odgovor .= "<img src=\"images/mf-novost-120px-{$novostid}.jpg\" align=\"left\" style=\"padding: 3px; border: solid 1px; margin: 0px 3px 3px 0px;\" />";
	$odgovor .= "{$kratka}</div><br style=\"clear: both\" />";
	$odgovor .= "<div align=\"right\"><a href=\"index.php?str=novost&novost={$novostid}\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('imgDetaljnijeNovostDesno','','images/detaljnije-button-on.jpg',1)\"><img src=\"images/detaljnije-button.jpg\" alt=\"Detaljnije\" name=\"imgDetaljnijeNovostDesno\" width=\"79\" height=\"16\" border=\"0\" id=\"imgDetaljnijeNovostDesno\" /></a></div>";
	$objResponse->assign("divNovost", "innerHTML", $odgovor);
	$objResponse->script("$('#divNovost').fadeIn('slow')");

	return $objResponse;
}

	$xajax->processRequest();
?>