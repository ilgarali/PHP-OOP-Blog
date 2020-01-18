<?php 
spl_autoload_register("getclass");
function getclass($class){
  include "../classes/" . $class .".php";
} ;

if (isset($_POST['logout'])) {
    $logout = $_POST['logout'];
   
    
        $tologout = new Controller;
        $tologout->logout();
    
}


?>