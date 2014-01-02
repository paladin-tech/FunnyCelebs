<?
session_start();
unset($_SESSION['fb_589256764479104_code']);
unset($_SESSION['fb_589256764479104_access_token']);
unset($_SESSION['fb_589256764479104_user_id']);
var_dump($_SESSION);
header('Location: index.php?' . $_SERVER['QUERY_STRING']);
?>