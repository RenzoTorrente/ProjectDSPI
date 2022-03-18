<?php
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
class Connection
{
    protected static $connect = null;

    public function __construct()
    {
        if (is_null(self::$connect)) {
            self::$connect = new mysqli(
                $_ENV['SERVER'],
                $_ENV['USER'],
                $_ENV['PASSWORD'],
                $_ENV['DB']
            );
            if (self::$connect->connect_error) {
                $error = 'Error de conexión: ' . self::$connect->connect_error;
                self::$connect = null;
                echo 'existe error';
                die($error);
            }
            self::$connect->set_charset('utf8');
            echo 'no existe error';
        }
    }
}
?>
