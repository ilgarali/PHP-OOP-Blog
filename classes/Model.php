<?php 
class Model extends DB
{
    public function getData($table,$conditions = array(),$where = [])
    {
        $sql = "SELECT ";
        $sql .=array_key_exists("select",$conditions)?$conditions['select']:'*';
        $sql .= " FROM " .$table;
        if (array_key_exists("leftjoin",$conditions)) {
            $sql .= " LEFT JOIN " .$conditions['leftjoin'];
            $sql .= " on " . $table.".".$conditions['from'];
            $sql .= " = " . $conditions['leftjoin'].".".$conditions['to'];
          
        }
        if (count($where) > 0) {
            $sql .=" WHERE ";
            $i=0;
            foreach ($where as $key => $value) {
                $pre = ($i > 0)?" AND " : "";
                $sql .=$pre.$key . " = " . $value;
                $i++;
            }
        }
          if (array_key_exists("orderby",$conditions)) {
              $sql.=" ORDER BY ".$table.".".$conditions['orderby'] ." ". $conditions['orderedtype'];
              
          }
    
       
          if (array_key_exists("starting_limit",$conditions) && array_key_exists("limit",$conditions)) {
            $sql.=" LIMIT " . $conditions['limit'];
        }
          if (array_key_exists("page",$conditions)) {
            $stmt =$this->db->prepare($sql);
            $stmt->execute();
            $data2= $stmt->rowCount();
           

            if (array_key_exists("limit",$conditions)) {
                $total_pages = ceil($data2 / (int)$conditions['limit']);
                $starting_limit = ((int)$conditions['page'] - 1) * $conditions['limit'];
                $sql.=" LIMIT " .$starting_limit. " , " . $conditions['limit'];
                
                
            }
            $stmt =$this->db->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            
            return [$data,$total_pages];
            
          }
          else{
            $stmt =$this->db->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
           
            return $data;
          }

        
    }
 

}

