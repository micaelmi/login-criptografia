<?php

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

include_once 'conexao.php';

$bd = connection();
$sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
$comando = $bd->query($sql);
$result = $comando->fetch(PDO::FETCH_ASSOC);

if (!$result) {
  echo "Esse e-mail não está cadastrado na plataforma!";
  exit();
}

$id = $result["id"];

// token para recuperação de senha
$codigo = rand(1000, 9999);

// === === === === === Definição da validade === === === === ===
// Configura o fuso horário para o horário de São Paulo (GMT-3)
date_default_timezone_set('America/Sao_Paulo');
// Pega a data e hora atual
$dataHoraAtual = new DateTime();
// Adiciona 1 hora à data e hora atual
$dataHoraAtual->add(new DateInterval('PT15M'));
// Formata a data e hora resultante no formato DATETIME do MySQL
$validade = $dataHoraAtual->format('Y-m-d H:i:s');


// - Gravar código no banco de dados

$sql = "INSERT INTO codigos_recuperacao (id_usuario, codigo, validade) VALUES ($id, '$codigo', '$validade')";
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
$duracao = time() + (60 * 15); // 15 minutos

setcookie("recovery", serialize($email), $duracao, '/'); // Salva o e-mail de recuperação

// - Mandar email com código de acesso
$para = "$email";
$assunto = "Código para recuperação de conta";
$mensagem = "
  Olá,

  Recebemos sua solicitação para troca de senha do seu perfil através da opção “Esqueci minha senha”.
  
  Segue o código de validação necessário para prosseguir com a redefinição da sua senha.
  
  Código de acesso: $codigo
  (Este código só é válido por 15 minutos)
  
  Caso você não tenha solicitado a troca de senha, por favor, ignore esse e-mail";

$headers = "From: micael@fluencydesign.com.br\r\n";
$headers .= "Reply-To: micael@fluencydesign.com.br\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";

if (mail($para, $assunto, $mensagem, $headers)) {
  echo "E-mail enviado com sucesso!";
} else {
  echo "Erro ao enviar o e-mail.";
}

$bd = null;
header("location:codigo.php"); // Tela de confirmação do código
