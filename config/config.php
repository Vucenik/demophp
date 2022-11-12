<?php

define("APP_DOMAIN",$_SERVER['HTTP_HOST']);
define('ROOT_FOLDER','public');
$this_folder = substr(__DIR__,strlen($_SERVER['DOCUMENT_ROOT']));
$parent_folder = dirname($this_folder);

//define("DOC_ROOT",$parent_folder.DIRECTORY_SEPARATOR.ROOT_FOLDER.DIRECTORY_SEPARATOR);
define("DOC_ROOT",$parent_folder.'/'.ROOT_FOLDER.'/');

// databases setings
$type = 'mysql';
$server = '153.92.222.202';
$port='';
$charset='utf8mb4';
$dbbaza = 'poo';
$dbuser= '';
$dbpas='';
define('DBUSER',"$dbuser");
define('DBPAS',"$dbpas");

define ("DSN","$type:host=$server;dbname=$dbbaza;port=$port;charset=$charset");


?>