<?php
session_start();
!isset($_SESSION['released']) ? header('Location: login.php') : '';
require __DIR__ . '/vendor/autoload.php';

require_once './db/connection.php';
require_once './util/util.php';
require_once './util/outfunc.php';

date_default_timezone_set('America/Sao_Paulo');

$connection = novaConexao();
$sqlInitial = "SELECT * FROM identification";
$result = $connection->query($sqlInitial)->fetchAll(PDO::FETCH_ASSOC);
$information = $result[0];


if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $information['fantasy_name'] ?> - <?= $information['slogan']; ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/<?= $information['icon'] ?>">

    <!-- page css -->
    <link href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/select2/select2.css" rel="stylesheet">

    <!-- Core css -->
    <link href="./assets/css/app.min.css" rel="stylesheet">
</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark">
                    <a href="index.php">
                        <img src="assets/images/logo/<?= $information['logo'] ?>" alt="Logo">
                        <img class="logo-fold" src="assets/images/logo/<?= $information['icon'] ?>" alt="Logo">
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="index.php">
                        <img src="assets/images/logo/logo-white.png" alt="Logo">
                        <img class="logo-fold" src="assets/images/logo/logo-fold-white.png" alt="Logo">
                    </a>
                </div>
                <div class="nav-wrap">
                    <ul class="nav-left">
                        <li class="desktop-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
                                <i class="anticon anticon-search"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <!--NOTIFICAÇÕES-->
                        <li class="dropdown dropdown-animated scale-left">
                            <a href="javascript:void(0);" data-toggle="dropdown">
                                <i class="anticon anticon-bell notification-badge"></i>
                            </a>
                            <div class="dropdown-menu pop-notification">
                                <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                                    <p class="text-dark font-weight-semibold m-b-0">
                                        <i class="anticon anticon-bell"></i>
                                        <span class="m-l-10">Notificação</span>
                                    </p>
                                    <a class="btn-sm btn-default btn" href="javascript:void(0);">
                                        <small>Ver Mais</small>
                                    </a>
                                </div>
                                <div class="relative">
                                    <div class="overflow-y-auto relative scrollable" style="max-height: 300px">
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-blue avatar-icon">
                                                    <i class="anticon anticon-mail"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">You received a new message</p>
                                                    <p class="m-b-0"><small>8 min ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-cyan avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">New user registered</p>
                                                    <p class="m-b-0"><small>7 hours ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-red avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">System Alert</p>
                                                    <p class="m-b-0"><small>8 hours ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 ">
                                            <div class="d-flex">
                                                <div class="avatar avatar-gold avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">You have a new update</p>
                                                    <p class="m-b-0"><small>2 days ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--PROFILE SETTINGS DROPDOWN-->
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-15 m-r-10">
                                    <?php
                                    if ($_SESSION['FOTO'] == '') {
                                        echo '
                                        <div class="avatar avatar-icon avatar-blue">
                                            <i class="anticon anticon-user"></i>
                                        </div>
                                        ';
                                    } else {
                                        echo '<img src="assets/images/avatars/' . $_SESSION['FOTO'] . '" alt="Avatar" class="avatar-img rounded-circle">';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="p-b-8 p-t-10 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="media m-v-5 align-items-center">

                                        <?php
                                        if ($_SESSION['FOTO'] == '') {
                                            echo '
                                        <div class="avatar avatar-icon avatar-blue avatar-lg">
                                            <i class="anticon anticon-user"></i>
                                        </div>
                                        ';
                                        } else {
                                            echo '
                                                <div class="avatar avatar-image avatar-lg">
                                                <img src="assets/images/avatars/' . $_SESSION['FOTO'] . '" alt="Avatar" class="avatar-img rounded-circle">
                                                </div>
                                                ';
                                        }
                                        ?>

                                        <div class="media-body m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold">
                                                <?= explode(' ',  $_SESSION['USUARIO'])[0]; ?>
                                            </p>
                                            <p class="text-gray" style="font-size:.8rem;">
                                                <?php
                                                switch ($_SESSION['NIVEL']) {
                                                    case '0':
                                                        echo 'Master';
                                                        break;
                                                    case '1':
                                                        echo 'Administrador';
                                                        break;
                                                    case '2':
                                                        echo 'Recepcionista';
                                                        break;
                                                    case '3':
                                                        echo 'Atendente';
                                                        break;
                                                    case '4':
                                                        echo 'Cliente';
                                                        break;
                                                    default:
                                                        echo '';
                                                        break;
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <a href="?page=profile" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                            <span class="m-l-10">Meu Perfil</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <!-- <a href="?page=setting" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-lock"></i>
                                            <span class="m-l-10">Configuração da Conta</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a> -->
                                <!-- <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-project"></i>
                                            <span class="m-l-10">Projetos</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a> -->
                                <a href="<?= $_SERVER['PHP_SELF'] . '?action=logout' ?>" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 text-danger anticon-logout"></i>
                                            <span class="m-l-10">Logout</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <!-- <li>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">
                                <i class="anticon anticon-appstore"></i>
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>
            <!-- Header END -->

            <!-- Side Nav START -->
            <div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item  ">
                            <a class="" href="index.php">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>

                                <span class="title <?= !isset($_GET['page']) ? 'text-secondary' : ''; ?>">Dashboard</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a class="" href="?page=customers">
                                <span class="icon-holder">
                                    <i class="anticon anticon-team"></i>
                                </span>
                                <span class="title <?= isset($_GET['page']) && $_GET['page'] == 'customers'  ? 'text-secondary' : ''; ?>">Clientes</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a class="" href="?page=projects">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title <?= isset($_GET['page']) && ($_GET['page'] == 'projects' || $_GET['page'] == 'projectcustomer') ? 'text-secondary' : ''; ?>">Projetos</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item dropdown <?= isset($_GET['page']) && $_GET['page'] == 'users' ? 'open' : ''; ?>">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-setting"></i>
                                </span>
                                <span class="title">Configurações</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="?page=users" class="<?= isset($_GET['page']) && $_GET['page'] == 'users' ? 'text-secondary' : ''; ?>">Usuários</a>
                                </li>
                                <li>
                                    <a href="?page=typesProjects">Tipos de Projetos</a>
                                </li>
                                <li>
                                    <a href="">Logs do Sistema</a>
                                </li>

                            </ul>
                        </li>

                        <!--menus-->
                        <!--
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Apps</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="app-chat.html">Chat</a>
                                </li>
                                <li>
                                    <a href="app-file-manager.html">File Manager</a>
                                </li>
                                <li>
                                    <a href="app-mail.html">Mail</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="javascript:void(0);">
                                        <span>Projects</span>
                                        <span class="arrow">
                                            <i class="arrow-icon"></i>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="app-project-list.html">Project List</a>
                                        </li>
                                        <li>
                                            <a href="app-project-details.html">Project Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="javascript:void(0);">
                                        <span>E-commerce</span>
                                        <span class="arrow">
                                            <i class="arrow-icon"></i>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="app-e-commerce-order-list.html">Orders List</a>
                                        </li>
                                        <li>
                                            <a href="app-e-commerce-products.html">Products</a>
                                        </li>
                                        <li>
                                            <a href="app-e-commerce-products-list.html">Products List</a>
                                        </li>
                                        <li>
                                            <a href="app-e-commerce-products-edit.html">Products Edit</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-build"></i>
                                </span>
                                <span class="title">UI Elements</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="avatar.html">Avatar</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alert</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badge</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="cards.html">Cards</a>
                                </li>
                                <li>
                                    <a href="icons.html">Icons</a>
                                </li>
                                <li>
                                    <a href="lists.html">Lists</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-hdd"></i>
                                </span>
                                <span class="title">Components</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="accordion.html">Accordion</a>
                                </li>
                                <li>
                                    <a href="carousel.html">Carousel</a>
                                </li>
                                <li>
                                    <a href="dropdown.html">Dropdown</a>
                                </li>
                                <li>
                                    <a href="modals.html">Modals</a>
                                </li>
                                <li>
                                    <a href="toasts.html">Toasts</a>
                                </li>
                                <li>
                                    <a href="popover.html">Popover</a>
                                </li>
                                <li>
                                    <a href="slider-progress.html">Slider & Progress</a>
                                </li>
                                <li>
                                    <a href="tabs.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="tooltips.html">Tooltips</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-form"></i>
                                </span>
                                <span class="title">Forms</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="form-elements.html">Form Elements</a>
                                </li>
                                <li>
                                    <a href="form-layouts.html">Form Layouts</a>
                                </li>
                                <li>
                                    <a href="form-validation.html">Form Validation</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-table"></i>
                                </span>
                                <span class="title">Tables</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="basic-table.html">Basic Table</a>
                                </li>
                                <li>
                                    <a href="data-table.html">Data Table</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-pie-chart"></i>
                                </span>
                                <span class="title">Charts</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="chartist.html">Chartist</a>
                                </li>
                                <li>
                                    <a href="chartjs.html">ChartJs</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-file"></i>
                                </span>
                                <span class="title">Pages</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="profile.html">Profile</a>
                                </li>
                                <li>
                                    <a href="invoice.html">Invoice</a>
                                </li>
                                <li>
                                    <a href="members.html">Members</a>
                                </li>
                                <li>
                                    <a href="pricing.html">Pricing</a>
                                </li>
                                <li>
                                    <a href="setting.html">Setting</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="javascript:void(0);">
                                        <span>Blog</span>
                                        <span class="arrow">
                                            <i class="arrow-icon"></i>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="blog-grid.html">Blog Grid</a>
                                        </li>
                                        <li>
                                            <a href="blog-list.html">Blog List</a>
                                        </li>
                                        <li>
                                            <a href="blog-post.html">Blog Post</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-lock"></i>
                                </span>
                                <span class="title">Authentication</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="login-1.html">Login 1</a>
                                </li>
                                <li>
                                    <a href="login-2.html">Login 2</a>
                                </li>
                                <li>
                                    <a href="login-3.html">Login 3</a>
                                </li>
                                <li>
                                    <a href="sign-up-1.html">Sign Up 1</a>
                                </li>
                                <li>
                                    <a href="sign-up-2.html">Sign Up 2</a>
                                </li>
                                <li>
                                    <a href="sign-up-3.html">Sign Up 3</a>
                                </li>
                                <li>
                                    <a href="error-1.html">Error 1</a>
                                </li>
                                <li>
                                    <a href="error-2.html">Error 2</a>
                                </li>
                            </ul>
                        </li>-->
                    </ul>
                </div>
            </div>
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">
                <?php
                require_once './contents.php';
                ?>

                <!-- Footer START -->
                <footer class="footer">
                    <div class="footer-content">
                        <p class="m-b-0">Copyright ©
                            <?php
                            $ano = 2021;
                            if ($ano == date('Y')) {
                                echo $ano;
                            } else {
                                echo $ano . ' - ' . date('Y');
                            }
                            ?>
                            <a href="https://caririinovacao.com.br/" target="_blank" class="text-warning"> Cariri Inovação</a>
                            . Todos os direitos reservados.
                        </p>
                        <span>
                            <a href="" class="text-gray m-r-15">Termos e Condições</a>
                            <a href="" class="text-gray">Política de Privacidade</a>
                        </span>
                    </div>
                </footer>
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->

            <!-- Search Start-->
            <div class="modal modal-left fade search" id="search-drawer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Search</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="anticon anticon-close"></i>
                            </button>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="input-affix">
                                <i class="prefix-icon anticon anticon-search"></i>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Files</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-cyan avatar-icon">
                                        <i class="anticon anticon-file-excel"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Quater Report.exl</a>
                                        <p class="m-b-0 text-muted font-size-13">by Finance</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-blue avatar-icon">
                                        <i class="anticon anticon-file-word"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Documentaion.docx</a>
                                        <p class="m-b-0 text-muted font-size-13">by Developers</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-purple avatar-icon">
                                        <i class="anticon anticon-file-text"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Recipe.txt</a>
                                        <p class="m-b-0 text-muted font-size-13">by The Chef</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-red avatar-icon">
                                        <i class="anticon anticon-file-pdf"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Project Requirement.pdf</a>
                                        <p class="m-b-0 text-muted font-size-13">by Project Manager</p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Members</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                                        <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                                        <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Marshall Nichols</a>
                                        <p class="m-b-0 text-muted font-size-13">Data Analyst</p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">News</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/others/img-1.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">5 Best Handwriting Fonts</a>
                                        <p class="m-b-0 text-muted font-size-13">
                                            <i class="anticon anticon-clock-circle"></i>
                                            <span class="m-l-5">25 Nov 2018</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End-->

            <!-- Quick View START -->
            <div class="modal modal-right fade quick-view" id="quick-view">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Theme Config</h5>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="m-b-30">
                                <h5 class="m-b-0">Header Color</h5>
                                <p>Config header background color</p>
                                <div class="theme-configurator d-flex m-t-10">
                                    <div class="radio">
                                        <input id="header-default" name="header-theme" type="radio" checked value="default">
                                        <label for="header-default"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-primary" name="header-theme" type="radio" value="primary">
                                        <label for="header-primary"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-success" name="header-theme" type="radio" value="success">
                                        <label for="header-success"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-secondary" name="header-theme" type="radio" value="secondary">
                                        <label for="header-secondary"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-danger" name="header-theme" type="radio" value="danger">
                                        <label for="header-danger"></label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h5 class="m-b-0">Side Nav Dark</h5>
                                <p>Change Side Nav to dark</p>
                                <div class="switch d-inline">
                                    <input type="checkbox" name="side-nav-theme-toogle" id="side-nav-theme-toogle">
                                    <label for="side-nav-theme-toogle"></label>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h5 class="m-b-0">Folded Menu</h5>
                                <p>Toggle Folded Menu</p>
                                <div class="switch d-inline">
                                    <input type="checkbox" name="side-nav-fold-toogle" id="side-nav-fold-toogle">
                                    <label for="side-nav-fold-toogle"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Quick View END -->
        </div>
    </div>


    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/jquery-validation/jquery.validate.min.js"></script>

    <script src="assets/vendors/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendors/datatables/dataTables.bootstrap.min.js"></script>

    <script src="assets/js/pages/dashboard-project.js"></script>
    <script src="assets/js/pages/dashboard-crm.js"></script>
    <script src="assets/js/pages/project-list.js"></script>
    <script src="assets/js/pages/datatables.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/vendors/select2/select2.min.js"></script>
    <script src="assets/vendors/quill/quill.min.js"></script>

    <script src="assets/js/jquery.mask.min.js"></script>


    <!-- Core JS -->
    <script src="./assets/js/app.min.js"></script>
    <script src="assets/js/util.js"></script>

</body>

</html>
