<?php

if (!defined('HOST')) {
    define('HOST', 'localhost');
}

if (!defined('USUARIO')) {
    define('USUARIO', 'root');
}

if (!defined('SENHA')) {
    define('SENHA', '');
}

if (!defined('BASE')) {
    define('BASE', 'tads');
}

$conexao = new mysqli(HOST, USUARIO, SENHA, BASE);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

?>
