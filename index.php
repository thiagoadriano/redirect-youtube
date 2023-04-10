<?php
require_once 'libraries/Mobile_Detect.php';
$detect = new Mobile_Detect();

$url = $_SERVER['REQUEST_URI'];
$idWatch = end(explode('/', $url));
$redirect = 'https://youtu.be/';

if ($idWatch == null) {
	header("Location: " . $redirect);
	exit();
}

if ( $detect->isAndroidOS() ) {
	$redirect = str_replace('https', 'vnd.youtube', $redirect);
} else if ( $detect->isiOS() ) {
	$redirect = str_replace('https', 'youtube', $redirect);
}

header("Location: " . $redirect . '/' . $idWatch);
exit();