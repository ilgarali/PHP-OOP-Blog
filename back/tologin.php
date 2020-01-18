<?php 
spl_autoload_register("getclass");
function getclass($class){
  include "../classes/" . $class .".php";
} ;

if ($_POST['email'] && $_POST['password']) {
    $email = $_POST['email'];
$password = $_POST['password'];
    if 
(
    trim(is_string($email)) && trim(isset($email)) && trim(!empty($email)) &&
    trim(is_string($password)) && trim(isset($password)) && trim(!empty($password))
) 
    {
        $check = new Controller;
        $check->login($email,$password);
        
    }
}


?>