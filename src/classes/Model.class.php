<?php
class Model{
    private DB $db;
    public function __construct(DB $db){
    $this->db = $db;
        
    }

    public  function  daj_sve_sudionike ():array{
        try{
         $upit_daj_sve = 'SELECT * from Sudionici';
         $pdo=$this->db->get_connection();
         $stmt=$pdo->prepare($upit_daj_sve);
         $stmt->execute();
         $data = $stmt->fetchAll();
         return $data;


        }catch (PDOException $e){
            throw new Exception($e->getMessage());
            return [];
        }
    }
    public function insert_sudionici():int{
        $unesi_vrijednosti = "INSERT INTO Sudionici(ime,datum,razred) VALUES (:ime,:datum,:razred)";
        try{
            $ime = filter_input(INPUT_POST,'ime');
            $datum=filter_input(INPUT_POST,'datum');
            $razred=filter_input(INPUT_POST,'razred');
            $unos=[
                ':ime'=>$ime,
                ':datum'=>$datum,
                ':razred'=>$razred
            ];
           // $greska='';
          //  $greska = filter_var($unos[':ime'],FILTER_VALIDATE_REGEXP,['options'=>['regexp'=>'/^[ČĆŽŠĐA-Z][čćžšđa-z]+\s+[ČĆŽĐŠA-Z][čćžšđa-z]+/']]);
            
          
          //  if(!$greska)return -2;
            $pdo=$this->db->get_connection();
            $stmt=$pdo->prepare($unesi_vrijednosti);
            $stmt->execute($unos);
            $broj=$stmt->rowCount();
            return $broj;




        }catch (PDOException $e){
            $kod = $e->getCode();
            //echo "kod ". $kod;
          //  if($kod==1062)return -1062;
            if($kod==23000)return -23000;
           //throw new Exception($e->getMessage());
         //  echo $e->getMessage();
            return -1;
        }
    }
    public function edit_sudionici():int{
            $edit_vrijednosti = "UPDATE Sudionici SET ime=:ime, datum=:datum,razred=:razred WHERE id_sudionici = :id_sudionici";
            try{
                $ime = filter_input(INPUT_POST,'ime');
                $datum=filter_input(INPUT_POST,'datum');
                $razred=filter_input(INPUT_POST,'razred');
                $id_sudionici=filter_input(INPUT_POST,'id_sudionici');
                $unos=[
                    ':ime'=>$ime,
                    ':datum'=>$datum,
                    ':razred'=>$razred,
                    ':id_sudionici'=>$id_sudionici
                ];
                $pdo=$this->db->get_connection();
                $stmt=$pdo->prepare($edit_vrijednosti);
                $stmt->execute($unos);
                $broj = $stmt->rowCount();
                return $broj;


            }catch(PDOException $e){

                return -1;
            }
    }
    public function delete_sudionici():int{

 $delete_vrijednosti = "DELETE FROM Sudionici  WHERE id_sudionici = :id_sudionici";
 try{
    $id_sudionici=filter_input(INPUT_POST,'id_sudionici');
    $unos=[
      
        ':id_sudionici'=>$id_sudionici
    ];

  $pdo=$this->db->get_connection();
                $stmt=$pdo->prepare($delete_vrijednosti);
                $stmt->execute($unos);
                $broj = $stmt->rowCount();
                return $broj;

 }catch(PDOException $e){
    return -1;
 }
    }

}


?>