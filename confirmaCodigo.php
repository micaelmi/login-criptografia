<?php

if (isset($_COOKIE["recovery"])) {
  $email = unserialize($_COOKIE["recovery"]);
} else {
  header("location:esqueci.php");
}

$codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_SPECIAL_CHARS);

include_once 'conexao.php';

// === === === === === PEGAR HORA ATUAL === === === === ===
// Configura o fuso horário para o horário de São Paulo (GMT-3)
date_default_timezone_set('America/Sao_Paulo');
// Pega a data e hora atual
$dataHoraAtual = new DateTime();
// Formata a data e hora resultante no formato DATETIME do MySQL
$horaAtual = $dataHoraAtual->format('Y-m-d H:i:s');

$bd = connection();
$sql = "SELECT * FROM codigos_recuperacao WHERE codigo = '$codigo' AND validade > '$horaAtual' AND status = 'Não utilizado' ORDER BY id DESC LIMIT 1";
$comando = $bd->query($sql);
$result = $comando->fetch(PDO::FETCH_ASSOC);

if (!$result) {
  echo "Código inválido. Ou está incorreto ou já expirou";
  exit();
}
$sql = "SELECT id FROM usuarios WHERE email = '$email'";
$comando = $bd->query($sql);
$id_usuario = $comando->fetch(PDO::FETCH_ASSOC);

echo $result['id_usuario'];

if ($result['id_usuario'] == $id_usuario['id']) {
  echo "Código correto";
  $bd = null;
  $duracao = time() + (60 * 15); // 15 minutos
  setcookie("aprovado", serialize($codigo), $duracao, '/');
  header("location:novaSenha.php");
  exit();
}

$bd = null;
header("location:index.php");
