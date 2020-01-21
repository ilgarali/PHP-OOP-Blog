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


    // INSET DATA TO DATABASE $table = which table you want to insert data, $data your data that comes from form
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
   
       if ($result) {
        $res = ["res" => true];
        echo json_encode($res);
        return $result;
       }
       

    }

    // UPDATE FUNCTION $table = which table you want to update,$data your data that comes from form,$where for example WHERE id = 1

    public function update($table,$data=[],$where=[]){
        $sql = "UPDATE  ".$table." ";
        $sql .= " SET ";
        $updated ='';
        $i=0;
        
        foreach ($data as $key => $value) {
            $pre = ($i > 0)?" , ":" ";
            $updated = $pre.$key . " = '" . $value ."'";
            $sql .= $updated;
            $i++;
        }
        
        $i = 0;
        if (count($where) > 0) {
            $sql .= " WHERE ";
            $pre = ($i > 0)?" AND ":" ";
            foreach ($where as $key => $value) {
                $sql .= $pre.$key . " = " .$value;
                $i++;
            }
            
        } 
        
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        if ($result) {
           
            $res = ["res" => true];
        echo json_encode($res);
     
        return $result;
        }
        // if everything is fine that sends true response to fetch 
        

    }


    public function delete($table,$where=[]){
        $sql = "DELETE FROM " .$table . " WHERE ";
        $i=0;
        foreach ($where as $key => $value) {
            $pre = ($i>0)?" AND ":" ";
            $sql .= $pre.$key . " = " .$value ." ";
            $i++;
        }
     
        $stmt =$this->db->prepare($sql);
        $result = $stmt->execute();
        
     // if everything is fine that sends true response to fetch 
        $res = ["res" => true];
        echo json_encode($res);
        return $result;

    }


}