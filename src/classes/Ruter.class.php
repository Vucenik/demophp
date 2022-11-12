<?php


class Ruter  {
    //statična funkcija učitava string kao naziv php stranice i mapira ga ko naciiv rute oblika /naziv tako da napravi novu funkciju sa includ i koja se pozica iz polja
    protected static function ucitaj (string $k):callable{
        return function() use($k){
            $path = APP_ROOT.'/src/pages'.$k.'.php';
     
            if(!file_exists($path)){  
               // include APP_ROOT.'/src/pages/greska.html';
                include APP_ROOT.'/src/pages/templates/filmovi/greska_template.php';
                exit;
                 };
                 include $path;
           
            };
    }
    // polje koje sprema rute i njima pridruženu funkcije
   protected  static $polje = array();
   //pjavna funkcija pomoću koje se registrira putanja sa pridruženoj funkciji ili se generira funkcija koja radi include sa putanjom do stranice  
   public static function set(string $kljuc,callable $fn=NULL):void{

       if(!isset($fn)){
        
        self::$polje[$kljuc]=self::ucitaj($kljuc);
        return;
       }
       self::$polje[$kljuc]=$fn;

    }
    // dohvaća funkciju i pokreće je prema datoj putanji kao ključu za polje
    public static function get(string $kljuc):callable{
        if(!array_key_exists($kljuc, self::$polje)){
          //  include APP_ROOT.'/src/pages/greska.html';
          include APP_ROOT.'/src/pages/templates/filmovi/greska_template.php';
            exit; 
        }
        return self::$polje[$kljuc];
    }
    public static function get_root(){
        return self::$polje;
    }

}




?>