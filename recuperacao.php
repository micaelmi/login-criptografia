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

function geraNovaSenha($tamanho)
{
  $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $codigo = '';

  for ($i = 0; $i < $tamanho; $i++) {
    $codigo .= $caracteres[random_int(0, strlen($caracteres) - 1)];
  }

  return $codigo;
}

$tamanhoSenha = random_int(8, 16);

$novaSenha = geraNovaSenha($tamanhoSenha);

/* PRÓXIMOS PASSOS
- Criptografar a senha 
- mudar a senha no banco de dados
- mandar email com a nova senha de acesso
*/