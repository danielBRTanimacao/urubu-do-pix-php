<?php
    $db = new SQLite3('db.sqlite3');

    // Criar a tabela de usuários se não existir
    $db->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT UNIQUE NOT NULL,
        password TEXT NOT NULL,
        money REAL NOT NULL,
    )");

    echo "Banco de dados e tabela criados com sucesso.";
    class User {
        public $username;
        public $password;
        public $money;

        public function __construct($username, $password, $money) {
            $this->username = $username;
            $this->password = $password;
            $this->money = $money;
        }

        public function showInfos() {
            return "Seu nome: {$this->username}, Senha: {$this->password}, Dinheiro: {$this->money}";
        }
    }
?>