
<div id="layoutSidenav_content">
<?= 'categorias' ?>
<main>
    <div class="container-fluid">
        <h4 class="mt-4"><?= $titulo; ?></h4>
            <div>
                <p>
                    <a href="<?= base_url(); ?>/categorias" class="btn btn-warning">categorias</a>
                </p>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($datos as $dato) { ?>
                            <tr>
                                <td><?= $dato['id'] ?></td>
                                <td><?= $dato['nombre'] ?></td>
                                <td><a href="<?= base_url(); ?>/categorias/reingresar/<?= $dato['id'] ?>" ><i class="fas fa-arrow-alt-circle-up"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
</main>
