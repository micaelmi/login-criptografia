<?php

$email = filter_input(INPUT_POST, "login-email", FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, "login-senha", FILTER_DEFAULT);

include_once 'conexao.php';

$bd = connection();
$sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
$comando = $bd->query($sql);
$result = $comando->fetch(PDO::FETCH_ASSOC);

if(password_verify($senha, $result['senha'])) {
  echo "Usuário logado!";
} else {
  echo "Erro ao logar";
  header("location:index.php");
  exit();
}


$duracao = time() + (60 * 60 * 24 * 30); // 30 dias

setcookie("login", serialize($email), $duracao, '/');

//header("location:index.php");
exit();
