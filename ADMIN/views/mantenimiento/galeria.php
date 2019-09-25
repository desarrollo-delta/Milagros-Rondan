<div class="container-fluid">
    <div class="col-lg-7 mx-auto">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="registrar_galeria" value="registrar">
            <div class="card card-body">
                <div class="form-group">
                    <label for="">Imagen</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="foto_galeria" required>
                        <label class="custom-file-label" for="customFile">Agregar Imagen</label>
                    </div>
                    <small>640 x 480</small>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary ">Guardar</button>
                </div>
               
            </div>
        </form>
        
        <?php
        require_once('controllers/soporte.controllers.php');
        $registrar_galeria = new soporteControllers();
        $data_registrar = $registrar_galeria -> galeria_registrar();
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
        window.location.href = 'index.php?action=galeria';
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
        window.location.href = 'index.php?action=galeria';
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
        $data_ = $estado -> galeria_bloquear($_GET['bloquear']);
    }
    if(isset($_GET['desbloquear'])){
        $data_ = $estado -> galeria_desbloquear($_GET['desbloquear']);
    }
    if(isset($_GET['eliminar'])){
        $data_ = $estado -> galeria_eliminar($_GET['eliminar']);
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
        window.location.href = 'index.php?action=galeria';
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
        window.location.href = 'index.php?action=galeria';
    }, 2000);
    </script>
    <?php
    }
    ?>
    <?php
    require_once('controllers/soporte.controllers.php');
    $listar = new soporteControllers();
    $data_listar = $listar -> galeria_listar();
    ?>
    <div class="col-lg-8 mx-auto pt-4 text-center">
        <table class="table table-bordered bg-white">
            <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">eliminar</th>
                    <th scope="col">Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ( $row = $data_listar->fetch_assoc() ) { ?>
                <tr>
                    <th scope="row"><button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenter" onclick="img_galeria('<?php echo $row['foto']; ?>')"><i
                                class="fa fa-eye"></i></button></th>
                    <th scope="row"><a href="index.php?action=galeria&eliminar=<?php echo $row['id_galeria']; ?>"
                                class="btn btn-dark"><i class="fa fa-trash"></i></a></th>
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
                    <td><a href="index.php?action=galeria&bloquear=<?php echo $row['id_galeria']?>"><i
                                class="fa fa-unlock"></i></a></td>
                    <?php
                    }else{
                        ?>
                    <td><a href="index.php?action=galeria&desbloquear=<?php echo $row['id_galeria']?>"><i
                                class="fa fa-lock"></i></a></td>
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
        function img_galeria(galeria) {
        document.getElementById("image_galeria_view").src = "img/galeria/" + galeria;
        return galeria;
        }
    </script>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img id="image_galeria_view" width="650px" alt="">
            </div>
        </div>
    </div>
</div>