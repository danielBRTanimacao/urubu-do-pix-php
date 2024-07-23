<?php 
    session_start();

    if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
        header('Location: login.php');
        exit();
    }

    $money = 23.4;
    $username = htmlspecialchars($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/remedy.css">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="shortcut icon" href="../../public/urubu-icon.svg" type="image/x-icon">
    <title>Urubu do pix - <?php echo $username ?> </title>
</head>
<body>
    <header class="bg-primary">
        <h1 class="center-txt h1-header">
            Sobre o usuario - <?php echo $username ?>
            <a href="../../index.php">
                <img width="60" src="../../assets/svgs/logo-pix.svg" alt="icone_do_pix">
            </a>
        </h1>
        <nav class="header-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a href="../../app/pages/trading.php" class="nav-link">
                        Trading
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../app/pages/game.php" class="nav-link">
                        Jogar
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main class="center-main">
        <div>
            <nav style="display: flex; align-items: center; gap: 15px;">
                <h1>
                    Dinheiro do user
                </h1>
                <a class="btn" href="./logout.php">sair da conta</a>
            
            </nav>
            <p style="font-size: large;">
                <?php echo "R$" . number_format($money, 2, ',', '.');?>
            </p>
        </div>
    </main>
</body>
</html>