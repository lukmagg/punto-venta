
<div id="layoutSidenav_content">
<?= 'nuevo' ?>

<main>
    <div class="container-fluid">
        <h4 class="mt-4"><?= $titulo; ?></h4>

        <!-- Si viene $validation como parametro lo imprime en un cuadro danger -->
        <?php if(isset($validation)){ ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
        <?php } ?>
        
        <form method="POST" action="<?= base_url() ?>/unidades/insertar" autocomplete="off">
            <?php csrf_field(); ?>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= set_value('nombre') ?>" autofocus required>
                    </div>

                    <div class="col-12 col-sm-6">
                        <label for="">Nombre corto</label>
                        <input type="text" class="form-control" id="nombre_corto" name="nombre_corto" value="<?= set_value('nombre_corto') ?>" required>
                    </div>
                </div>
            </div>
            <a href="<?= base_url(); ?>/unidades" class="btn btn-primary">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</main>
