<div class="container-fluid">
    <div class="col-lg-7 mx-auto">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="registrar_nosotros" value="registrar">
            <div class="card card-body">
                <div class="form-group">
                    <label for="">Imagen</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="foto_nosotros" required>
                        <label class="custom-file-label" for="customFile">Agregar Imagen</label>
                    </div>
                    <small>940 x 788</small>
                </div>
                <div class="form-group">
                    <label for="">Descripción</label>
                    <textarea name="descripcion" cols="2" class="form-control" required></textarea>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary ">Guardar</button>
                </div>
            </div>
        </form>
        <?php
        require_once('controllers/soporte.controllers.php');
        $registrar_nosotros = new soporteControllers();
        $data_registrar = $registrar_nosotros -> nosotros_registrar();
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
            <?php
        }
        ?>
    </div>

    <?php
    require_once('controllers/soporte.controllers.php');
    $estado = new soporteControllers();
    $data_ = NULL;
    if(isset($_GET['bloquear'])){
        $data_ = $estado -> nosotros_bloquear($_GET['bloquear']);
    }
    if(isset($_GET['desbloquear'])){
        $data_ = $estado -> nosotros_desbloquear($_GET['desbloquear']);
    }
    if(isset($_GET['eliminar'])){
        $data_ = $estado -> nosotros_eliminar($_GET['eliminar']);
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
        window.location.href = 'index.php?action=nosotros';
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
        window.location.href = 'index.php?action=nosotros';
    }, 2000);
    </script>
    <?php
    }
    ?>

    <?php
    require_once('controllers/soporte.controllers.php');
    $listar = new soporteControllers();
    $data_listar = $listar -> nosotros_listar();
    ?>

    <div class="col-lg-11 mx-auto pt-4">
        <?php while ( $row = $data_listar->fetch_assoc() ) {  ?>
        <div class="card mb-3">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-4 align-self-center text-center">
                        <img src="img/nosotros/<?php echo $row['foto'] ?>" class="rounded" width="200px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text"><?php echo $row['descripcion'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="row">
                        <div class="col-lg-9 text-right">
                            <a href="index.php?action=nosotros&eliminar=<?php echo $row['id_nosotros']; ?>"
                                class="btn btn-dark"><i class="fa fa-trash"></i></a>
                        </div>
                        <?php if($row['estado'] == "1"){ ?>
                        <div class="col-lg-1 text-right">
                            <a href="index.php?action=nosotros&bloquear=<?php echo $row['id_nosotros']; ?>"
                                class="btn btn-primary"><i class="fa fa-unlock"></i></a>
                        </div>
                        <?php }else{ ?>
                        <div class="col-lg-1 text-right">
                            <a href="index.php?action=nosotros&desbloquear=<?php echo $row['id_nosotros']; ?>"
                                class="btn btn-primary"><i class="fa fa-lock"></i></a>
                        </div>
                        <?php } ?>
                        <?php if($row['estado'] == "1"){ ?>
                        <div class="col-lg-1">
                            <h2><span class="badge badge-success">En uso</span></h2>
                        </div>
                        <?php }else{ ?>
                        <div class="col-lg-1">
                            <h2><span class="badge badge-danger">Inactivo</span></h2>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

</div>