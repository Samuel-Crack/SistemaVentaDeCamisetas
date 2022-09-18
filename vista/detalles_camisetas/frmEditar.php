<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando Detalles Camisetas</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="recursos/css/bootstrap.min.css" >
    <link rel="stylesheet" href="recursos/icons/bootstrap-icons.css">
</head>
<body>
    <h3><?=$encabezado?></h3>
    <form action="?ctrl=CtrlDetalles_camisetas&accion=guardarEditar" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text">Id:</span>
            <input type="text" name="id" value="<?=$detalles_camisetas->getId()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Precio:</span>
            <input type="text" name="precio" value="<?=$detalles_camisetas->getPrecio()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Stock:</span>
            <input type="text" name="stock" value="<?=$detalles_camisetas->getStock()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Id Camisetas:</span>
            <input type="text" name="idcamisetas" value="<?=$detalles_camisetas->getIdcamisetas()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Id Modelo Talla:</span>
            <input type="text" name="idmodelo_talla" value="<?=$detalles_camisetas->getIdmodelo_talla()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Id Modelo Seleccion:</span>
            <input type="text" name="idmodelo_seleccion" value="<?=$detalles_camisetas->getIdmodelo_seleccion()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Id Modelo Calidad:</span>
            <input type="text" name="idmodelo_calidad" value="<?=$detalles_camisetas->getIdmodelo_calidad()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Id Modelos:</span>
            <input type="text" name="idmodelos" value="<?=$detalles_camisetas->getIdmodelos()?>" 
                class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
    </form>
    <br><a href="?ctrl=CtrlDetalles_camisetas" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</body>
</html>