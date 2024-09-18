<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /Proyectos/QA');
  }
  require '../database.php';

  $message = '';


  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /Proyectos/QA");
    } else {
      $message = 'correo o Contraseña incorrecta ';
    }
  }

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Q&A</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
</head>
<body>
<head>
  
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="Login.php" method="POST">
        <h3>Inicio</h3>
        <?php if(!empty($message)): ?>
            <p> <?= $message ?></p>
        <?php endif; ?>
        <label for="username">Nombre</label>
        <input type="text" placeholder="nombre de usuario" id="nombre de usuario" name="email">

        <label for="password">comtraseña</label>
        <input type="password" placeholder="password" id="contraseña" name="password">

        <button>INGRESAR</button>
        <button class="yamate"><a href="./registro.php">REGISTRARSE</a></button>
    </form>
</body>
</html>
