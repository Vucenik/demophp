<?php
define('APP_ROOT',dirname(__FILE__,2));



require APP_ROOT.'/config/config.php';
require APP_ROOT.'/src/autoload.php';
require APP_ROOT.'/src/function.php';

//Session::start();
$db_mysql=new Db(DSN,DBUSER,DBPAS);
$model = new Model($db_mysql);
$model_film= new Model_filmovi($db_mysql);
$view = new View();
$view_film = new View_filmovi();
//var_dump(($model->daj_sve_sudionike()));
$kontroler = new Kontroler($model,$view);
$kontroler_filmovi = new Kontroler_filmovi($model_film,$view_film);
//$kontroler->daj_sve_sudionike();

?>



