<div class="container-fluid">
    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="registrar_testimonios" value="registrar_testimonios">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Tìtulo</label>
                                <input type="text" name="titulo" id="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Comentario</label>
                                <input type="text" name="comentario" id="" class="form-control" required>
                            </div>
                            <div class="form-group pt-2">
                                <br>
                                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="">Nombre</label>
                            <input type="text" name="nombre" id="" class="form-control" required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
            require_once('controllers/soporte.controllers.php');
            $registrar_testimonios = new soporteControllers();
            $data_registrar = $registrar_testimonios -> testimonios_registrar();
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
            window.location.href = 'index.php?action=testimonios';
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
            window.location.href = 'index.php?action=testimonios';
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
        $data_ = $estado -> testimonios_bloquear($_GET['bloquear']);
    }
    if(isset($_GET['desbloquear'])){
        $data_ = $estado -> testimonios_desbloquear($_GET['desbloquear']);
    }
    if(isset($_GET['eliminar'])){
        $data_ = $estado -> testimonios_eliminar($_GET['eliminar']);
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
        window.location.href = 'index.php?action=testimonios';
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
        window.location.href = 'index.php?action=testimonios';
    }, 2000);
    </script>
    <?php
    }
    ?>
    <?php
    require_once('controllers/soporte.controllers.php');
    $listar = new soporteControllers();
    $data_listar = $listar -> testimonios_listar();
    ?>
    <div class="col-lg-10 mx-auto pt-4 text-center">
        <table class="table table-bordered bg-white">
            <thead>
                <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Comentario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estado</th>
                    <th scope="col" colspan="2">Bloquear</th>
                </tr>
            </thead>
            <tbody>
                <?php while ( $row = $data_listar->fetch_assoc() ) { ?>
                <tr>
                    <td><?php echo $row['titulo']; ?></td>
                    <td><?php echo $row['comentario']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>

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
                    <td><a href="index.php?action=testimonios&bloquear=<?php echo $row['id_testimonios']?>"><i
                                class="fa fa-unlock"></i></a></td>
                    <?php
                    }else{
                        ?>
                    <td><a href="index.php?action=testimonios&desbloquear=<?php echo $row['id_testimonios']?>"><i
                                class="fa fa-lock"></i></a></td>
                    <th scope="row"><a
                            href="index.php?action=testimonios&eliminar=<?php echo $row['id_testimonios']; ?>"
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