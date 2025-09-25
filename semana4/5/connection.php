<?php


require_once(__DIR__ . "/config.php");

class Conexion
{
    private $charset = 'utf8mb4';
    private $pdo;

    public function __construct()
    {
        $dsn = "mysql:host=" . HOST . ";dbname=" . DB . ";charset=$this->charset";

        $opciones = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, DB_USER, DB_PASSWORD, $opciones);
        } catch (PDOException $e) {
            die("NO SE PUEDE CONECTAR A LA BASE DE DATOS");
        }
    }

    public function getConexion()
    {
        return $this->pdo;
    }
}
