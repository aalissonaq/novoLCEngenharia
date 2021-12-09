<?php
session_start();
!isset($_SESSION['released']) ? header('Location: login.php') : '';

require_once './db/connection.php';
require_once './util/util.php';

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

    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid">
            <div class="d-flex full-height p-v-20 flex-column justify-content-between">
                <div class="d-none d-md-flex p-h-40">
                    <img src="assets/images/logo/<?= $information['logo'] ?>" alt="">
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="p-v-30">
                                <h1 class="font-weight-semibold display-1 text-secondary lh-1-2"></h1>
                                <h2 class="font-weight-light font-size-30">Opa! Parece que você se perdeu</h2>
                                <p class="lead m-b-30">Não encontramos o que você estava procurando.</p>
                                <a href="index.php" class="btn btn-primary btn-tone">
                                    <i class="anticon anticon-double-left"></i>
                                    Volta ao Início
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 m-l-auto">
                            <img class="img-fluid" src="assets/images/others/error-1.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex p-h-40 justify-content-between">
                    <span class="">©
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
                    </span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href=""></a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href=""></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>
