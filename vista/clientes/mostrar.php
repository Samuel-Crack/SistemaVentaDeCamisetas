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
    <a href="?ctrl=CtrlClientes&accion=nuevo" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> 
        Insertar Nuevo Clientes</a>
    <br><br>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dni</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Nacionalidad</th> 
            <th>Operaciones</th>
        </tr>
    <?php 
    if (is_array($datos))
        foreach ($datos as $c) { ?>
            <tr>
                <td><?=$c["idclientes"]?></td>
                <td><?=$c["nombres"]?></td>
                <td><?=$c["apellidos"]?></td>
                <td><?=$c["dni"]?></td>
                <td><?=$c["direccion"]?></td>
                <td><?=$c["telefono"]?></td>
                <td><?=$c["nacionalidad"]?></td>

                <td>
                <a href="?ctrl=CtrlClientes&accion=editar&id=<?=$c["idclientes"]?>">
                    <i class="bi bi-pencil-square"></i> Editar </a>
                / 
                <a href="?ctrl=CtrlClientes&accion=eliminar&id=<?=$c["idclientes"]?>">
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