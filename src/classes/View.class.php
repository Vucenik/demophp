<?php
class View{
    public function ispisi_json(array $data=[]){
        header("HTTP/1.0 200 OK");
        header("Content-Type:application/json;charset=utf-8");
        echo (json_encode(['data'=>$data],true));

    }
    public function ok (string $tekst){
        header("HTTP/1.0 200 OK");
        header("Content-Type:text/plain;charset=utf-8");
        echo $tekst;
    }
    public function bad (string $tekst){
        header("HTTP/1.1 404 Not Found");
        header("Content-Type:text/plain;charset=utf-8");
        echo $tekst;

    }


}

?>