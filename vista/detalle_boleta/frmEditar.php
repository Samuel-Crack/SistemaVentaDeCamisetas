<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando Detalle Boleta</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="recursos/css/bootstrap.min.css" >
    <link rel="stylesheet" href="recursos/icons/bootstrap-icons.css">
</head>
<body>
    <h3><?=$encabezado?></h3>
    <form action="?ctrl=CtrlDetalle_boleta&accion=guardarEditar" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text">Id:</span>
            <input type="text" name="id" value="<?=$detalle_boleta->getId()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Cantidad:</span>
            <input type="text" name="cantidad" value="<?=$detalle_boleta->getCantidad()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Precio Unitario:</span>
            <input type="text" name="precio_unitario" value="<?=$detalle_boleta->getPrecio_unitario()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Subtotal:</span>
            <input type="text" name="subtotal" value="<?=$detalle_boleta->getSubtotal()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Producto:</span>
            <input type="text" name="producto" value="<?=$detalle_boleta->getProducto()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Id Boletas:</span>
            <input type="text" name="idboletas" value="<?=$detalle_boleta->getIdboletas()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Id Detalle Camisetas:</span>
            <input type="text" name="iddetalles_camisetas" value="<?=$detalle_boleta->getiIddetalles_camisetas()?>" 
                class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
    </form>
    <br><a href="?ctrl=CtrlDetalle_boleta" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</body>
</html>