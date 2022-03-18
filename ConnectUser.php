<?php
require_once 'Connection.php';
require_once 'Usuario.php';

class ConnectUser extends Connection

{
    public function login($user, $password)
    {
        $q = 'SELECT id, password, name, email FROM usuarios ';
        $q .= 'WHERE user = ?';
        $query =  self::$connect->prepare($q);
        $query->bind_param("s", $user);
        if ($query->execute()) {
            $query->bind_result($id, $passworden, $name, $email);
            if ($query->fetch()) {
                if (password_verify($password, $passworden) === true) {
                    return new Usuario($user, $name, $email, $id);
                }
            }
        }
        return false;
    }

    public function save(Usuario $user, $password)
    {
        $q = 'INSERT INTO usuarios (user, name, email, password) ';
        $q .= 'VALUES (?, ?, ?, ?)';
        $query = self::$connect>prepare($q);
        $query->bind_param(
            "ssss",
            $user->getUsuario(),
            $user->getNombre(),
            $user->getApellido(),
            password_hash($password, PASSWORD_DEFAULT)
        );

        if ($query->execute()) {
           
            return self::$connect->insert_id;
        } else {
            return false;
        }
    }
}
