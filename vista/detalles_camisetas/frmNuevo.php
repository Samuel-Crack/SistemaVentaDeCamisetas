<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevos Detalles Camisetas</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="recursos/css/bootstrap.min.css" >
    <link rel="stylesheet" href="recursos/icons/bootstrap-icons.css">   
</head>
<body>
    <h3><?=$encabezado?></h3>
    <form action="?ctrl=CtrlDetalles_camisetas&accion=guardarNuevo" method="post">
        <div class="row mb-3">
        <div class="col-md-6">
            <label for="inputID" class="form-label">Id:</label>
            <input type="text" class="form-control"
                name="id" value="" id="inputID">
        </div>
        <div class="col-md-6">
            <label for="inputdetalles_camisetas" class="form-label">Precio:</label>
            <input type="text" class="form-control"
                name="precio" value="" id="inputdetalles_camisetas">
        </div>
        <div class="col-md-6">
            <label for="inputdetalles_camisetas" class="form-label">Stock:</label>
            <input type="text" class="form-control"
                name="stock" value="" id="inputdetalles_camisetas">
        </div>
        <div class="col-md-6">
            <label for="inputdetalles_camisetas" class="form-label">Id Camisetas:</label>
            <input type="text" class="form-control"
                name="idcamisetas" value="" id="inputdetalles_camisetas">
        </div>
        <div class="col-md-6">
            <label for="inputdetalles_camisetas" class="form-label">Id Modelo Talla:</label>
            <input type="text" class="form-control"
                name="idmodelo_talla" value="" id="inputdetalles_camisetas">
        </div>
        <div class="col-md-6">
            <label for="inputdetalles_camisetas" class="form-label">Id Modelo Seleccion:</label>
            <input type="text" class="form-control"
                name="idmodelo_seleccion" value="" id="inputdetalles_camisetas">
        </div>
        <div class="col-md-6">
            <label for="inputdetalles_camisetas" class="form-label">Id Modelo Calidad:</label>
            <input type="text" class="form-control"
                name="idmodelo_calidad" value="" id="inputdetalles_camisetas">
        </div>
        <div class="col-md-6">
            <label for="inputdetalles_camisetas" class="form-label">Id Modelos:</label>
            <input type="text" class="form-control"
                name="idmodelos" value="" id="inputdetalles_camisetas">
        </div>
        </div>
        <div class="col-md-3">
        <button type="submit" class="form-control btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
        </div>
    </form>
    <br><a href="?ctrl=CtrlDetalles_camisetas" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</body>
</html>