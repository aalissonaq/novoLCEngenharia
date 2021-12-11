<?php

if (!isset($_GET['page']) || $_GET['page'] == null) {
  include "./pages/index-crm.php";
} else {
  switch (@$_GET['page']) {
    case 'inicio':
      include "./pages/dashboard.php";
      break;

    case 'profile': //Perfil de usuario
      include "./pages/profile.php";
      break;

    case 'users': //Usuarios
      include "./pages/usuarios.php";
      break;

    case 'customers': //Clientes
      include "./pages/customers.php";
      break;

    case 'projects': //Projetos
      include "./pages/projects.php";
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
