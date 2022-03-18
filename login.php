<?php
require_once 'AuthLogin.php';

$redirigir = 'index.php';
if (empty($_POST['user']) || empty($_POST['password'])) {
    print_r('faltan campos');
    header('Location: ' . $redirigir);
} else {
    $cs = new AuthLogin();
    $login = $cs->Login($_POST['user'], $_POST['password']);
    if ($login[0] === true) {
       echo "conexion sin errores";
    } else {
        $redirigir = 'index.php?mensaje=' . $login[1];
    }
}
header('Location: ' . $redirigir);
?>