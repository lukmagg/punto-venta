
<div id="layoutSidenav_content">
<?= 'nuevo, (cliente)' ?>
<main>
    <div class="container-fluid">
        <h4 class="mt-4"><?= $titulo; ?></h4>
        <?php if(isset($validation)){ ?>
        <div class="alert alert-danger">
            <?php echo $validation->listErrors(); ?>
        </div>
        <?php } ?>
        
        <form method="POST" action="<?= base_url() ?>/clientes/actualizar" autocomplete="off">
            <?php csrf_field(); ?>

            <input type="hidden" id="id" name="id" value="<?= $cliente['id']; ?>" />

            <div class="form-group">
                <div class="row">
                    

                    <div class="col-12 col-sm-6">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $cliente['nombre']; ?>" required>
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $cliente['direccion']; ?>" autofocus required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label for="">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $cliente['telefono']; ?>" required>
                    </div>

                    <div class="col-12 col-sm-6">
                        <label for="">Correo</label>
                        <input type="text" class="form-control" id="correo" name="correo" value="<?= $cliente['correo']; ?>" required>
                    </div>
                </div>
            </div>


            <a href="<?= base_url(); ?>/clientes" class="btn btn-primary">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</main>
