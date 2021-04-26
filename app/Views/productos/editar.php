
<div id="layoutSidenav_content">
<?= 'nuevo, (producto)' ?>
<main>
    <div class="container-fluid">
        <h4 class="mt-4"><?= $titulo; ?></h4>
            
        <form method="POST" action="<?= base_url() ?>/productos/actualizar" autocomplete="off">
            <?php csrf_field(); ?>

            <input type="hidden" id="id" name="id" value="<?= $producto['id']; ?>" />

            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label for="">Código</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" value="<?= $producto['codigo']; ?>" autofocus required>
                    </div>

                    <div class="col-12 col-sm-6">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $producto['nombre']; ?>" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label for="">Unidad</label>
                        <select class="form-control" name="id_unidad" id="id_unidad" required>
                            <option value="">Seleccionar unidad</option>
                            <?php foreach($unidades as $unidad){ ?>
                                <option value="<?= $unidad['id']; ?>" <?php if($unidad['id'] == $producto['id_unidad']){echo 'selected';} ?>>
                                    <?= $unidad['nombre']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="">Categoria</label>
                        <select class="form-control" name="id_categoria" id="id_categoria" required>
                            <option value="">Seleccionar categoria</option>
                            <?php foreach($categorias as $categoria){ ?>
                                <option value="<?= $categoria['id']; ?>" <?php if($categoria['id'] == $producto['id_categoria']){echo 'selected';} ?>>
                                    <?= $categoria['nombre']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label for="">Precio venta</label>
                        <input type="text" class="form-control" id="precio_venta" name="precio_venta" value="<?= $producto['precio_venta']; ?>" required>
                    </div>

                    <div class="col-12 col-sm-6">
                        <label for="">Precio compra</label>
                        <input type="text" class="form-control" id="precio_compra" name="precio_compra" value="<?= $producto['precio_compra']; ?>" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label for="">Stock mínimo</label>
                        <input type="text" class="form-control" id="stock_minimo" name="stock_minimo" value="<?= $producto['stock_minimo']; ?>"  required>
                    </div>

                    <div class="col-12 col-sm-6">
                        <label for="">Es inventariable</label>
                        <select class="form-control" name="inventariable" id="inventariable">
                                <option value="1" <?php if($producto['inventariable'] == 1){echo 'selected';} ?>>
                                    Si
                                </option> 
                                <option value="0" <?php if($producto['inventariable'] == 0){echo 'selected';} ?>>
                                    No
                                </option>
                        </select>
                    </div>
                </div>
            </div>

            <a href="<?= base_url(); ?>/productos" class="btn btn-primary">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</main>
