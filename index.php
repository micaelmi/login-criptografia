<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Entrar na plataforma</title>

  <link rel="stylesheet" href="./css/styles.css" />
  <script defer src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
  <script defer src="js/forms.js"></script>
</head>

<body>
  <main class="container">
    <form action="cadastro.php" method="POST" id="cadastro">
      <h1>Cadastro</h1>
      <input required type="text" placeholder="Nome" name="nome" id="nome" />
      <input required type="email" placeholder="E-mail" name="email" id="email" />
      <div id="email-error" class="error-message"></div>
      <input required type="password" placeholder="Senha" name="senha" id="senha" />
      <div id="senha-error" class="error-message"></div>
      <button type="submit" id="cadastrar">Cadastrar</button>
    </form>
    <form action="login.php" method="POST" id="login">
      <h1>Login</h1>
      <div id="error-container"></div>
      <input required type="email" placeholder="E-mail" name="login-email" id="login-email" />
      <input required type="password" placeholder="Senha" name="login-senha" id="login-senha" />
      <button type="submit" id="entrar">Entrar</button>
      <a href="esqueci.php">Esqueci minha senha</a>
    </form>
  </main>
</body>

</html>