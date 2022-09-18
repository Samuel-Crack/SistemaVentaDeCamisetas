<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$titulo?></title>
    <!-- CSS only -->
    <link rel="stylesheet" href="recursos/css/bootstrap.min.css" >
    <link rel="stylesheet" href="recursos/icons/bootstrap-icons.css">
</head>
<body>
    <h1><?=$encabezado?></h1>
    <a href="?ctrl=CtrlDetalles_camisetas&accion=nuevo" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> 
        Insertar Nuevo Detalles Camisetas</a>
    <br><br>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>precio</th>
            <th>stock</th>
            <th>Idcamisetas</th>
            <th>Idmodelo Talla</th>
            <th>Idmodelo SeleccIon</th>
            <th>Idmodelo Calidad</th> 
            <th>Id modelos</th> 
            <th>Operaciones</th>
        </tr>
    <?php 
    if (is_array($datos))
        foreach ($datos as $c) { ?>
            <tr>
                <td><?=$c["iddetalles_camisetas"]?></td>
                <td><?=$c["precio"]?></td>
                <td><?=$c["stock"]?></td>
                <td><?=$c["idcamisetas"]?></td>
                <td><?=$c["idmodelo_talla"]?></td>
                <td><?=$c["idmodelo_seleccion"]?></td>
                <td><?=$c["idmodelo_calidad"]?></td>
                <td><?=$c["idmodelos"]?></td>

                <td>
                <a href="?ctrl=CtrlDetalles_camisetas&accion=editar&id=<?=$c["iddetalles_camisetas"]?>">
                    <i class="bi bi-pencil-square"></i> Editar </a>
                / 
                <a href="?ctrl=CtrlDetalles_camisetas&accion=eliminar&id=<?=$c["iddetalles_camisetas"]?>">
                    <i class="bi bi-trash"></i> Eliminar </a>
                </td>
            </tr>
        <?php }    ?>
    </table>
    <br><a href="?" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</body>
</html>