<?php
require_once('models/Form.php');


class FormController{

    public $db;

    public function __construct(){
        $this->db = Database::connect();
    }


    public function index(){
        $error = 0;

        if($_SERVER['REQUEST_METHOD']==='POST'){
            if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['phone']) && !empty($_POST['rol'])) {
    
                $name = mysqli_real_escape_string($this->db, $_POST['name']);
                $email = mysqli_real_escape_string($this->db, $_POST['email']);
                $password = mysqli_real_escape_string($this->db, $_POST['password']);
                $phone = mysqli_real_escape_string($this->db, $_POST['phone']);
                $rol = mysqli_real_escape_string($this->db, $_POST['rol']);
    
                // validaciones
                if(!is_string($name) || preg_match("/[0-9]/", $name)){
                    $error = 'Nombre no válido';
                }
    
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $error = 'email no válido';
                }
    
                if(strlen($password)<5){
                    $error = 'La contraseña debe ser mayor a 5 carácteres';
                }
                   //validar solo telefonos de españa
                if(!preg_match("/^(6|7|9)[0-9]{8}$/", $phone)){
                    $error = 'número de teléfono no válido';
                }

                if($error == 0){
                    $ecrypted_password = password_hash($password, PASSWORD_DEFAULT);

                    $form = new Form();
                    $form->setName($name);
                    $form->setEmail($email);
                    $form->setPassword($ecrypted_password);
                    $form->setPhone($phone);
                    $form->setRol($rol);

                    $saved = $form->signup();
                }
    
            } else {
                $error = 'Rellena todos los campos';
            }
        }


        $saved;
        require_once ('views/form.php');
    }
}


?>