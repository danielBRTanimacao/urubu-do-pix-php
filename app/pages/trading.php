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
            <input type="text" name="depositedValue" id="depositedValueId" placeholder="R$..." required autofocus>
            <input type="submit" value="Depositar">
        </form>
    </main>
    <?php 
        $values = $_POST['depositedValue'];
        $fifteenDays= ($values / 100 * 33.33) * 15;
        $thirtenDays= ($values / 100 * 33.33) * 30;
        echo "Valores Post R\$$values em 15 dias retorna " . ceil($fifteenDays) . " com 30 dias retorna ". ceil($thirtenDays);
    ?>
</body>
</html>