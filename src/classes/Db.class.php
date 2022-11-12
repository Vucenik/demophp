<?php


class Db{
    private string $dsn = "";
    private string $dbuser = '';
    private string $dbpassword = '';
    private $db=null;
    public function __construct(string $dsn,string $dbuser,string $dbpassword){
        $this->dsn = $dsn;
        $this->dbuser =$dbuser;
        $this->dbpassword =$dbpassword;

    }
    public function get_connection(){
        try{
            if($this->db===null){
                $this->db=new PDO($this->dsn,$this->dbuser,$this->dbpassword);
                $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
                $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            }
            return $this->db;

        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }
    
        
    }
//    // $upit = "SELECT * from Sudionici";
//     $upit = "SELECT * from Sudionici ";
//    // $upit = "SELECT * from Sudionici LIMIT 1";
//     $db_mysql=new Db(DSN,DBUSER,DBPAS);
//     $pdo=$db_mysql->get_connection();
// header("Content-Type:application/json;charset=utf-8");
//  class data {};
//   // $data =$pdo->query($upit)->fetchAll(PDO::FETCH_CLASS,'data');
//   // $data =$pdo->query($upit)->fetchAll(PDO::FETCH_OBJ);
//  //  $data =$pdo->query($upit)->fetchAll();
//  //  $prvi=$data[0];
//  //  var_dump($prvi['id_sudionici']);
 
//  $broj = $pdo->query("SELECT count(*) FROM Sudionici")->fetchColumn();
// $stmt=$pdo->prepare($upit);
// $stmt->execute();
// $data=$stmt->fetchAll();

// //var_dump($data,$broj);
//    echo phpinfo();
// // echo (json_encode(['data'=>$data],true));


?>