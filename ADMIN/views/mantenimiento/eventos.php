<div class="container-fluid">
    <div class="">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Seleccionar
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="index.php?action=eventos&value=categoria">Eventos</a>
                <a class="dropdown-item" href="index.php?action=eventos&value=detalle">Detalle de los eventos</a>
            </div>
        </div>
    </div>
    <?php
        if(isset($_GET['value'])){
            if($_GET['value'] == "categoria"){
                include_once('views/mantenimiento/evento_categoria.php');
            }
            if($_GET['value'] == "detalle"){
                include_once('views/mantenimiento/evento_detalle.php');
            }
        }
    ?>
</div>