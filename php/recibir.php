<?php 
require_once "dropbox-sdk/Dropbox/autoload.php";
use \Dropbox as dbx;

//use \Dropbox as dbx;
SESSION_START();
$appInfo = $_SESSION['appInfo'];
$webAuth = $_SESSION['webAuth'];
//$appInfo = dbx\AppInfo::loadFromJsonFile("dropbox-sdk/app-info.json");
//$webAuth = new dbx\WebAuthNoRedirect($appInfo, "Datastoress");
print_r($_GET["code"]);

$codigo = $_GET["code"]."";

list($accessToken, $dropboxUserId) = $webAuth->finish($codigo."");
print "Access Token: " . $accessToken . "\n";

$dbxClient = new dbx\Client($accessToken, "Datastoress");
$accountInfo = $dbxClient->getAccountInfo();
print_r($accountInfo);
?>