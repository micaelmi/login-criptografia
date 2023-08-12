<?php

if (isset($_COOKIE["aprovado"])) {
  $codigo = unserialize($_COOKIE["aprovado"]);
} else {
  header("location:esqueci.php");
}

$senha = password_hash(filter_input(INPUT_POST, 'senha'), PASSWORD_DEFAULT);

include_once 'conexao.php';
$bd = connection();

$sql = "SELECT * FROM codigos_recuperacao WHERE codigo = '$codigo' AND status = 'Não utilizado' ORDER BY id DESC LIMIT 1";
$comando = $bd->query($sql);
$result = $comando->fetch(PDO::FETCH_ASSOC);

if (!$result) {
  echo "Seu código de recuperação expirou!";
  exit();
}

$id_usuario = $result["id_usuario"];
$sql = "UPDATE usuarios SET senha = '$senha' WHERE id = $id_usuario";
try {
  $bd->beginTransaction();
  $linhas = $bd->exec($sql);
  if ($linhas == 1) {
    $bd->commit();
  } else {
    $bd->rollBack();
  }
} catch (Exception $ex) {
  $params = "Erro!";
  $bd = null;
  echo "erro";
  //header("location:index.php");
  die();
}

$id = $result["id"];
$sql = "UPDATE codigos_recuperacao SET status = 'Utilizado' WHERE id = $id";
try {
  $bd->beginTransaction();
  $linhas = $bd->exec($sql);
  if ($linhas == 1) {
    $bd->commit();
  } else {
    $bd->rollBack();
  }
} catch (Exception $ex) {
  $params = "Erro!";
  $bd = null;
  echo "erro";
  //header("location:index.php");
  die();
}

echo "Senha alterada com sucesso";
$time = time() - 10000;
setcookie("aprovado", "", $time, "/");
setcookie("recovery", "", $time, "/");
