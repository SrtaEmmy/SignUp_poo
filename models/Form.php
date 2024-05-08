<?php

class Form
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $phone;
    public $rol;
    public $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }


    public function getPhone()
    {
        return $this->phone;
    }


    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    public function getRol()
    {
        return $this->rol;
    }


    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }


    public function signup(){
        $saved = false;

        try {
            $sql = "INSERT INTO users VALUES(NULL, '{$this->getName()}', '{$this->getEmail()}', '{$this->getPassword()}', {$this->getPhone()}, '{$this->getRol()}')";
            $saving = $this->db->query($sql);

            if ($saving) {
                $saved = true;
            }

            return $saved;

        } catch (Exception $e) { //para cuando el usuario ingrese un correo que ya existe en la bbdd
            $error_code = $e->getCode();

            if ($error_code == 1062) {
                return $saved;
            }
        }
    }



}


?>