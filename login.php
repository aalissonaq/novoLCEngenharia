<?php
require_once './db/connection.php';
require_once './util/util.php';
require_once './util/outfunc.php';

$connection = novaConexao();
$sqlInitial = "SELECT * FROM identification";
$result = $connection->query($sqlInitial)->fetchAll(PDO::FETCH_ASSOC);
$information = $result[0];


if (isset($_POST['login']) && $_POST['login'] == 'entra') {

    $login['userName'] = strip_tags(trim(tiraMascara($_POST['userName'])));
    $login['password'] = strip_tags(trim(md5($_POST['password'])));

    if ($login['userName'] == '00000000000' && $login['password'] == md5('admin')) {
        session_start();

        $_SESSION['userName'] = 'Root';
        $_SESSION['released'] = true;
        header('Location: index.php');
    } else {
        sweetalert('Oops...', 'Usuário ou senha inválidos!', 'error', 2500);
    }
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
        <div class="container-fluid p-0 h-100">
            <div class="row no-gutters h-100 full-height">
                <div class="col-lg-4 d-none d-lg-flex bg" style="background-image:url('assets/images/others/login-1.jpg')">
                    <div class="d-flex h-100 p-h-40 p-v-15 flex-column justify-content-between">
                        <div>
                            <img src="assets/images/logo/logo-white.png" alt="<?= $information['fantasy_name'] ?>">
                        </div>
                        <div>
                            <h1 class="text-white m-b-20 font-weight-normal">
                                Seja bem-vindo a <br /> <?= $information['fantasy_name'] ?>
                            </h1>
                            <p class="text-white font-size-16 lh-2 w-80 opacity-08">
                                <?= $information['slogan']; ?>
                            </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-white">© <?= date('Y', time()); ?> <?= $information['fantasy_name']; ?></span>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-white text-link" href="">Legal</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-white text-link" href="">Privacy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 bg-white">
                    <div class="container h-100">
                        <div class="row no-gutters h-100 align-items-center">
                            <div class="col-md-8 col-lg-7 col-xl-6 mx-auto">
                                <h2>Login</h2>
                                <p class="m-b-30">Insira sua credencial para obter acesso</p>
                                <form method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="login" value="entra" />
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="userName">Usuário:</label>
                                        <div class="input-affix">
                                            <i class="prefix-icon anticon anticon-user"></i>
                                            <input type="text" name="userName" id="userName" class="form-control" id="userName" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="password">Senha:</label>
                                        <a class="float-right font-size-13 text-muted" href="">Esqueceu a senha?</a>
                                        <div class="input-affix m-b-10">
                                            <i class="prefix-icon anticon anticon-lock"></i>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="font-size-13 text-muted">
                                                <!-- Não tem conta?
                                                <a class="small" href=""> Cadastre-se</a> -->
                                            </span>
                                            <button class="btn btn-primary">
                                                <i class="anticon anticon-login m-r-10"></i>
                                                Entrar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
