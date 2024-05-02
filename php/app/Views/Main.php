<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de CodeIgniter</title>
</head>
<body>
    <h1>Categorias</h1>
    <ul>
        <?php foreach($categorias as $categoria): ?>
            <li><?php echo $categoria['Nome']; ?></li>
        <?php endforeach; ?>
    </ul>

    <h1>Unidades</h1>
    <ul>
        <?php foreach($unidades as $unidade): ?>
            <li><?php echo $unidade['Unidade']; ?></li>
        <?php endforeach; ?>
    </ul>

    <h1>Usuários</h1>
    <ul>
        <?php foreach($usuarios as $usuario): ?>
            <li><?php echo $usuario['Nome']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
