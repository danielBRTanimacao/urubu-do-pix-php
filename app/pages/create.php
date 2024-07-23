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
            <p style="padding: 0; margin: 0;">
                Ja tem uma conta? <a href="./login.php">Entrar</a>
            </p>
            <input type="submit" value="Registrar">
        </form>
    </main>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            session_start();
            $db = new SQLite3("../../db.sqlite3");

            $db->exec("CREATE TABLE IF NOT EXISTS users ( id INTEGER PRIMARY KEY AUTOINCREMENT,
                username TEXT UNIQUE NOT NULL,
                password TEXT NOT NULL,
                money REAL NOT NULL
            )");

            $username = $_POST['username'];
            // $password = $_POST['password'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $money = 0;

            $stmt = $db->prepare("INSERT INTO users (username, password, money) VALUES (:username, :password, :money)");
            $stmt->bindValue(":username", $username, SQLITE3_TEXT);
            $stmt->bindValue(":password", $password, SQLITE3_TEXT);
            $stmt->bindValue(":money", $money, SQLITE3_FLOAT);

            if ($stmt->execute()) {
                header('Location: login.php');
                exit();
            } else {
                echo "<p style=\"text-align: center; color: red; font-weight: 700;\">Ocorreu um erro</p>";
            }
        }
    ?>
</body>
</html>