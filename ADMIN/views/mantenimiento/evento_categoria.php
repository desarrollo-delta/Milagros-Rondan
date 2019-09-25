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
  background-color: #8FAED8;
  color: #fff;
}
</style>
<div id="contenido" class="d-none">
    <div class="row pt-2">
    <div class="col-lg-5 pt-3">
        <div class="card card-body">
            <form class="container" method="post">
                <div class="form-group">
                    <label for="">Nombre Evento</label>
                    <input type="text" name="" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-7 pt-3">
        <ul class="list-group">
            <li class="list-group-item hover-list">
                <div class="float-left">Promociones</div>
                <div class="float-right">
                    <a href="" class="btn btn-danger btn-sm text-white"><i class="fa fa-trash"></i></a>&emsp;
                    <a href="" class="btn btn-warning btn-sm text-white"><i class="fa fa-eye"></i></a>&emsp;
                    <a href="" class="btn btn-secondary btn-sm text-white"><i class="fa fa-lock"></i></a>
                </div>
            </li>
            <li class="list-group-item hover-list">
                <div class="float-left">Matrimonios</div>
                <div class="float-right">
                    <a href="" class="btn btn-danger btn-sm text-white"><i class="fa fa-trash"></i></a>&emsp;
                    <a href="" class="btn btn-warning btn-sm text-white"><i class="fa fa-eye"></i></a>&emsp;
                    <a href="" class="btn btn-secondary btn-sm text-white"><i class="fa fa-lock"></i></a>
                </div>
            </li>
            <li class="list-group-item hover-list">
                <div class="float-left">Quinceañeros</div>
                <div class="float-right">
                    <a href="" class="btn btn-danger btn-sm text-white"><i class="fa fa-trash"></i></a>&emsp;
                    <a href="" class="btn btn-warning btn-sm text-white"><i class="fa fa-eye"></i></a>&emsp;
                    <a href="" class="btn btn-secondary btn-sm text-white"><i class="fa fa-lock"></i></a>
                </div>
            </li>
            <li class="list-group-item hover-list">
                <div class="float-left">Cumpleaños</div>
                <div class="float-right">
                    <a href="" class="btn btn-danger btn-sm text-white"><i class="fa fa-trash"></i></a>&emsp;
                    <a href="" class="btn btn-warning btn-sm text-white"><i class="fa fa-eye"></i></a>&emsp;
                    <a href="" class="btn btn-secondary btn-sm text-white"><i class="fa fa-lock"></i></a>
                </div>
            </li>
            <li class="list-group-item hover-list">
                <div class="float-left">Primera Comunión</div>
                <div class="float-right">
                    <a href="" class="btn btn-danger btn-sm text-white"><i class="fa fa-trash"></i></a>&emsp;
                    <a href="" class="btn btn-warning btn-sm text-white"><i class="fa fa-eye"></i></a>&emsp;
                    <a href="" class="btn btn-secondary btn-sm text-white"><i class="fa fa-lock"></i></a>
                </div>
            </li>
            <li class="list-group-item hover-list">
                <div class="float-left">Bautizos</div>
                <div class="float-right">
                    <a href="" class="btn btn-danger btn-sm text-white"><i class="fa fa-trash"></i></a>&emsp;
                    <a href="" class="btn btn-warning btn-sm text-white"><i class="fa fa-eye"></i></a>&emsp;
                    <a href="" class="btn btn-secondary btn-sm text-white"><i class="fa fa-lock"></i></a>
                </div>
            </li>
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