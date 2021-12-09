<?php

if (!isset($_GET['page']) || $_GET['page'] == null) {
  include "./pages/dashboard.php";
} else {
  switch (@$_GET['page']) {
    case 'inicio':
      include "./pages/dashboard.php";
      break;

    case 'profile': //Perfil de usuario
      include "./pages/profile.php";
      break;

    case 'usuarios':  // Usuarios
      include "./pages/usuarios.php";
      break;


      #Quando não encontrar pagina
    default:
      echo "<script>window.location.href = 'error404.php';</script>";
      break;
  }
}
