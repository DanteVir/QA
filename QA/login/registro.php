<?php

  require '../database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'USUARIO CREADO';
    } else {
      $message = 'TENEMOS PROBLEMAS CON SU CUENTA';
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <title>registro Q&A</title>
    <link rel="stylesheet" href="registro.css">
 </head>   
</html>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Q&A Login</title>
  
  
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="registro.php" method="post">
        <h3>Registro</h3>
        <?php if(!empty($message)): ?>
            <p style="text-align:center; color:red; font-family:arial;"> <?= $message ?></p>
            <?php endif; ?>

        
        <label for="username" >Correo electronico</label>
        <input type="text" placeholder="correo" id="correo" name="email">
        <label for="password">Contraseña</label>
        <input type="password" placeholder="contraseña" id="contraseña" name="password">
        <label for="password">Confirmar contraseña</label>
        <input type="password" placeholder="Confirmar" id="contraseña" name="password">

        <button>REGISTRARSE</button>
        <button><a href="login.php">INICIAR SESION</a></button>

    </form>
</body>
</html>