<?php 
spl_autoload_register('my_autoloader');
function my_autoloader($class){
    include 'classes/' . $class .'.php';
}

if (
    trim(isset($_POST['name'])) && trim(is_string($_POST['name'])) && trim(!empty($_POST['name'])) &&
    trim(isset($_POST['email'])) && trim(is_string($_POST['email'])) && trim(!empty($_POST['email'])) &&
    trim(isset($_POST['website'])) && trim(is_string($_POST['website'])) && trim(!empty($_POST['website'])) &&
    trim(isset($_POST['message'])) && trim(is_string($_POST['message'])) && trim(!empty($_POST['message']))
   ) 
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        
        $message = $_POST['message'];
        
        $controller = new Controller;
        $insert =["name"=>$name,"email"=>$email,"website"=>$website,"message"=>$message] ;
        $controller->insert("contact",$insert);


    }

?>