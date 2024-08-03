<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/remedy.css">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="shortcut icon" href="../../public/urubu-icon.svg" type="image/x-icon">
    <title>Urubu do pix - Trading</title>
</head>
<body>
    <?php 
        session_start();

        $parag = null;
        $success = null;
        $error = null;
        
        if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
            header('Location: login.php');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $db = new SQLite3('../../db.sqlite3');

            $username = $_SESSION['username'];
            $values = $_POST['depositedValue'];

            try {
                $db->exec('BEGIN');

                $stmt = $db->prepare("SELECT money FROM users WHERE username = :username");
                $stmt->bindValue(':username', $username, SQLITE3_TEXT);
                $result = $stmt->execute();
                $row = $result->fetchArray(SQLITE3_ASSOC);

                if ($row) {
                    $newMoney = $row['money'] + $values;

                    // Atualiza o valor de money no banco de dados
                    $stmt = $db->prepare("UPDATE users SET money = :money WHERE username = :username");
                    $stmt->bindValue(':money', $newMoney, SQLITE3_FLOAT);
                    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
                    $stmt->execute();

                    // Confirma a transação
                    $db->exec('COMMIT');

                    $success = "<p class=\"lead\" style=\"color: green;\">Depósito realizado com sucesso! Novo saldo: " . $newMoney . "</p>";
                } else {
                    $error = "<p class=\"lead\" style=\"color: red;\">Usuario não encontrado</p>";
                }
            } catch (Exception $e) {
                $db->exec('ROLLBACK');
                $error = "<p class=\"lead\" style \"color: red;\">Ocorreu um erro: " . $e->getMessage(). "</p>";
            }

            $fifteenDays= ($values / 100 * 33.33) * 15;
            $thirtenDays= ($values / 100 * 33.33) * 30;
            $parag = "<p class=\"lead\">Valor depositado R\$$values em 15 dias retorna " . ceil($fifteenDays) . " com 30 dias retorna ". ceil($thirtenDays) . "</p>";
        }
    ?>
    <header class="bg-primary">
        <h1 class="center-txt h1-header">
            Trading personalizada
            <a href="../../index.php">
                <img width="60" src="../../assets/svgs/logo-pix.svg" alt="icone_do_pix">
            </a>
        </h1>
        <nav class="header-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a href="./game.php" class="nav-link">
                        Jogar
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./account.php" class="nav-link">
                        Conta
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main class="center-main">
        <form action="./trading.php" method="post" class="form-deposit">
            <label for="depositedValue">Valor para depositar...</label>
            <input type="number" name="depositedValue" id="depositedValueId" placeholder="R$..." required autofocus step="0.01">
            <?php 
                echo $parag;
                echo $success;
                echo $error;
            ?>
            <input type="submit" value="Depositar">
        </form>
    </main>
</body>
</html>