
<div id="layoutSidenav_content">
<?= 'unidades (unidades)'?>
<main>
    <div class="container-fluid">
        <h4 class="mt-4"><?= $titulo; ?></h4>
            <div>
                <p>
                    <a href="<?= base_url(); ?>/unidades/nuevo" class="btn btn-info">Agregar</a>
                    <a href="<?= base_url(); ?>/unidades/eliminados" class="btn btn-warning">Eliminados</a>
                </p>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Nombre corto</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($datos as $dato) { ?>
                            <tr>
                                <td><?= $dato['id'] ?></td>
                                <td><?= $dato['nombre'] ?></td>
                                <td><?= $dato['nombre_corto'] ?></td>
                                <td><a href="<?= base_url(); ?>/unidades/editar/<?= $dato['id'] ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a></td>
                                <td><a href="#" data-href="<?= base_url(); ?>/unidades/eliminar/<?= $dato['id'] ?>" data-toggle="modal" data-target="#modal-confirma" 
                                data-placement="top" title="Eliminar registro" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                            </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
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