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
    <h1>Recuperação de conta</h1>
    <form action="recuperacao.php" method="POST">
      <h2>Informe seu e-mail para prosseguir</h2>
      <input type="e-mail" placeholder="Seu e-mail..." name="email">
      <p>Um código de segurança será enviado a esse e-mail para que 
        você possa continuar o processo de recuperação de conta</p>
      <button type="submit">Enviar</button>
    </form>
  </main>
</body>
</html>