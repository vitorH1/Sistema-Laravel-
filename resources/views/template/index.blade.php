<!DOCTYPE html>
<html lang="pt-br">
<head>
    <script src="https://kit.fontawesome.com/ac02a84316.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="shortcut icon" href="{{URL::asset('img/logo.ico')}}" type="image/x-icon">
<link rel="icon" href="{{URL::asset('img/logo.ico')}}" type="image/x-icon">

</head>
<body>

<div class="login-box">
  <h2><img src="{{URL::asset('img/logo1.png')}}" width="220px" style="margin-left: 20px;" > </h2>
  
  <form method="post" action="{{ route('usuarios.login') }}">
    @csrf
    <div class="user-box">
      <input type="text" placeholder="Usuario" name="usuario" required>
      <label><i class="fa-solid fa-user"></i></label>
    </div>   
    <div class="user-box">
      <input type="password" placeholder="Senha" name="senha" required>
      <label><i class="fa-solid fa-lock"></i></label>
    </div>
    <button type="submit">
      <span></span>
      <span></span>
      <span></span>
      Login
    </button>
  </form>
  <br>
</div>
</body>
</html>
