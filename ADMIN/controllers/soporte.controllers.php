<?php
require_once ('connection/database.php');
class soporteControllers extends database{

    public function portada_registrar(){
        if(isset($_POST['registrar_portada'])){
            #Obtenemos las variables del POST
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $comentario = $_POST['comentario'];
            $width = getimagesize($_FILES['foto_portada']['tmp_name'])[0];
            $height = getimagesize($_FILES['foto_portada']['tmp_name'])[1];
            if($width == "2200" && $height == "850"){
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
            }else{
                $data = array(
                    'status' => 'error',
                    'message' => 'El tamaño de la imagen es incorrecto'
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

    public function portada_bloquear($id_portada){
        if(isset($id_portada)){
            $sql = "UPDATE milagosrondan.portada SET estado = '0' WHERE id_portada = $id_portada";
            $conexion = database::getConexion();
            $query = mysqli_query($conexion, $sql);
            if($query){
                $data = array(
                    'status' => 'success',
                    'message' => 'Portada ha sido bloqueada'
                );
                return $data;
            }else{
                $data = array(
                    'status' => 'error',
                    'message' => 'Error, no se pudo bloquear'
                );
                return $data;
            }
        }
    }

    public function portada_desbloquear($id_portada){
        if(isset($id_portada)){
            $sql = "UPDATE milagosrondan.portada SET estado = '1' WHERE id_portada = $id_portada";
            $conexion = database::getConexion();
            $query = mysqli_query($conexion, $sql);
            if($query){
                $data = array(
                    'status' => 'success',
                    'message' => 'Portada ha sido desbloqueada'
                );
                return $data;
            }else{
                $data = array(
                    'status' => 'error',
                    'message' => 'Error, no se pudo bloquear'
                );
                return $data;
            }
        }
    }

    public function nosotros_registrar(){
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
        if(isset($_POST['registrar_nosotros'])){
            $foto_nosotros = $_FILES['foto_nosotros'];
            $descripcion = $_POST['descripcion'];
            $nombre_foto = $foto_nosotros['name'];
            $split = explode('.',$nombre_foto);
            $extension = $split[1];
            if($extension == "png" || $extension == "jpg" || $extension == "jpeg"){
                $nombre_imagen = aleatorio(25).".".$extension;
                $ruta = "img/nosotros/".$nombre_imagen;
                $archivo = $foto_nosotros['tmp_name'];
                move_uploaded_file($archivo, $ruta);
                #-----------------------------------------------------
                $sql = "INSERT INTO milagosrondan.nosotros(foto, descripcion) VALUES ('$nombre_imagen', '$descripcion')";
                $conexion = database::getConexion();
                $query = mysqli_query($conexion, $sql);
                if($query){
                    $data = array(
                        'status' => 'success',
                        'message' => 'Registrada correctamente'
                    );
                    return $data;
                }else{
                    $data = array(
                        'status' => 'error',
                        'message' => 'Error, no se pudo registrar'
                    );
                    return $data;
                }
            }else{
                echo 'Por favor inserte una imagen';
            }
        }
    }

    public function nosotros_listar(){}

    public function nosotros_bloquear(){}
    
    public function evento_registrar(){
        #
    }

    public function evento_listar(){
        #
    }

    public function detalle_evento(){}

}
?>