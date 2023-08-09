<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastre-se</title>

    <link rel="stylesheet" href="./css/styles.css" />
    <script defer src="./js/main.js"></script>
  </head>
  <body>
    <main class="container">
      <form action="cadastro.php" method="POST">
        <h1>Cadastro</h1>
        <input type="text" placeholder="Nome" name="nome" />
        <input type="text" placeholder="E-mail" name="email" />
        <input type="password" placeholder="Senha" name="senha" />
        <button type="submit">Cadastrar</button>
      </form>
      <form action="login.php" method="POST">
        <h1>Login</h1>
        <input type="text" placeholder="E-mail" name="login-email" />
        <input type="password" placeholder="Senha" name="login-senha" />
        <button type="submit">Entrar</button>
      </form>
    </main>
  </body>
</html>
