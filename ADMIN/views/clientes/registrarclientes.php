<div class="container-fluid">
    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="registrar_cliente" value="registrar_cliente">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Nombres Completos</label>
                                <input type="text" name="nombre" id="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="">Apellidos Completos </label>
                            <input type="text" name="apellido" id="" class="form-control" required>
                        </div>
                        <div class="col-lg-3">
                            <label for="">DNI</label>
                            <input type="text" name="dni" id="" class="form-control" required>
                        </div>
                        <div class="col-lg-3">
                            <label for="">Telefono</label>
                            <input type="text" name="telefono" id="" class="form-control" required>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group pt-2 text-center">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
            require_once('controllers/soporte.controllers.php');
            $registrar_cliente = new soporteControllers();
            $data_registrar = $registrar_cliente -> cliente_registrar();
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
        window.location.href = 'index.php?action=cliente';
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
        window.location.href = 'index.php?action=cliente';
    }, 2000);
    </script>
    <?php
        }
        ?>
    <?php
    require_once('controllers/soporte.controllers.php');
    $listar= new soporteControllers();
    $data_listar = $listar -> cliente_listar();
    ?>
    <div class="col-lg-10 mx-auto pt-4 text-center">
        <table class="table table-bordered bg-white">
            <thead>
                <tr>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Telefono</th>
                </tr>
            </thead>  
                <?php while ( $row = $data_listar->fetch_assoc() ) { ?>
                <tr>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['apellido']; ?></td>
                    <td><?php echo $row['dni']; ?></td>
                    <td><?php echo $row['telefono']; ?></td>
                </tr>
                <?php } ?>
        </table>
    </div>
</div>