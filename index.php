<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/remedy.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="shortcut icon" href="./public/urubu-icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Urubu do pix - Index</title>
</head>
<body>
    <header class="bg-primary">
        <h1 class="center-txt h1-header">
            Urubu do pix
            <a href="./index.php">
                <img width="60" src="./assets/svgs/logo-pix.svg" alt="icone_do_pix">
            </a>
        </h1>
        <nav class="header-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a href="./app/pages/trading.php" class="nav-link">
                        Trading
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./app/pages/game.php" class="nav-link">
                        Jogar
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./app/pages/account.php" class="nav-link">
                        Conta
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main class="center-main">
        <div class="row-main-table">
            <h2 class="title-trading">Tabela de Trading</h2>
            <ul class="nav-trading">
                <li>
                    <form action="./app/pages/trading.php" method="post">
                        <input type="hidden" name="depositedValue" value="200">
                        <input class="trading-input" type="submit" value="$200 Retorno 2000">
                    </form>
                </li>   
                <li>
                    <form action="./app/pages/trading.php" method="post">
                        <input type="hidden" name="depositedValue" value="250">
                        <input class="trading-input" type="submit" value="$250 Retorno 2500">
                    </form>
                </li>
                <li>
                    <form action="./app/pages/trading.php" method="post">
                        <input type="hidden" name="depositedValue" value="300">
                        <input class="trading-input" type="submit" value="$300 Retorno 3000">
                    </form>
                </li>
                <li>
                    <form action="./app/pages/trading.php" method="post">
                        <input type="hidden" name="depositedValue" value="350">
                        <input class="trading-input" type="submit" value="$350 Retorno 3500">
                    </form>
                </li>
                <li>
                    <form action="./app/pages/trading.php" method="post">
                        <input type="hidden" name="depositedValue" value="400">
                        <input class="trading-input" type="submit" value="$400 Retorno 4000">
                    </form>
                </li>
            </ul>
            <div class="img-center">
                <img src="./assets/imgs/pngegg.png" width="300" alt="urubu-image"> 
            </div>
        </div>
    </main>
    <footer class="pd-p">
        <p style="padding-top: 10px;">
            <i class="bi bi-check-circle" style="padding: 0 5px 0 0;"></i>Seguro
        </p>
        <p>
            <i class="bi bi-check-circle" style="padding: 0 5px 0 0;"></i>Rapido
        </p>
        <p>
            <i class="bi bi-check-circle" style="padding: 0 5px 0 0;"></i>Pratico
        </p>
    </footer>
</body>
</html>