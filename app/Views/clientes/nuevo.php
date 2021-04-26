
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
        
        <form method="POST" action="<?= base_url() ?>/clientes/insertar" autocomplete="off">
            <?php csrf_field(); ?>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= set_value('nombre'); ?>" autofocus >
                    </div>

                    <div class="col-12 col-sm-6">
                        <label for="">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="<?= set_value('direccion'); ?>" >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label for="">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?= set_value('telefono'); ?>"  >
                    </div>

                    <div class="col-12 col-sm-6">
                        <label for="">Correo</label>
                        <input type="text" class="form-control" id="correo" name="correo" value="<?= set_value('correo'); ?>" >
                    </div>
                </div>
            </div>

  

            <a href="<?= base_url(); ?>/clientes" class="btn btn-primary">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</main>
