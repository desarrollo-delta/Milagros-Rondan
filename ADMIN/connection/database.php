<?php
class database {
    public function getConexion(){
        $server = "bydnc1dut5xcycds4qvn-mysql.services.clever-cloud.com:3306";
        $database = "bydnc1dut5xcycds4qvn";
        $user = "ulbuuxc6ez6mxoud";
        $pass = "YAxjAce9DkwnDbqHb5xI";
        try {
            $con = new mysqli($server, $user, $pass, $database);
            return $con;
        } catch (Exception $e) {
            echo 'Error en la conexion';
        }
    }
}

$connection = new database();
$connection -> getConexion();
?>