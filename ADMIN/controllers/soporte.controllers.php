<?php
require_once ('connection/database.php');
class soporteControllers extends database{

    public function portada_registrar(){
        if(isset($_POST['registrar_portada'])){
            #Obtenemos las variables del POST
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $comentario = $_POST['comentario'];
            #Random
            function aleatorio($length = 25) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }
            #------------------------------------------------------------------
            #Configuramos las extensiones
            $ext = $_FILES['foto_portada']['name'];
            $split = explode('.',$ext);
            $extension = $split[1];
            #Validamos las extensiones
            if($extension == "png" || $extension == "jpg" || $extension == "jpeg"){
                #Asignamos un nombre a la imagen
                $nombre_aleatorio = aleatorio(25);
                $nombre_imagen = $nombre_aleatorio.'.'.$extension;
                $ruta = 'img/portada/'.$nombre_imagen;
                $archivo = $_FILES['foto_portada']['tmp_name'];
                move_uploaded_file($archivo, $ruta);
                #Sentencia SQL
                $sql = "INSERT INTO milagosrondan.portada (foto1, texto1, texto2, texto3, estado) VALUES ('$nombre_imagen', '$titulo', '$subtitulo', '$comentario', '1')";
                $conexion = database::getConexion();
                $query = mysqli_query($conexion, $sql);
                if($query){
                    $data = array(
                        'status' => 'success',
                        'message' => 'Portada registrada correctamente'
                    );
                    return $data;
                }else{
                    $data = array(
                        'status' => 'error',
                        'message' => 'Error, no se pudo registrar la portada'
                    );
                    return $data;
                }
            }else{
                $data = array(
                    'status' => 'error',
                    'message' => 'Solo se aceptan .png, .jpg, .jpeg'
                );
                return $data;
            }
        }
    }

    public function portada_listar(){
        $sql = "SELECT id_portada, foto1, texto1, texto2, texto3, estado FROM milagosrondan.portada";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        return $query;
    }

}
?>