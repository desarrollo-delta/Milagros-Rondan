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
                    $sql = "INSERT INTO bydnc1dut5xcycds4qvn.portada (foto1, texto1, texto2, texto3, estado) VALUES ('$nombre_imagen', '$titulo', '$subtitulo', '$comentario', '1')";
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
        $sql = "SELECT id_portada, foto1, texto1, texto2, texto3, estado FROM bydnc1dut5xcycds4qvn.portada";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        return $query;
    }

    public function portada_bloquear($id_portada){
        if(isset($id_portada)){
            $sql = "UPDATE bydnc1dut5xcycds4qvn.portada SET estado = '0' WHERE id_portada = $id_portada";
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
            $sql = "UPDATE bydnc1dut5xcycds4qvn.portada SET estado = '1' WHERE id_portada = $id_portada";
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
            $width = getimagesize($foto_nosotros['tmp_name'])[0];
            $height = getimagesize($foto_nosotros['tmp_name'])[1];
            if($width == "940" && $height == "788"){
                $nombre_foto = $foto_nosotros['name'];
                $split = explode('.',$nombre_foto);
                $extension = $split[1];
                if($extension == "png" || $extension == "jpg" || $extension == "jpeg"){
                    $nombre_imagen = aleatorio(25).".".$extension;
                    $ruta = "img/nosotros/".$nombre_imagen;
                    $archivo = $foto_nosotros['tmp_name'];
                    move_uploaded_file($archivo, $ruta);
                    #-----------------------------------------------------
                    $sql = "INSERT INTO bydnc1dut5xcycds4qvn.nosotros(foto, descripcion, estado) VALUES ('$nombre_imagen', '$descripcion','1')";
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
            }else{
                $data = array(
                    'status' => 'error',
                    'message' => 'El tamaño de la imagen es incorrecto'
                );
                return $data;
            }
        }
    }

    public function nosotros_listar(){
        $sql = "SELECT id_nosotros, foto,descripcion, estado FROM bydnc1dut5xcycds4qvn.nosotros";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        return $query;
    }

    public function nosotros_bloquear($id_nosotros){
        $sql = "UPDATE bydnc1dut5xcycds4qvn.nosotros SET estado = '0' WHERE id_nosotros = $id_nosotros";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        if($query){
            $data = array(
                'status' => 'success',
                'message' => 'Bloqueado'
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

    public function nosotros_desbloquear($id_nosotros){
        $sql = "UPDATE bydnc1dut5xcycds4qvn.nosotros SET estado = '1' WHERE id_nosotros = $id_nosotros";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        if($query){
            $data = array(
                'status' => 'success',
                'message' => 'Desbloqueado'
            );
            return $data;
        }else{
            $data = array(
                'status' => 'error',
                'message' => 'Error, no se pudo desbloquear'
            );
            return $data;
        }
    }

    public function nosotros_eliminar($id_nosotros){
        $sql = "DELETE FROM bydnc1dut5xcycds4qvn.nosotros WHERE id_nosotros = $id_nosotros";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        if($query){
            $data = array(
                'status' => 'success',
                'message' => 'Eliminado correctamente'
            );
            return $data;
        }else{
            $data = array(
                'status' => 'error',
                'message' => 'Error, no se pudo eliminar'
            );
            return $data;
        }
    }
    
    public function evento_registrar(){
        if(isset($_POST['nombre_evento'])){
            $nombre_evento = $_POST['nombre_evento'];
            $sql = "INSERT INTO bydnc1dut5xcycds4qvn.eventos (nombre_evento, estado) VALUES ('$nombre_evento', '1');";
            $conexion = database::getConexion();
            $query = mysqli_query($conexion, $sql);
            if($query){
                $data = array(
                    'status' => 'success',
                    'message' => 'Evento registrado'
                );
                return $data;
            }else{
                    $data = array(
                    'status' => 'error',
                    'message' => 'Error, no se pudo registrar'
                );
                return $data;
            }
        }
    }

    public function evento_listar(){
        $sql = "SELECT id_evento, nombre_evento, estado FROM bydnc1dut5xcycds4qvn.eventos";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        return $query;
    }

    public function detalle_evento(){
        if(isset($_POST['detalle_evento'])){
            $titulo_evento = $_POST['titulo_evento'];
            $precio = $_POST['precio'];
            $evento = $_POST['select_evento'];
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
            $foto_detalle_evento = $_FILES['foto_detalle_evento'];
            $width = getimagesize($foto_detalle_evento['tmp_name'])[0];
            $height = getimagesize($foto_detalle_evento['tmp_name'])[1];
            if($width == "110" && $height == "110"){
                $nombre_foto = $foto_detalle_evento['name'];
                $split = explode('.',$nombre_foto);
                $extension = $split[1];
                if($extension == "png" || $extension == "jpg" || $extension == "jpeg"){
                    $nombre_imagen = aleatorio(25).".".$extension;
                    $ruta = "img/eventos/".$nombre_imagen;
                    $archivo = $foto_detalle_evento['tmp_name'];
                    move_uploaded_file($archivo, $ruta);
                    #-----------------------------------------------------
                    $sql = "INSERT INTO bydnc1dut5xcycds4qvn.detalle_evento(titulo, precio, descripcion,foto,id_evento,estado) VALUES ('$titulo_evento', $precio, '$descripcion','$nombre_imagen',$evento,'1')";
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
                    $data = array(
                        'status' => 'error',
                        'message' => 'La extensión no es correcta'
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
    
    public function galeria_registrar(){

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
            if(isset($_POST['registrar_galeria'])){
                $foto_galeria = $_FILES['foto_galeria'];
                $width = getimagesize($foto_galeria['tmp_name'])[0];
                $height = getimagesize($foto_galeria['tmp_name'])[1];
                if($width == "640" && $height == "480"){
                    $nombre_foto = $foto_galeria['name'];
                    $split = explode('.',$nombre_foto);
                    $extension = $split[1];
                    if($extension == "png" || $extension == "jpg" || $extension == "jpeg"){
                        $nombre_imagen = aleatorio(25).".".$extension;
                        $ruta = "img/galeria/".$nombre_imagen;
                        $archivo = $foto_galeria['tmp_name'];
                        move_uploaded_file($archivo, $ruta);
                        #-----------------------------------------------------
                        $sql = "INSERT INTO bydnc1dut5xcycds4qvn.galeria(foto,estado) VALUES ('$nombre_imagen','1')";
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
                }else{
                    $data = array(
                        'status' => 'error',
                        'message' => 'El tamaño de la imagen es incorrecto'
                    );
                    return $data;
                }
    
    
                
            }
    }

    public function galeria_listar(){
        $sql = "SELECT id_galeria, foto, estado FROM bydnc1dut5xcycds4qvn.galeria";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        return $query;
    }

    public function galeria_bloquear($id_galeria){
        $sql = "UPDATE bydnc1dut5xcycds4qvn.galeria SET estado = '0' WHERE id_galeria = $id_galeria";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        if($query){
            $data = array(
                'status' => 'success',
                'message' => 'Bloqueado'
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

    public function galeria_desbloquear($id_galeria){
        $sql = "UPDATE bydnc1dut5xcycds4qvn.galeria SET estado = '1' WHERE id_galeria = $id_galeria";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        if($query){
            $data = array(
                'status' => 'success',
                'message' => 'Desbloqueado'
            );
            return $data;
        }else{
            $data = array(
                'status' => 'error',
                'message' => 'Error, no se pudo desbloquear'
            );
            return $data;
        }
    }
    
    public function galeria_eliminar($id_galeria){
        $sql = "DELETE FROM bydnc1dut5xcycds4qvn.galeria WHERE id_galeria = $id_galeria";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        if($query){
            $data = array(
                'status' => 'success',
                'message' => 'Eliminado correctamente'
            );
            return $data;
        }else{
            $data = array(
                'status' => 'error',
                'message' => 'Error, no se pudo eliminar'
            );
            return $data;
        }
    }

    public function trabajadores_registrar(){

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
            if(isset($_POST['registrar_trabajadores'])){
                $foto_trabajadores = $_FILES['foto_trabajadores'];
                $nombre_trabajadores = $_POST['nombre'];
                $cargo_trabajadores = $_POST['cargo'];
                $facebook_trabajadores = $_POST['facebook'];
                $width = getimagesize($foto_trabajadores['tmp_name'])[0];
                $height = getimagesize($foto_trabajadores['tmp_name'])[1];
                if($width == "265" && $height == "275"){
                    $nombre_foto = $foto_trabajadores['name'];
                    $split = explode('.',$nombre_foto);
                    $extension = $split[1];
                    if($extension == "png" || $extension == "jpg" || $extension == "jpeg"){
                        $nombre_imagen = aleatorio(25).".".$extension;
                        $ruta = "img/trabajadores/".$nombre_imagen;
                        $archivo = $foto_trabajadores['tmp_name'];
                        move_uploaded_file($archivo, $ruta);
                        #-----------------------------------------------------
                        $sql = "INSERT INTO bydnc1dut5xcycds4qvn.trabajadores(foto, nombre, cargo, facebook, estado) VALUES ('$nombre_imagen', '$nombre_trabajadores','$cargo_trabajadores', '$facebook_trabajadores', '1')";
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
                }else{
                    $data = array(
                        'status' => 'error',
                        'message' => 'El tamaño de la imagen es incorrecto'
                    );
                    return $data;
                }
    
    
                
            }
    }
    
    public function trabajadores_listar(){
        $sql = "SELECT id_trabajador, foto,nombre,cargo,facebook, estado FROM bydnc1dut5xcycds4qvn.trabajadores";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        return $query;
    }
    
    public function trabajadores_bloquear($id_trabajador){
        $sql = "UPDATE bydnc1dut5xcycds4qvn.trabajadores SET estado = '0' WHERE id_trabajador = $id_trabajador";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        if($query){
            $data = array(
                'status' => 'success',
                'message' => 'Bloqueado'
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

    public function trabajadores_desbloquear($id_trabajador){
        $sql = "UPDATE bydnc1dut5xcycds4qvn.trabajadores SET estado = '1' WHERE id_trabajador = $id_trabajador";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        if($query){
            $data = array(
                'status' => 'success',
                'message' => 'Desbloqueado'
            );
            return $data;
        }else{
            $data = array(
                'status' => 'error',
                'message' => 'Error, no se pudo desbloquear'
            );
            return $data;
        }
    }

    public function trabajadores_eliminar($id_trabajador){
        $sql = "DELETE FROM bydnc1dut5xcycds4qvn.trabajadores WHERE id_trabajador = $id_trabajador";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        if($query){
            $data = array(
                'status' => 'success',
                'message' => 'Eliminado correctamente'
            );
            return $data;
        }else{
            $data = array(
                'status' => 'error',
                'message' => 'Error, no se pudo eliminar'
            );
            return $data;
        }
    }

    public function testimonios_registrar(){     
            if(isset($_POST['registrar_testimonios'])){
            $titulo = $_POST['titulo'];
            $comentario = $_POST['comentario'];
            $nombre = $_POST['nombre'];
                $sql = "INSERT INTO bydnc1dut5xcycds4qvn.testimonios (titulo,comentario,nombre, estado) VALUES ('$titulo', '$comentario','$nombre', '1')";
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
        }
    }

    public function testimonios_listar(){
        $sql = "SELECT id_testimonios,titulo, comentario, nombre, estado FROM bydnc1dut5xcycds4qvn.testimonios";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        return $query;
    }

    public function testimonios_bloquear($id_testimonios){
        $sql = "UPDATE bydnc1dut5xcycds4qvn.testimonios SET estado = '0' WHERE id_testimonios = $id_testimonios";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        if($query){
            $data = array(
                'status' => 'success',
                'message' => 'Bloqueado'
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

    public function testimonios_desbloquear($id_testimonios){
        $sql = "UPDATE bydnc1dut5xcycds4qvn.testimonios SET estado = '1' WHERE id_testimonios = $id_testimonios";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        if($query){
            $data = array(
                'status' => 'success',
                'message' => 'Desbloqueado'
            );
            return $data;
        }else{
            $data = array(
                'status' => 'error',
                'message' => 'Error, no se pudo desbloquear'
            );
            return $data;
        }
    }

    public function testimonios_eliminar($id_testimonios){
        $sql = "DELETE FROM bydnc1dut5xcycds4qvn.testimonios WHERE id_testimonios = $id_testimonios";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        if($query){
            $data = array(
                'status' => 'success',
                'message' => 'Eliminado correctamente'
            );
            return $data;
        }else{
            $data = array(
                'status' => 'error',
                'message' => 'Error, no se pudo eliminar'
            );
            return $data;
        }
    }

    public function cliente_registrar(){     
        if(isset($_POST['registrar_cliente'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $telefono = $_POST['telefono'];
            $sql = "INSERT INTO bydnc1dut5xcycds4qvn.cliente (nombre,apellido,dni,telefono) VALUES ('$nombre','$apellido','$dni','$telefono')";
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
     }
    }

    public function cliente_listar(){
        $sql = "SELECT idcliente,nombre,apellido,dni,telefono FROM bydnc1dut5xcycds4qvn.cliente";
        $conexion = database::getConexion();
        $query = mysqli_query($conexion, $sql);
        return $query;
    }
}
?>