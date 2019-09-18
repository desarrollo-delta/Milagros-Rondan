<?php
class database {
    public function getConexion(){
        $server = "localhost:3306";
        $database = "milagosrondan";
        $user = "root";
        $pass = "admin";
        try {
            $con = new mysqli($server, $user, $pass, $database);
            echo 'Conectado';
            return $con;
        } catch (Exception $e) {
            echo 'Error en la conexion';
        }
    }
}

$connection = new database();
$connection -> getConexion();
?>