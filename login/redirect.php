<?php
  session_start();

  if (!isset($_SESSION['usuario'])) {
    echo '
      <script>
            alert("No tienes permiso para ver esta pagina.");
            window.location = "./login.php"
        </script>
    ';
    session_destroy();
    die();
  }

  if($_SESSION['type'] == 'auditor'){
    header("location: ../auditor/index.php");
  }

  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <button>
      <a href="./php/logout_bd.php">Cerrar sesion</a>
    </button>
  </body>
</html>
