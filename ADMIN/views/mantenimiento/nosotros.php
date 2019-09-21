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
        $registrar_nosotros -> nosotros_registrar();
        ?>
    </div>

    <div class="col-lg-11 mx-auto pt-4">
        <div class="card mb-3">
            <div class="container">
            <div class="row no-gutters">
                <div class="col-md-4 align-self-center">
                    <img src="http://localhost/Milagros-Rondan/WEB/public/img/milagrosrondan.png" class="card-img">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text">El Sol de Milagros Rondan en la ciudad de Lima es una organizadora de eventos, el servicio ubicado en el distrito de Chorrillos presenta impecables prestaciones para lograr una fiesta y recepción estupenda. Se otorga un servicio de alta calidad basándose en todo tipo de tendencias y temáticas, los proyectos son totalmente creativos haciendo que su día sea mágico e inolvidable, el cliente obtiene un evento soñado. La empresa cuenta con más de 20 años en el rubro de Catering y Producción general de Eventos" y por 5 años consecutivos han sido ganadores la premio POP y también reconocidos en el palacio de GOBIERNO.</p>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <div class="row">
                    <div class="col-lg-10 text-right">
                        <a href="" class="btn btn-primary"><i class="fa fa-lock"></i></a>
                    </div>
                    <div class="col-lg-1">
                        <h2><span class="badge badge-success">En uso</span></h2>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

</div>