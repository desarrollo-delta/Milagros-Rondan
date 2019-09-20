<?php
session_start();
if(isset($_SESSION['user'])){
    require_once("controllers/config.php");
    $layouts = new config();
    $layouts -> main();
}else{
    include('views/auth/signin.php');
}
?>