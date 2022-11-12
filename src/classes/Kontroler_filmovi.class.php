<?php
class Kontroler_filmovi{
    private Model_filmovi $model;
    private View_filmovi $view;
    public function __construct(Model_filmovi $model,View_filmovi $view){
        $this->model=$model;
        $this->view=$view;

    }
    public function Filmovi():callable{
        return function(){
            $data_filmovi = $this->model->daj_sve_filmove();
           // var_dump($data_filmovi);
            $this->view->show('filmovi',[
                'title'=>'Filmovi-SSR DEMO',
                'model'=>$data_filmovi
            ]);

        };

    }
    public function trazi_po_zanru():callable{
        $zanr=filter_input(INPUT_GET,'zanr');
        return function () use($zanr){
            $data_filmovi = $this->model->daj_trazi_po_zanru($zanr);
           // var_dump($data_filmovi);
            $this->view->show('filmovi',[
                'title'=>'Filmovi-SSR DEMO',
                'model'=>$data_filmovi
            ]);

        };
    }
    public function trazi_po_nazivu():callable{
        $naziv=filter_input(INPUT_GET,'dio_naslova');
        return function () use($naziv){
            $data_filmovi = $this->model->daj_trazi_po_nazivu($naziv);
           // var_dump($data_filmovi);
            $this->view->show('filmovi',[
                'title'=>'Filmovi-SSR DEMO',
                'model'=>$data_filmovi
            ]);

        };

    }
    public function dodaj():callable{
        return function(){
            $this->view->show(
                'dodaj',[
                    'title'=>'Insert Filmovi-SSR DEMO'
                ]
            );

        };
    }
    public function insert_filmovi():callable{
        return function(){
            $broj=$this->model->insert_filmovi();
            //echo "broj $broj";
            if($broj==-1062){
                $this->view->show('dodaj',[
                    'title'=>'Insert Filmovi-SSR DEMO',
                    'poruka'=>'Unos neuspiješan Film već postoji'

                ]);
                exit;
            };
            if($broj<=0){
                $this->view->show('dodaj',[
                    'title'=>'Insert Filmovi-SSR DEMO',
                    'poruka'=>'Unos neuspiješan dogodila se neka greška'

                ]);
                exit;
            };
          
                $this->view->show('dodaj',[
                    'title'=>'Insert Filmovi-SSR DEMO',
                    'poruka'=>"Unos uspiješan unesen je $broj film"

                ]);
                exit;
          

        };

    }
    public function filmovi_edit():callable{
       
     
        return function () {
            $id_film=filter_input(INPUT_GET,'id_film');
            $data_film = $this->model->daj_film_po_id($id_film);
            if(!isset($data_film->id_film)){
                $this->view->show('edit',[
                    'title'=>'Delete Filmovi-SSR DEMO',
                    'model'=>$data_film,
                    'poruka'=>'Nepostojeći Film'
                ]);
                exit;
            } 
           // var_dump($data_film);
            $this->view->show('edit',[
                'title'=>'Edit Filmovi-SSR DEMO',
                'model'=>$data_film
            ]);

        };
    }
    public function filmovi_save_edit():callable{
       

        return function (){

            $id_film=filter_input(INPUT_POST,'id_film');

            if(!$id_film){
                $this->Filmovi()();
                exit;
            }
            $naziv = filter_input(INPUT_POST,'naziv');
            $godina_izlaska=filter_input(INPUT_POST,'godina_izlaska');
            $zanr=filter_input(INPUT_POST,'zanr');
            $cijena=filter_input(INPUT_POST,'cijena');
          
           // echo $naziv.$godina_izlaska.$zanr.$cijena.$id_film;
            $film= new Filmovi();
         
            $film->naziv=$naziv;
            $film->godina_izlaska=$godina_izlaska;
            $film->zanr=$zanr;
            $film->cijena=$cijena;
            $film->id_film=$id_film;

           // var_dump($film);



            $broj=$this->model->filmovi_save_edit($film);
         //   echo " broj kotroler $broj";
            if($broj==-1062){
                $this->view->show('edit',[
                    'model'=>$film,
                    'title'=>'Edit Filmovi-SSR DEMO',
                    'poruka'=>'Editiranje neuspiješano Film već postoji'
                ]);
                exit;
            }
            if($broj<=0){
                $this->view->show('edit',[
                    'model'=>$film,
                    'title'=>'Edit Filmovi-SSR DEMO',
                    'poruka'=>'Editiranje neuspiješano dogodila se neka greška'
                ]);
                exit;
            };
            $this->view->show('edit',[
                'model'=>$film,
                'title'=>'Edit Filmovi-SSR DEMO',
                'poruka'=>"Editiranje uspiješano editiran $broj film"
            ]);
            exit;

        };
        
    }
    public function filmovi_delete(){
        
        return function () {
            $id_film=filter_input(INPUT_GET,'id_film',FILTER_VALIDATE_INT);

            $data_film = $this->model->daj_film_po_id($id_film);

            if(!isset($data_film->id_film)){
                $this->view->show('delete',[
                    'title'=>'Delete Filmovi-SSR DEMO',
                    'model'=>$data_film,
                    'poruka'=>'Nepostojeći Film'
                ]);
                exit;
            } 
           // var_dump($data_film);
            $this->view->show('delete',[
                'title'=>'Delete Filmovi-SSR DEMO',
                'model'=>$data_film
            ]);

        };

    }
    public function filmovi_save_delete():callable{
       

        return function (){
           
            $id_film=filter_input(INPUT_POST,'id_film',FILTER_VALIDATE_INT);
        
          

if(!$id_film){
    $this->Filmovi()();
    exit;
}


            $broj=$this->model->filmovi_save_delete($id_film);
         //   echo " broj kotroler $broj";
           
            if($broj<=0){
                $data_film = $this->model->daj_film_po_id($id_film);
                $this->view->show('delete',[
                    'model'=>$data_film,
                    'title'=>'Delete Filmovi-SSR DEMO',
                    'poruka'=>'Delete neuspiješano dogodila se neka greška'
                ]);
                exit;
            };
            $this->Filmovi()();
            exit;

        };
    }
}

    ?>