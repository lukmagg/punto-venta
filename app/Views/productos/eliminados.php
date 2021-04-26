
<div id="layoutSidenav_content">
<?= 'productos' ?>
<main>
    <div class="container-fluid">
        <h4 class="mt-4"><?= $titulo; ?></h4>
            <div>
                <p>
                    <a href="<?= base_url(); ?>/productos" class="btn btn-warning">Productos</a>
                </p>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Precio venta</th>
                            <th>Precio compra</th>
                            <th>Stock mínimo</th>
                            <th>Inventariable</th>
                            <th>Id unidad</th>
                            <th>Id categoría</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($datos as $dato) { ?>
                            <tr>
                                <td><?= $dato['codigo'] ?></td>
                                <td><?= $dato['nombre'] ?></td>
                                <td><?= $dato['precio_venta'] ?></td>
                                <td><?= $dato['precio_compra'] ?></td>
                                <td><?= $dato['stock_minimo'] ?></td>
                                <td><?= $dato['inventariable'] ?></td>
                                <td><?= $dato['id_unidad'] ?></td>
                                <td><?= $dato['id_categoria'] ?></td>
                                <td><a href="#" data-href="<?= base_url(); ?>/productos/reingresar/<?= $dato['id'] ?>" data-toggle="modal" data-target="#modal-confirma" 
                                data-placment="top" title="Reingresar registro"><i class="fas fa-arrow-alt-circle-up"></i></a></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Reingresar registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Desea reingresar este registo?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">No</button>
        <a  class="btn btn-danger btn-ok">Si</a>
      </div>
    </div>
  </div>
</div>
