
<div id="layoutSidenav_content">
<?= 'editar' ?>
<main>
    <div class="container-fluid">
        <h4 class="mt-4"><?= $titulo; ?></h4>
            
        <form method="POST" action="<?= base_url() ?>/categorias/actualizar" autocomplete="off">
            <input type="hidden" value="<?php echo $datos['id']; ?>" name="id">
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datos['nombre']; ?>" autofocus require>
                    </div>
                </div>
            </div>
            <a href="<?= base_url(); ?>/categorias" class="btn btn-primary">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</main>
