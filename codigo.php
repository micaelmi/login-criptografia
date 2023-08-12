<?php
if (!isset($_COOKIE["recovery"])) {
  header("location:esqueci.php");
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
    <h1>Confirmação de código de segurança</h1>
    <form action="confirmaCodigo.php" method="POST">
      <h2>Informe o código que foi enviado no seu e-mail para prosseguir</h2>
      <input type="text" placeholder="Seu código..." name="codigo">
      <button type="submit">Enviar</button>
    </form>
  </main>
</body>

</html>