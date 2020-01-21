<?php 
spl_autoload_register('my_autoloader');
function my_autoloader($class){
    include 'classes/' . $class .'.php';
}

if (
    trim(isset($_POST['word'])) && trim(is_string($_POST['word'])) && trim(!empty($_POST['word']))

   ) 
    {
        $word = $_POST['word'];
       
        
        
        
        $controller = new Model;
        $cond =["select"=>"*"] ;
        $where = ["title"=>$word];
        $controller->search("posts",$cond,$where);


    }

?>