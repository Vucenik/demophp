<?php
//include '../src/bootstrap.php';
include '..'.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'bootstrap.php';

//echo DOC_ROOT;

$ruta=array_key_exists('PATH_INFO',$_SERVER) ?$_SERVER['PATH_INFO']:"/";
//echo $ruta;

///*****Ruter za sudionike */
Ruter::set("/index.php",function():void{
  include APP_ROOT.'/src/pages/sudionici.php';

});
Ruter::set("/",function():void{
  include APP_ROOT.'/src/pages/sudionici.php';

});
Ruter::set("/sudionici");

Ruter::set("/daj-sve-sudionike",$kontroler->daj_sve_sudionike());
Ruter::set("/insert-sudionici",$kontroler->insert_sudionici());
Ruter::set("/edit-sudionici",$kontroler->edit_sudionici());
Ruter::set("/delete-sudionici",$kontroler->delete_sudionici());


// Ruter::set("/daj-sve-sudionike",function() use ($kontroler){
//   $kontroler->daj_sve_sudionike();
// });

////*******Ruter za filmove */
Ruter::set("/Filmovi",$kontroler_filmovi->Filmovi());
Ruter::set("/trazi_po_zanru",$kontroler_filmovi->trazi_po_zanru());
Ruter::set("/trazi_po_nazivu",$kontroler_filmovi->trazi_po_nazivu());
Ruter::set("/Filmovi-dodaj",$kontroler_filmovi->dodaj());
Ruter::set("/insert_filmovi",$kontroler_filmovi->insert_filmovi());
Ruter::set("/Filmovi-edit",$kontroler_filmovi->filmovi_edit());
Ruter::set("/Filmovi-save-edit",$kontroler_filmovi->filmovi_save_edit());
Ruter::set("/Filmovi-delete",$kontroler_filmovi->filmovi_delete());
Ruter::set("/Filmovi-save-delete",$kontroler_filmovi->filmovi_save_delete());
Ruter::get($ruta)();

?>