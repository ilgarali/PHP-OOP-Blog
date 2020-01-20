<?php 
session_start();
spl_autoload_register("getclass");
function getclass($class){
  include "../classes/" . $class .".php";
} ;

if ($_POST['title'] && $_POST['category'] && $_POST['text'])
  {
      
    $title = $_POST['title'];
    $category = $_POST['category'];
    $status = $_POST['status'];
    $text = $_POST['text'];
    $tags = $_POST['tags'];
    $img = $_FILES['img']['name'];
    $tmp_img = $_FILES['img']['tmp_name'];
   
            if 
        (
            trim(is_string($title)) && trim(isset($title)) && trim(!empty($title)) &&
            trim(is_string($category)) && trim(isset($category)) && trim(!empty($category)) &&
            trim(is_string($status)) && trim(isset($status)) && trim(!empty($status)) &&
            trim(is_string($text)) && trim(isset($text)) && trim(!empty($text)) &&
            trim(is_string($tags)) && trim(isset($tags)) && trim(!empty($tags))
        ) 
            {
                $getname = basename($img);
                $getext = pathinfo($getname,PATHINFO_EXTENSION);
                
                $valid = ["jpg","jpeg","png","gif"];
                $targetPath = "img/" . $img;
                if (in_array($getext,$valid)) {

                    move_uploaded_file($tmp_img,$targetPath);
                    if (isset($_SESSION['id'])) {
                        $sesid = $_SESSION['id'];
                    }
                    $insert = new Controller();
                    $data = 
                    [
                        "user_id"=>$sesid,
                        "category_id" => $category,
                        "title" => $title,
                        "img"=>$img,
                        "tags"=>$tags,
                        "text"=>$text,
                        "status"=>$status,
                        "hits"=>0
                    ];
                    $insert->insert("posts",$data);


                }

                
            }
        }


?>