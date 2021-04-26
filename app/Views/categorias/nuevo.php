
<div id="layoutSidenav_content">
<?= 'nuevo' ?>
<main>
    <div class="container-fluid">
        <h4 class="mt-4"><?= $titulo; ?></h4>
        <?php \Config\Services::validation()->listErrors(); ?>

        <form method="POST" action="<?= base_url() ?>/categorias/insertar" autocomplete="off">
            <?php csrf_field(); ?>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" autofocus require>
                    </div>
                 </div>
            </div>
            <a href="<?= base_url(); ?>/categorias" class="btn btn-primary">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</main>
