<div id="carga" class="d-flex justify-content-center align-items-center pt-4">
    <div class="pt-4">
        <div class="spinner-grow text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-success" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>
<style>
.hover-list:hover{
  background-color: #33FCFF;
  color: #000;
}
</style>
<div id="contenido" class="d-none">
    <div class="row pt-2">
        <div class="col-lg-5 pt-3">
            <div class="card card-body">
                <form class="container" method="post">
                    <div class="form-group">
                        <label for="">Nombre Evento</label>
                        <input type="text" name="nombre_evento" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                    </div>
                </form>
            </div>
            <?php
            require_once('controllers/soporte.controllers.php');
            $registrar_evento = new soporteControllers();
            $data_registrar = $registrar_evento -> evento_registrar();
            if($data_registrar['status'] == "error"){
                ?>
                <div class="pt-3">
                    <div class="alert alert-danger text-center" role="alert">
                        <?php echo $data_registrar['message']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <?php
            }else if($data_registrar['status'] == "success"){
                ?>
                <div class="pt-3">
                    <div class="alert alert-primary text-center" role="alert">
                        <?php echo $data_registrar['message']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <?php
        require_once('controllers/soporte.controllers.php');
        $listar = new soporteControllers();
        $data_listar = $listar -> evento_listar();
        ?>

        <div class="col-lg-7 pt-3">
            <ul class="list-group">
                <?php while ( $row = $data_listar->fetch_assoc() ) { ?>
                <li class="list-group-item hover-list">
                    <div class="float-left"><?php echo $row['nombre_evento']; ?></div>
                    <div class="float-right">
                        <a href="" class="btn btn-danger btn-sm text-white"><i class="fa fa-trash"></i></a>&emsp;
                        <a href="" class="btn btn-warning btn-sm text-white"><i class="fa fa-eye"></i></a>&emsp;
                        <a href="" class="btn btn-secondary btn-sm text-white"><i class="fa fa-lock"></i></a>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<br>
<script>
    const contenido = document.getElementById('contenido');
    const carga = document.getElementById('carga');

    setTimeout(() => {
        contenido.className = 'pt-4';
        carga.className = 'd-none';
    }, 1000);
</script>