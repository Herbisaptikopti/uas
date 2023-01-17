<?php 

$server_name = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$server_name .= "://".$_SERVER['HTTP_HOST'];

const APP_DIR = 'jurnal_unuha_1';
$base_dir = $server_name."/".APP_DIR;
$base_url = $server_name."/".APP_DIR;


?>