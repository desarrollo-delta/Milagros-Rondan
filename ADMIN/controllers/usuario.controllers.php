<?php
class usuarioControllers {
    public function signin(){
        if(isset($_POST['sesion'])){
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];
            if($usuario == "admin" && $contrasena == "admin123"){
                $data = array(
                    'id_usuario' => 1,
                    'nombre' => 'Omar Anthony',
                    'apellido' => 'Cordero Ferrua',
                    'perfil' => 'administrador'
                );
                $_SESSION['user'] = $data;
                header("Location: index.php");
            }else{
                $mensaje = "Usuario / Contraseña incorrecta";
                return $mensaje;
            }
        }
    }
}
?>