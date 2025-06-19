<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login - Dio AutoCar</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
<style>

body {
  font-family: 'Montserrat', sans-serif;
  background: #121212 url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1480&q=80') no-repeat center center fixed;
  background-size: cover;
  color: #e0e0e0;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}

.modal {
  background-color: rgba(20, 20, 20, 0.9);
  border: 1px solid #d4af37;
  width: 350px;
  padding: 20px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
}

.imgcontainer {
  text-align: center;
  margin: 24px 0;
}

.avatar {
  width: 150px;
  height: auto;
  border-radius: 50%;
  border: 2px solid #d4af37;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #333;
  box-sizing: border-box;
  background-color: #1a1a1a;
  color: #fff;
}

button {
  background-color: #d4af37;
  color: #000;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  font-weight: 600;
}

button:hover {
  opacity: 0.9;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}


@media screen and (max-width: 400px) {
  .modal {
    width: 90%;
  }
}
</style>
</head>
<body>

<?php

if(!empty($_POST)) {
  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];

  if(($usuario == "admin") && ($senha == "admin")) {
    header('Location: menu.php');
    exit(); 
  } else {
    $erro = 'Usuário ou senha incorretos';
  }
}
?>

<div id="id01" class="modal">
  <form class="modal-content animate" action="" method="post">
    <div class="imgcontainer">
      <img src="img/logo.png" alt="Logo" class="avatar">
    </div>

    <div class="container">
      <?php if(isset($erro)) echo '<p style="color:#ff4444;text-align:center;">'.$erro.'</p>'; ?>
      
      <label for="uname"><b>Usuário</b></label>
      <input type="text" placeholder="Digite o usuário" name="usuario" required>

      <label for="psw"><b>Senha</b></label>
      <input type="password" placeholder="Digite a senha" name="senha" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Lembrar-me
      </label>
    </div>

    <div class="container" style="background-color:#1a1a1a">
      <span class="psw"><a href="#" style="color:#d4af37;">Esqueceu a senha?</a></span>
    </div>
  </form>
</div>

</body>
</html>