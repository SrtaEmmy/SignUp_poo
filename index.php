<?php 
require_once('autoload.php'); 
require_once('config/Database.php');
  
if(isset($_GET['class'])){
    $class = $_GET['class'].'Controller';
}else{
    echo "No hay clase";
}

if(isset($class) && class_exists($class)){
    $object = new $class();

    if(isset($_GET['method']) && method_exists($object, $_GET['method'])){
        $method = $_GET['method'];
        $object->$method();
    }else{
        echo "el metodo no existe";
    }
}else{
    echo "la clase no existe";
}



 
 
?>