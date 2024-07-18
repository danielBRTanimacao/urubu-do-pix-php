<?php
    class User {
        public $name;
        public $password;
        public $money;

        public function __construct($name, $password, $money) {
            $this->name = $name;
            $this->password = $password;
            $this->money = $money;
        }

        public function showInfos() {
            return "{$this->name}, Senha: {$this->password}, Dinheiro: {$this->money}";
        }
    }
?>