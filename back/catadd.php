<?php 
session_start();
spl_autoload_register("getclass");
function getclass($class){
  include "../classes/" . $class .".php";
} ;

if (isset($_POST['getcat'])) {
    $insert = new Controller();
    $getcat = $_POST['getcat'];
    $insert->insert("category",['category'=>$getcat]);
}


if (isset($_POST['edit'])) {
  $insert = new Controller();
  $edit = $_POST['edit'];
  $where = $_POST['where'];
  $insert->update("category",["category"=>$edit],["id"=>$where]);
}

if (isset($_POST['id'])) {
  $insert = new Controller();
  $id = $_POST['id'];

  $insert->delete("category",["id"=>$id]);
}
if (isset($_POST['com_id'])) {
  $insert = new Controller();
  $id = $_POST['com_id']; 

  $insert->update("comments",["status"=>1],["id"=>$id]);
}

if (isset($_POST['delcom'])) {
  $insert = new Controller();
  $id = $_POST['delcom']; 

  $insert->delete("comments",["id"=>$id]);
}



?>