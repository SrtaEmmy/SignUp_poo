<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Registro</h1>
    <form method="post">
        <label for="name">Nombre</label>
        <input type="text" name="name"> <br>

        <label for="email">Email</label>
        <input type="email" name="email"> <br>

        <label for="password">Password</label>
        <input type="password" name="password"><br>

        <label for="phone">Phone</label>
        <input type="number" name="phone"><br>

        <label for="rol">Admin</label>
        <input type="radio" name="rol" value="admin">
        <label for="rol">Cliente</label>
        <input type="radio" name="rol" value="client"><br><br>

        <input type="submit" value="Enviar">
        <?php if (!empty($error)): ?>
            <p style="color: red;"><?php echo $error ?></p>
        <?php endif ?>

        <?php if (isset($saved)):
            if ($saved == true): ?>
                <p style="color: green;">Usuario Registrado</p>
            <?php else: ?>
                <p style="color: red" >El correo ya esta en uso</p>
            <?php endif ?>
        <?php endif ?>



    </form>

</body>

</html>