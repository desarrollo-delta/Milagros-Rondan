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
                                    <input type="file" class="custom-file-input" id="customFile" name="foto_portada">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Tìtulo</label>
                                <input type="text" name="titulo" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Comentario</label>
                                <input type="text" name="comentario" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Subtìtulo</label>
                                <input type="text" name="subtitulo" id="" class="form-control">
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
    $registrar -> portada_registrar();
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
                <tr>
                    <th scope="row"><button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenter"><i class="fa fa-eye"></i></button></th>
                    <td>Bienvenidos</td>
                    <td>A eventos milagros rondan</td>
                    <td>mi comentario xd</td>
                    <td><span class="badge badge-primary">Activo</span></td>
                    <td><a href=""><i class="fa fa-lock"></i></a></td>
                </tr>
                <tr>
                    <th scope="row"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
                    </th>
                    <td>Bienvenidos</td>
                    <td>A eventos milagros rondan</td>
                    <td>mi comentario xd</td>
                    <td><span class="badge badge-primary">Activo</span></td>
                    <td><a href=""><i class="fa fa-lock"></i></a></td>
                </tr>
                <tr>
                    <th scope="row"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
                    </th>
                    <td>Bienvenidos</td>
                    <td>A eventos milagros rondan</td>
                    <td>mi comentario xd</td>
                    <td><span class="badge badge-primary">Activo</span></td>
                    <td><a href=""><i class="fa fa-lock"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>