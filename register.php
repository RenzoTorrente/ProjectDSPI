<?php
require_once 'AuthRegister.php';

$redirigir = 'index.php';
if (empty($_POST['user']) || empty($_POST['password'])) {
    print_r('faltan campos');
    header('Location: ' . $redirigir);
} else {
    $cs = new AuthRegister();
    $login = $cs->Register($_POST['user'], $_POST['password'], $_POST['email']);
    if ($login[0] === true) {
        $redirigir = 'home.php';
    } else {
        $redirigir = 'index.php?mensaje=' . $login[1];
    }
}
header('Location: ' . $redirigir);


?>