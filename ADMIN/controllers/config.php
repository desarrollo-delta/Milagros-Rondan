<?php
class config {
    public function main(){
        include 'views/layouts/main.php';
    }

    public function pages(){
        if(isset($_GET['action'])){
            $action = $_GET['action'];
            if($action == 'portada' || $action == 'nosotros' || $action == 'eventos'){
                include 'views/mantenimiento/'.$action.'.php';
            }else if($action == 'logout'){
                session_destroy();
                ?>
                <script>window.location.href = 'index.php';</script>
                <?php
            }
        }else{
            include 'views/principal/index.php';
        }
    }
}
?>