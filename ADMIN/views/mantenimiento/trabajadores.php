<div class="container-fluid">
    <div class="col-lg-7 mx-auto">
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <input type="hidden" name="registrar_trabajadores" value="registrar_trabajadores">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Foto Trabajador</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="foto_trabajadores"
                                required>
                            <label class="custom-file-label" for="customFile">Agregar</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Nombre Completo</label>
                        <input type="text" name="nombre" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <select name="cargo" id="" class="form-control">
                        <option value="Mesero">Mesero</option>
                        <option value="Cocinera">Cocinera</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Facebook</label>
                        <input type="text" name="facebook" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                    </div>
                </div>
            </div>
        </form>

        <?php
        require_once('controllers/soporte.controllers.php');
        $registrar_trabajadores = new soporteControllers();
        $data_registrar = $registrar_trabajadores -> trabajadores_registrar();
        if($data_registrar['status'] == "error"){
            ?>
        <div class="col-lg-8 mx-auto pt-3 text-center">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?php echo $data_registrar['message']; ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <script>
        setTimeout(function() {
            window.location.href = 'index.php?action=trabajadores';
        }, 2000);
        </script>
        <?php
        }else if($data_registrar['status'] == "success"){
            ?>
        <div class="col-lg-8 mx-auto pt-3 text-center">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong><?php echo $data_registrar['message']; ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <script>
        setTimeout(function() {
            window.location.href = 'index.php?action=trabajadores';
        }, 2000);
        </script>
        <?php
        }
        ?>
    </div>

    <?php
    require_once('controllers/soporte.controllers.php');
    $estado = new soporteControllers();
    $data_ = NULL;
    if(isset($_GET['bloquear'])){
        $data_ = $estado -> trabajadores_bloquear($_GET['bloquear']);
    }
    if(isset($_GET['desbloquear'])){
        $data_ = $estado -> trabajadores_desbloquear($_GET['desbloquear']);
    }
    if(isset($_GET['eliminar'])){
        $data_ = $estado -> trabajadores_eliminar($_GET['eliminar']);
    }
    if($data_['status'] == "error"){
        ?>
    <div class="col-lg-5 mx-auto pt-3 text-center">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $data_['message']; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <script>
    setTimeout(function() {
        window.location.href = 'index.php?action=trabajadores';
    }, 2000);
    </script>
    <?php
    }else if($data_['status'] == "success"){
        ?>
    <div class="col-lg-5 mx-auto pt-3 text-center">
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong><?php echo $data_['message']; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <script>
    setTimeout(function() {
        window.location.href = 'index.php?action=trabajadores';
    }, 2000);
    </script>
    <?php
    }
    ?>
    <?php
    require_once('controllers/soporte.controllers.php');
    $listar = new soporteControllers();
    $data_listar = $listar -> trabajadores_listar();
    ?>
    <div class="col-lg-8 mx-auto pt-4 text-center">
        <table class="table table-bordered bg-white">
            <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">nombre completo</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">bloquear</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ( $row = $data_listar->fetch_assoc() ) { ?>
                <tr>
                    <th scope="row"><button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenter"
                            onclick="img_trabajadores('<?php echo $row['foto']; ?>')"><i class="fa fa-eye"></i></button>
                    </th>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['cargo']; ?></td>

                    <?php
                    if($row['estado'] == "1"){
                        ?>
                    <td><span class="badge badge-primary">Activo</span></td>
                    <?php
                    }else{
                        ?>
                    <td><span class="badge badge-danger">Inactivo</span></td>
                    <?php
                    }
                    ?>
                    
                    <?php
                    if($row['estado'] == "1"){
                        ?>
                    <td><a href="index.php?action=trabajadores&bloquear=<?php echo $row['id_trabajador']?>"><i
                                class="fa fa-unlock"></i></a></td>
                    <?php
                    }else{
                        ?>
                    <td><a href="index.php?action=trabajadores&desbloquear=<?php echo $row['id_trabajador']?>"><i
                            class="fa fa-lock"></i></a></td>
                    <th scope="row"><a
                            href="index.php?action=trabajadores&eliminar=<?php echo $row['id_trabajador']; ?>"
                            class="btn btn-dark"><i class="fa fa-trash"></i></a></th>
                    <?php
                    }
                    ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>

<script>
function img_trabajadores(trabajadores) {
    document.getElementById("image_trabajadores_view").src = "img/trabajadores/" + trabajadores;
    return trabajadores;
}
</script>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img id="image_trabajadores_view" width="650px" alt="">
            </div>
        </div>
    </div>
</div>