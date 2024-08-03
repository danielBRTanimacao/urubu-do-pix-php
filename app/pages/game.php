<?php 
    session_start();    
    if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
        header('Location: login.php');
        exit();
    }

    $db = new SQLite3('../../db.sqlite3');

    $error = null;

    $username = htmlspecialchars($_SESSION['username']);

    try {
        // Seleciona o valor de money do usuário
        $stmt = $db->prepare("SELECT money FROM users WHERE username = :username");
        $stmt->bindValue(':username', $username, SQLITE3_TEXT);
        $result = $stmt->execute();
        $row = $result->fetchArray(SQLITE3_ASSOC);

        if ($row) {
            $money = $row['money'];
        } else {
            $error = "Usuário não encontrado.";
        }
    } catch (Exception $e) {
        $error = "Ocorreu um erro: " . $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/remedy.css">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="shortcut icon" href="../../public/urubu-icon.svg" type="image/x-icon">
    <title>Urubu do pix - Jogo</title>
</head>
<body>
    <header class="bg-primary">
        <h1 class="center-txt h1-header">
            Jogo do Urubu
            <a href="../../index.php">
                <img width="60" src="../../assets/svgs/logo-pix.svg" alt="icone_do_pix">
            </a>
        </h1>
    </header>
    <main class="center-main break-game" style="height: 80vh !important;">
        <article style="display: grid; width: 50%; justify-content: start;">
            <p class="border-left" id="user-money">
                <?="R\$" . number_format($money, 2, ',', '.')?>
            </p>
        </article>
        <div class="game">
            <div class="box-game">
                <p id="first-number">
                    0
                </p>
            </div>
            <div class="box-game">
                <p id="second-number">
                    0
                </p>
            </div>
            <div class="box-game">
                <p id="third-number">
                    0
                </p>
            </div>
        </div>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                echo"
                <form action=\"./game.php\" method=\"post\" class=\"form-deposit\">
                    <input type=\"hidden\" name=\"amount\" value=\"10\">
                    <input type=\"button\" value=\"Girar R$5.00\" id=\"rollGame\">
                    <input type=\"submit\" value=\"Sacar\" disabled id=\"sWithdrawn\">
                </form>";
            } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $valuePost = $_POST['amount'];
                echo"<p class=\"winner\">Valor resgatado R\$$valuePost</p>";
            }
        ?>
    </main>
    <script src="../../assets/js/game.js"></script>
</body>
</html>