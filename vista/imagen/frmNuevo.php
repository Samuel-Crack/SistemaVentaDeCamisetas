<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Imagen</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="recursos/css/bootstrap.min.css" >
    <link rel="stylesheet" href="recursos/icons/bootstrap-icons.css">   
</head>
<body>
    <h3><?=$encabezado?></h3>
    <form action="?ctrl=CtrlImagen&accion=guardarNuevo" method="post">
        <div class="row mb-3">
        <div class="col-md-6">
            <label for="inputID" class="form-label">Id:</label>
            <input type="text" class="form-control"
                name="id" value="" id="inputID">
        </div>
        <div class="col-md-6">
            <label for="inputImagen" class="form-label">Id modelo seleccion:</label>
            <input type="text" class="form-control"
                name="idmodelo_seleccion" value="" id="inputImagen">
        </div>
        <div class="col-md-6">
            <label for="inputImagen" class="form-label">Descripcion:</label>
            <input type="text" class="form-control"
                name="descripcion" value="" id="inputImagen">
        </div>
        <div class="col-md-6">
            <label for="inputImagen" class="form-label">Url:</label>
            <input type="text" class="form-control"
                name="url" value="" id="inputImagen">
        </div>
        
        </div>
        <div class="col-md-3">
        <button type="submit" class="form-control btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
        </div>
    </form>
    <br><a href="?ctrl=CtrlImagen" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</body>
</html>