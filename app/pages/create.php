<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/remedy.css">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="shortcut icon" href="../../public/urubu-icon.svg" type="image/x-icon">
    <title>Urubu do pix - Create</title>
</head>
<body>
    <main>
        <h2>Registrar Usuário</h2>
        <form action="./create.php" method="post">
            <label for="username">Nome de Usuário:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Registrar">
        </form>
    </main>
    <?php 
        include "../models/user.php";

        $user = new User('Daniel', '123', 300);
        echo "<p>{$user->showInfos()}</p>";
    ?>
</body>
</html>