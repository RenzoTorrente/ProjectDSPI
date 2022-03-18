<?php
require_once 'Usuario.php';
require_once 'ConnectUser.php';
class AuthLogin
{
   protected $usuario = null;
 

    public function Login($user, $password)
    {
        $dbuser = new ConnectUser();
        $usuario = $dbuser->login($user, $password);
        //Si falló el login:
        if ($usuario === false) {
            return [false, 'Error de credenciales'];
        } else {
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [true, 'Usuario autenticado correctamente'];
        }
    }
}
?>
