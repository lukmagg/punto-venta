
<div id="layoutSidenav_content">
<?= 'unidades (unidades)'?>


<main>
    <div class="container-fluid">
        <h4 class="mt-4"><?= $titulo; ?></h4>
        <!-- Si viene $validation como parametro lo imprime en un cuadro danger -->
        <?php if(isset($validation)){ ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
        <?php } ?>
        
        <form method="POST" action="<?= base_url() ?>/configuracion/actualizar" autocomplete="off">
            <?php csrf_field(); ?>

            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label>Nombre de la tienda</label>
                        <input type="text" class="form-control" id="tienda_nombre" name="tienda_nombre" value="<?= $nombre['valor']; ?>" autofocus required>
                    </div>

                    <div class="col-12 col-sm-6">
                        <label>RFC</label>
                        <input type="text" class="form-control" id="tienda_rfc" name="tienda_rfc" value="<?= $rfc['valor']; ?>" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label>Telefono de la tienda</label>
                        <input type="text" class="form-control" id="tienda_telefono" name="tienda_telefono" value="<?= $telefono['valor']; ?>" required>
                    </div>

                    <div class="col-12 col-sm-6">
                        <label>Correo de la tienda</label>
                        <input type="text" class="form-control" id="tienda_email" name="tienda_email" value="<?= $email['valor']; ?>" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label>Direccion de la tienda</label>
                        <textarea class="form-control" name="tienda_direccion" id="tienda_direccion" cols="30" rows="10"  required><?= $direccion['valor']; ?></textarea>
                    </div>

                    <div class="col-12 col-sm-6">
                        <label>Leyenda del ticket</label>
                        <textarea class="form-control" name="ticket_leyenda" id="ticket_leyenda" cols="30" rows="10"  required><?= $leyenda['valor']; ?></textarea>
                    </div>
                </div>
            </div>

            <a href="<?= base_url(); ?>/unidades" class="btn btn-primary">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>

    </div>
</main>


<!-- Modal -->
<div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Desea eliminar este registo?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">No</button>
        <a  class="btn btn-danger btn-ok">Si</a>
      </div>
    </div>
  </div>
</div>