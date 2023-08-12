<?php
if (!isset($_COOKIE["aprovado"])) {
  header("location:codigo.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Recuperação de conta</title>

  <link rel="stylesheet" href="./css/styles.css" />
</head>

<body>
  <main>
    <h1>Definição de nova senha</h1>
    <form action="mudaSenha.php" method="POST">
      <h2>Crie sua nova senha</h2>
      <h4>Lembre-se de anotar em um local seguro!</h4>
      <input type="password" placeholder="Nova senha" name="senha" id="senha">
      <input type="password" placeholder="Confirme a nova senha" name="senhaConfirmada" id="senhaConfirmada">
      <button type="submit">Salvar</button>
    </form>
  </main>
</body>

</html>