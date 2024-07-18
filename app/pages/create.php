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
    <header class="bg-primary">
        <h1 class="center-txt h1-header">
            Criar conta
            <a href="../../index.php">
                <img width="60" src="../../assets/svgs/logo-pix.svg" alt="icone_do_pix">
            </a>
        </h1>
    </header>
    <main class="center-main">
        <form class="form-deposit" action="./create.php" method="post" style="border: 1px solid grey; padding: 15px; border-radius: 5px;">
            <label for="username">Nome de Usuário:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Registrar">
        </form>
    </main>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include "../models/user.php";
    
            $user = new User('Daniel', '123', 300);
            echo "<p>{$user->showInfos()}</p>";
        }
    ?>
</body>
</html>