<?php
require_once 'Usuario.php';
require_once 'ConnectUser.php';
class AuthRegister
{
    protected $username;


    public function Register($username, $email, $password){
        $dbuser = new ConnectUser();
        $usuario = new Usuario($username, $email,$password, "name");
        $id = $dbuser->save($usuario, $password);
        if ($id === false) {
            return [false, 'Error al crear el usuario'];
        } else {
            $usuario->setId($id);
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [true, 'Usuario creado correctamente'];
        }
    }
}

?>
