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
        <form action="./game.php" method="post" class="form-deposit">
            <input type="hidden" name="amount">
            <input type="button" value="Girar R$5.00" id="rollGame">
            <input type="submit" value="Sacar" disabled>
        </form>
    </main>
    <script src="../../assets/js/game.js"></script>
</body>
</html>