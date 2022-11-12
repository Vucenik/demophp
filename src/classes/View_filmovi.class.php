<?php
class View_filmovi extends View{
    //private Template $template;
   /* function __construct($template)
    {
$this->template =$template;
    }*/
    public function show(string $name,array $setings =['title'=>'Filmovi-POU','script'=>'','model'=>[]]){
    $path = APP_ROOT.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR
    .'pages'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR
    .'filmovi'.DIRECTORY_SEPARATOR.
    $name.'_template.php';

   // return function () use ($path, $setings): void {
     
        if (!file_exists($path)) {
            echo "greska";
            include APP_ROOT.'/src/pages/greska.html';
            exit;
        };
        include $path;
  //  };
}
    
 /*   public  function render(){
        return $this->template;
    }
   */
    }
    ?>