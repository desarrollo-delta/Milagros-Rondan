<div class="container-fluid">

    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-body">
                <form method="post" enctype= multipart/form-data>
                    <div class="row">
                    <input type="hidden" name="registrar_portada" value="registrar_portada">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Foto Portada</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="foto_portada" required ="seleccione una imagen">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Tìtulo</label>
                                <input type="text" name="titulo" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Comentario</label>
                                <input type="text" name="comentario" id="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Subtìtulo</label>
                                <input type="text" name="subtitulo" id="" class="form-control" required>
                            </div>
                            <div class="form-group pt-2">
                                <br>
                                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    require_once('controllers/soporte.controllers.php');
    $registrar = new soporteControllers();
    $data_registrar = $registrar -> portada_registrar();
    if($data_registrar['status'] == "error"){
        ?>
        <div class="col-lg-5 mx-auto pt-3 text-center">
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
        <div class="col-lg-5 mx-auto pt-3 text-center">
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

    <?php
    require_once('controllers/soporte.controllers.php');
    $listar = new soporteControllers();
    $data_listar = $listar -> portada_listar();
    ?>

    <div class="col-lg-10 mx-auto pt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Tìtulo</th>
                    <th scope="col">Subtitulo</th>
                    <th scope="col">Comentario</th>
                    <th scope="col">Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php while ( $row = $data_listar->fetch_assoc() ) { ?>
                <tr>
                    <th scope="row"><button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenter" onclick="img_portada('<?php echo $row['foto1']; ?>')" ><i class="fa fa-eye"></i></button></th>
                    <td><?php echo $row['texto1']; ?></td>
                    <td><?php echo $row['texto2']; ?></td>
                    <td><?php echo $row['texto3']; ?></td>
                    <td><span class="badge badge-primary">Activo</span></td>
                    <td><a href=""><i class="fa fa-lock"></i></a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</div>

<script>
function img_portada(portada){
    document.getElementById("image_portada_view").src = "img/portada/"+portada;
    return portada;
}
</script>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img id="image_portada_view" width="650px" alt="">
            </div>
        </div>
    </div>
</div>