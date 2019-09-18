<?php
class soporteControllers{
    public function portada_registrar(){
        if(isset($_POST['registrar_portada'])){
            #Numero aleatorios
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
            $ext = $_FILES['foto_portada']['name'];
            $split = explode('.',$ext);
            $extension = $split[1];
            $nombre_aleatorio = aleatorio(25);
            $nombre_imagen = $nombre_aleatorio.'.'.$extension;
            $ruta = 'img/portada/'.$nombre_imagen;
            $archivo = $_FILES['foto_portada']['tmp_name'];
            move_uploaded_file($archivo, $ruta);
            $titulo = $_POST['titulo'];
            $comentario = $_POST['comentario'];
            $subtitulo = $_POST['subtitulo'];
        }
    }
}
?>