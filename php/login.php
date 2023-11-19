<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  
    <link rel="stylesheet" href="css/style_index.css">

    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/sign-in/">
  </head>

  <body class="text-center">
    
    <?php session_start(); ?>
    
    <form class="form-signin"action="php/ValidarLogin.php" method="POST">
      
      <label for="inputEmail">Digite seu usuário:</label>
      <input onkeyup="this.value = this.value.toLowerCase()" type="text" name="login" class="form-control" placeholder="Usuário" required="" autofocus="">
      
      <label for="inputPassword">Digite sua senha:</label>
      <input type="password" name="password" id="passowrd" class="form-control" placeholder="Senha" required="">

      <?php if(isset($_SESSION['naoautenticado'])):?> <p>Usuário ou senha inválidos.</p> <?php endif; unset($_SESSION['naoautenticado']);?>  
      
      <button class="btn btn-secondary btn-lg" type="submit">Entrar</button>
    </form>

    <footer>
            <p><small>&copy Copyright 2021 - FabianoRocha todos os direitos reservados.</small></p>
    </footer>

  </body>

</html>