<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/remedy.css">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="shortcut icon" href="../../public/urubu-icon.svg" type="image/x-icon">
    <title>Urubu do pix - Login</title>
</head>
<body>
    <header class="bg-primary">
        <h1 class="center-txt h1-header">
            Entrar na conta
            <a href="../../index.php">
                <img width="60" src="../../assets/svgs/logo-pix.svg" alt="icone_do_pix">
            </a>
        </h1>
    </header>
    <main class="center-main">
        <form class="form-deposit" action="./login.php" method="post" style="border: 1px solid grey; padding: 15px; border-radius: 5px;">
            <label for="username">Nome de Usuário:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <p style="padding: 0; margin: 0;">
                Não tem uma conta? <a href="./create.php">Criar</a>
            </p>
            <input type="submit" value="Login">
        </form>
    </main>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            session_start();
            $db = new SQLite3('../../db.sqlite3');
            
            $sql ='SELECT * from users where username="'.$_POST["username"].'";';


            $ret = $db->query($sql);
            while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
               $id=$row['id'];
               $username=$row["username"];
               $password=$row["password"];
            }
            if ($id!=""){
                if ($password==$_POST["password"]){
                    $_SESSION["login"]=$username;
                    header('Location: ./account.php');    
                }else{
                   
                   echo "Wrong Password";
                }
               }else{
                echo "User not exist, please register to continue!";
            }
            $db->close();
            
        }
    ?>
</body>
</html>