<?php 
session_start();
spl_autoload_register("getclass");
function getclass($class){
  include "../classes/" . $class .".php";
} ;

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $delete = new Controller();
    $delete->delete("posts",["id"=>$id]);
}

?>