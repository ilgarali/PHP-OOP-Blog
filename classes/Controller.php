<?php 
class Controller extends DB{
    public function login($email,$password) {
        $sql = "SELECT id FROM users WHERE email = ? AND `password` = ? ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email,md5($password)]);
        $data = $stmt->fetch();
        if (isset($data['id'])) {
            session_start();
            $_SESSION['id'] = $data['id'];
            $res = ["res" => true];
            echo json_encode($res);
        }
      
      

    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location:login.php");
    }
    public function insert($table,$data =[]){
        $sql = "INSERT INTO " .$table. " ( ";
        $columns = implode(",",array_keys($data));
        $values = ":".implode(",:",array_keys($data));
        
        $sql .= " ". $columns ." ) ";
        $sql .= " VALUES ( ".$values. " )" ;

        $stmt=$this->db->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":".$key,$value);
        }
       $result = $stmt->execute();
       $res = ["res" => true];
       echo json_encode($res);
       return $result;
        
    }
}