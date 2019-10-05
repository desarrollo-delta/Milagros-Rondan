<?php
    require_once('controllers/soporte.controllers.php');
    $listar = new soporteControllers();
    $data_listar = $listar -> evento_listar();
    $data_listar_ = $listar -> evento_listar();
?>
<div class="pt-4">
    <div class="row pt-2">
        <div class="col-lg-10 pt-3 mx-auto">
            <div class="card card-body">
                <form class="container" method="post"  enctype="multipart/form-data">
                    <input type="hidden" name="detalle_evento">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Título</label>
                                <input type="text" name="titulo_evento" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Precio</label>
                                <input type="text" name="precio" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Foto <small>(640x480)</small></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="foto_detalle_evento" required>
                                    <label class="custom-file-label" for="customFile">Agregar Imagen</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Evento</label>
                                <select name="select_evento" class="form-control">
                                    <?php while ( $row = $data_listar->fetch_assoc() ) { ?>
                                        <option value="<?php echo $row['id_evento']; ?>"><?php echo $row['nombre_evento']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <textarea name="descripcion" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-11 text-right">
                            <div class="form-group">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></button>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            require_once('controllers/soporte.controllers.php');
            $registrar_evento = new soporteControllers();
            $data_registrar = $registrar_evento -> detalle_evento();
            if($data_registrar['status'] == "error"){
                ?>
                <div class="col-lg-4 mx-auto pt-3">
                    <div class="alert alert-danger text-center" role="alert">
                        <?php echo $data_registrar['message']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <?php
            }else if($data_registrar['status'] == "success"){
                ?>
                <div class="col-lg-4 mx-auto pt-3">
                    <div class="alert alert-primary text-center" role="alert">
                        <?php echo $data_registrar['message']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <select class="form-control" id="feedingHay" onChange="imprimirValor()">
                <?php while ( $row_ = $data_listar_->fetch_assoc() ) { ?>
                <option value="<?php echo $row_['id_evento']; ?>"><?php echo $row_['nombre_evento']; ?></option>
                <?php } ?>
            </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
/*
function click_(){
    var select = document.getElementById('id_evento');
    var value = select.addEventListener('change', function(){
        var selectedOption = this.options[select.selectedIndex];
        value = selectedOption.value;
        console.log(selectedOption.value + ': ' + selectedOption.text);
        return selectedOption.value;
    });
    console.log(value);
}
*/

window.onload = function() {
  imprimirValor();
}

function imprimirValor(){
  var select = document.getElementById("feedingHay");
  var options=document.getElementsByTagName("option");
  console.log(select.value);
  console.log(options[select.value-1].innerHTML)
}
</script>