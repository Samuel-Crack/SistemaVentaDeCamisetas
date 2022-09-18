<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Detalle Boleta</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="recursos/css/bootstrap.min.css" >
    <link rel="stylesheet" href="recursos/icons/bootstrap-icons.css">   
</head>
<body>
    <h3><?=$encabezado?></h3>
    <form action="?ctrl=CtrlDetalle_boleta&accion=guardarNuevo" method="post">
        <div class="row mb-3">
        <div class="col-md-6">
            <label for="inputID" class="form-label">Id:</label>
            <input type="text" class="form-control"
                name="id" value="" id="inputID">
        </div>
        <div class="col-md-6">
            <label for="inputdetalle_boleta" class="form-label">Cantidad:</label>
            <input type="text" class="form-control"
                name="cantidad" value="" id="inputdetalle_boleta">
        </div>
        <div class="col-md-6">
            <label for="inputdetalle_boleta" class="form-label">Precio Unitario:</label>
            <input type="text" class="form-control"
                name="precio_unitario" value="" id="inputdetalle_boleta">
        </div>
        <div class="col-md-6">
            <label for="inputdetalle_boleta" class="form-label">Subtotal:</label>
            <input type="text" class="form-control"
                name="subtotal" value="" id="inputdetalle_boleta">
        </div>
        <div class="col-md-6">
            <label for="inputdetalle_boleta" class="form-label">Producto:</label>
            <input type="text" class="form-control"
                name="producto" value="" id="inputdetalle_boleta">
        </div>
        <div class="col-md-6">
            <label for="inputdetalle_boleta" class="form-label">Id Boletas:</label>
            <input type="text" class="form-control"
                name="idboletas" value="" id="inputdetalle_boleta">
        </div>
        <div class="col-md-6">
            <label for="inputdetalle_boleta" class="form-label">Id Detalles Camisetas:</label>
            <input type="text" class="form-control"
                name="iddetalles_camisetas" value="" id="inputdetalle_boleta">
        </div>
        </div>
        <div class="col-md-3">
        <button type="submit" class="form-control btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
        </div>
    </form>
    <br><a href="?ctrl=CtrlDetalle_boleta" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</body>
</html>