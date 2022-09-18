<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando Modelo Seleccion</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="recursos/css/bootstrap.min.css" >
    <link rel="stylesheet" href="recursos/icons/bootstrap-icons.css">
</head>
<body>
    <h3><?=$encabezado?></h3>
    <form action="?ctrl=CtrlModelo_seleccion&accion=guardarEditar" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text">Id:</span>
            <input type="text" name="id" value="<?=$modelo_seleccion->getId()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Id Seleccion:</span>
            <input type="text" name="idseleccion" value="<?=$modelo_seleccion->getIdseleccion()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Descripcion:</span>
            <input type="text" name="descripcion" value="<?=$modelo_seleccion->getDescripcion()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Color:</span>
            <input type="text" name="color" value="<?=$modelo_seleccion->getColor()?>" 
                class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
    </form>
    <br><a href="?ctrl=CtrlModelo_seleccion" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</body>
</html>