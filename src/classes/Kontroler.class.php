<?php
class Kontroler{
    private Model $model;
    private View $view;
    public function __construct(Model $model,View $view){
        $this->model=$model;
        $this->view=$view;

    }
    public function daj_sve_sudionike():callable{
        
       
        return function() {
            $data = $this->model->daj_sve_sudionike();
    $this->view->ispisi_json($data);
};
    }

    public function insert_sudionici():callable{
        return function(){
            $red = $this->model->insert_sudionici();
            if($red==-1){
                $this->view->bad("Dogodila se neka greška");
                exit;
            };
            if($red==-2){
                $this->view->bad("Krivi format imena treba biti Ivo Ivić");
                exit;
            };
            if($red==-23000){
                $this->view->bad("Dogodila se greška dupli unos");
                exit;
            };
           
            $this->view->ok("Sve je u redu unesen je $red red");

        };
    }
    public function edit_sudionici():callable{
        return function(){
            $red=$this->model->edit_sudionici();
            
                if($red==-1){
                    $this->view->bad("Dogodila se neka greška");
                    exit;
                };
                $this->view->ok("Sve je u redu editiran je $red red");

            

        };
    }
    public function delete_sudionici():callable{
        return function(){
        $red=$this->model->delete_sudionici();
        if($red==-1){
            $this->view->bad("Dogodila se neka greška");
            exit;
        };
        $this->view->ok("Sve je u redu obrisan je $red red");


        };

    }
    
}
?>