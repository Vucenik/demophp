<?php


class Model_filmovi{
    private DB $db;
    public function __construct(DB $db){
    $this->db = $db;
            }
            // metoda daj sve filmovie
            public function daj_sve_filmove():array{
                $upit_daj_sve = 'SELECT * from Filmovi'; 
                try{
                  
                    $pdo=$this->db->get_connection();
                    $stmt=$pdo->prepare($upit_daj_sve);
                    $stmt->execute();
                    $data = $stmt->fetchAll(PDO::FETCH_CLASS,'Filmovi');
                    return $data;
           
           
                   }catch (PDOException $e){
                       throw new Exception($e->getMessage());
                       return [];
                   }
            }//kraj metode daj sve filmove
            //metoda trazi po zanru
            public function daj_trazi_po_zanru(string $zanr):array{
                $upit_daj_sve = "SELECT * from Filmovi WHERE zanr LIKE :zanr";
                try{
                  $podaci=[
                      ':zanr'=>"%$zanr%"

                  ];
                    $pdo=$this->db->get_connection();
                    $stmt=$pdo->prepare($upit_daj_sve);
                    $stmt->execute($podaci);
                    $data = $stmt->fetchAll(PDO::FETCH_CLASS,'Filmovi');
                    //$datum = new DateTime($data->$godina_izlaska);

                    return $data;
           
           
                   }catch (PDOException $e){
                       throw new Exception($e->getMessage());
                       return [];
                   }
            }//kraj metode trazi po zanru
            //metota trazi po nazivu
            public function daj_trazi_po_nazivu(string $naziv):array{
                $upit_daj_sve = "SELECT * from Filmovi WHERE naziv LIKE :naziv";
                try{
                  $podaci=[
                      ':naziv'=>"%$naziv%"

                  ];
                    $pdo=$this->db->get_connection();
                    $stmt=$pdo->prepare($upit_daj_sve);
                    $stmt->execute($podaci);
                    $data = $stmt->fetchAll(PDO::FETCH_CLASS,'Filmovi');
                    return $data;
           
           
                   }catch (PDOException $e){
                     //  throw new Exception($e->getMessage());
                       return [];
                   }
            }//kraj metode trazi po nazivu
            // metoda insert_filmovi
            public function insert_filmovi():int{
                $unesi_vrijednosti = "INSERT INTO Filmovi(naziv,godina_izlaska,zanr,cijena) VALUES (:naziv,:godina_izlaska,:zanr,:cijena)";
                try{
                    $naziv = filter_input(INPUT_POST,'naziv');
                    $godina_izlaska=filter_input(INPUT_POST,'godina_izlaska');
                    $zanr=filter_input(INPUT_POST,'zanr');
                    $cijena=filter_input(INPUT_POST,'cijena');
                    $unos=[
                        ':naziv'=>$naziv,
                        ':godina_izlaska'=>$godina_izlaska,
                        ':zanr'=>$zanr,
                        ':cijena'=>$cijena
                    ];
                   
                    $pdo=$this->db->get_connection();
                    $stmt=$pdo->prepare($unesi_vrijednosti);
                    $stmt->execute($unos);
                    $broj=$stmt->rowCount();
                    return $broj;
        
        
        
        
                }catch (PDOException $e){
                  //  echo($e->getMessage().$e->getCode());
                    $kod = $e->getCode();
                  
if ($kod==23000) {
    return -1062;
    
  
};
                  
                    return -1;
                }
            }// kraj metode insert filmovi
            //metoda daj film po id
            public function daj_film_po_id(int $id_film):Filmovi{
                $upit_daj_film_po_id = 'SELECT * from Filmovi WHERE id_film=:id_film';
             
                try{
                    $podaci=[
                        ':id_film'=>$id_film

                    ];
                    $pdo=$this->db->get_connection();
                    $stmt=$pdo->prepare($upit_daj_film_po_id);
                    $stmt->execute($podaci);
                    
                   $stmt->setFetchMode(PDO::FETCH_CLASS,'Filmovi');
                  $data = $stmt->fetch();
                
              
                   if($data) return $data;
                   return new Filmovi();

                }catch (PDOException $e){
                     echo($e->getMessage().$e->getCode());
                    return new Filmovi();

                }



            }// kraj metode daj film po id
            //metoda filmovi edit -save
            public function filmovi_save_edit(Filmovi $film):int{
                $edit_vrijednosti = "UPDATE Filmovi SET naziv=:naziv, godina_izlaska=:godina_izlaska,zanr=:zanr,cijena=:cijena WHERE id_film =:id_film";
                try{
                   
                   // $unos=(array)$film;
                    $unos= [
                        ':id_film'=>$film->id_film,
                        ':naziv'=>$film->naziv,
                        ':godina_izlaska'=>$film->godina_izlaska,
                        ':zanr'=>$film->zanr,
                        ':cijena'=>$film->cijena
                    ];
                  // var_dump($unos);
                    $pdo=$this->db->get_connection();
                    $stmt=$pdo->prepare($edit_vrijednosti);
                    $stmt->execute($unos);
                    $broj=$stmt->rowCount();
                //    echo "$ broj $broj";
                    return $broj;
        
        
        
        
                }catch (PDOException $e){
                    echo($e->getMessage().$e->getCode());
                    $kod = $e->getCode();
                  
            if ($kod==23000) {
                return -1062;  
};
                  
                    return -1;
                }
            }// kraj metode edit save filmovi
            /// filmovi  delete Filmovi sava
            public function filmovi_save_delete(int $id_film):int{
                  $delete_vrijednosti = "DELETE FROM Filmovi  WHERE id_film = :id_film";
                  try{
                   
                    // $unos=(array)$film;
                     $unos= [
                         ':id_film'=>$id_film,
                      
                     ];
                   // var_dump($unos);
                     $pdo=$this->db->get_connection();
                     $stmt=$pdo->prepare($delete_vrijednosti);
                     $stmt->execute($unos);
                     $broj=$stmt->rowCount();
                 //    echo "$ broj $broj";
                     return $broj;
         
         
         
         
                 }catch (PDOException $e){
                     //echo($e->getMessage().$e->getCode());
                   
                   
                     return -1;
                 }

            }
            

}

?>
