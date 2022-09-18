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
    <a href="?ctrl=CtrlDetalle_boleta&accion=nuevo" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> 
        Insertar Nuevo Detalle_boleta</a>
    <br><br>
    <table class="table table-striped">
        <tr>
            <th>Iddetalle_boleta</th>
            <th>Cantidad</th>
            <th>Precio_unitario</th>
            <th>Subtotal</th>
            <th>Producto</th>
            <th>Idboletas</th>
            <th>Iddetalles_camisetas</th>
            <th>Operaciones</th>
        </tr>
    <?php 
    if (is_array($datos))
        foreach ($datos as $c) { ?>
            <tr>
                <td><?=$c["iddetalle_boleta"]?></td>
                <td><?=$c["cantidad"]?></td>
                <td><?=$c["precio_unitario"]?></td>
                <td><?=$c["subtotal"]?></td>
                <td><?=$c["producto"]?></td>
                <td><?=$c["idboletas"]?></td>
                <td><?=$c["iddetalles_camisetas"]?></td>
                <td>
                <a href="?ctrl=CtrlDetalle_boleta&accion=editar&id=<?=$c["iddetalle_boleta"]?>">
                    <i class="bi bi-pencil-square"></i> Editar </a>
                / 
                <a href="?ctrl=CtrlDetalle_boleta&accion=eliminar&id=<?=$c["iddetalle_boleta"]?>">
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
