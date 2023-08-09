<?php
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = password_hash(filter_input(INPUT_POST, 'senha'), PASSWORD_DEFAULT);

include_once './conexao.php';

$bd = connection();
$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

try {
  $bd->beginTransaction();
  $linhas = $bd->exec($sql);
  if ($linhas == 1) {
    $bd->commit();
  } else {
    $bd->rollBack();
  }
} catch (Exception $ex) {
  $params = "";
  $params = "erro=Usuário já cadastrado!";

  $bd = null;
  header("location:index.php");
  die();
}

$bd = null;

header("location:index.php");