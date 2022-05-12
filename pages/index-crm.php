<!-- Content Wrapper START -->
<div class="main-content">
    <div class="page-header no-gutters">
        <div class="d-md-flex align-items-md-center justify-content-between">
            <div class="media m-v-10 align-items-center">

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

                <div class="media-body m-l-15">
                    <h4 class="m-b-0">Bem-Vindo,
                        <?= explode(' ',  $_SESSION['USUARIO'])[0]; ?>
                    </h4>
                    <span class="text-gray">
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
                    </span>
                </div>
            </div>
            <div class="d-md-flex align-items-center d-none">
                <div class="media align-items-center m-r-40 m-v-5">
                    <!--<div class="font-size-27">
                                        <i class="text-primary anticon anticon-profile"></i>
                                    </div>

                                   <div class="d-flex align-items-center m-l-10">
                                        <h2 class="m-b-0 m-r-5">78</h2>
                                        <span class="text-gray">Tarefas</span>
                                    </div>-->
                </div>
                <div class="media align-items-center m-r-40 m-v-5">
                    <div class="font-size-27">
                        <i class="text-success  anticon anticon-appstore"></i>
                    </div>
                    <div class="d-flex align-items-center m-l-10">
                        <h2 class="m-b-0 m-r-5">
                            <?php
                            $sql = "SELECT * FROM projects";
                            $result = $connection->query($sql)->rowCount();
                            echo $result;
                            ?>
                        </h2>
                        <span class="text-gray">Projetos</span>
                    </div>
                </div>
                <div class="media align-items-center m-v-5">
                    <div class="font-size-27">
                        <i class="text-danger anticon anticon-team"></i>
                    </div>
                    <div class="d-flex align-items-center m-l-10">
                        <h2 class="m-b-0 m-r-5">
                            <?php
                            $sql = "SELECT * FROM users WHERE user_level ='4'";
                            $result = $connection->query($sql)->rowCount();
                            echo $result;
                            ?>
                        </h2>
                        <span class="text-gray">Clientes</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="m-b-0">Receita liquida</p>
                            <h2 class="m-b-0">
                                <span>R$ <?= formatMoedaBr(14966) ?></span>
                            </h2>
                        </div>
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                            <i class="anticon anticon-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="m-b-0">Taxa de rejeição</p>
                            <h2 class="m-b-0">
                                <span>16.80%</span>
                            </h2>
                        </div>
                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                            <i class="anticon anticon-bar-chart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="m-b-0">Pedidos</p>
                            <h2 class="m-b-0">
                                <span>3057</span>
                            </h2>
                        </div>
                        <div class="avatar avatar-icon avatar-lg avatar-red">
                            <i class="anticon anticon-profile"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="m-b-0">Despesas Totais</p>
                            <h2 class="m-b-0">
                                <span>R$ <?= formatMoedaBr(6138.9) ?></span>
                            </h2>
                        </div>
                        <div class="avatar avatar-icon avatar-lg avatar-gold">
                            <i class="anticon anticon-bar-chart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button data-toggle="modal" data-target="#side-modal-right" class="btn btn-primary">Side Modal Right</button>

    <!-- Modal -->
    <div class="modal modal-right fade " id="side-modal-right">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="side-modal-wrapper">
                    <div class="vertical-align">
                        <div class="table-cell">
                            <div class="modal-body" style="background-color: #fff;">

                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima obcaecati inventore, dicta recusandae suscipit quia dignissimos error incidunt aliquam doloribus possimus quasi tempora iusto, quos doloremque aliquid maxime itaque architecto? </p>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima obcaecati inventore, dicta recusandae suscipit quia dignissimos error incidunt aliquam doloribus possimus quasi tempora iusto, quos doloremque aliquid maxime itaque architecto? </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Avaliação geral</h5>
                    </div>
                    <div class="d-flex align-items-center m-t-20">
                        <h1 class="m-b-0 m-r-10 font-weight-normal">4.5</h1>
                        <div class="star-rating m-t-15">
                            <input type="radio" id="star1-5" name="rating-1" value="5" checked disabled /><label for="star1-5" title="5 star"></label>
                            <input type="radio" id="star1-4" name="rating-1" value="4" disabled /><label for="star1-4" title="4 star"></label>
                            <input type="radio" id="star1-3" name="rating-1" value="3" disabled /><label for="star1-3" title="3 star"></label>
                            <input type="radio" id="star1-2" name="rating-1" value="2" disabled /><label for="star1-2" title="2 star"></label>
                            <input type="radio" id="star1-1" name="rating-1" value="1" disabled /><label for="star1-1" title="1 star"></label>
                        </div>
                    </div>
                    <p><span class="text-success font-weight-bold">+1.5</span> point from last month</p>
                    <div class="m-t-30" style="height: 150px">
                        <canvas class="chart" id="rating-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <h5>Total de Vendas</h5>
                        <div class="d-flex">
                            <div class="m-r-10">
                                <span class="badge badge-secondary badge-dot m-r-10"></span>
                                <span class="text-gray font-weight-semibold font-size-13">receita</span>
                            </div>
                            <div class="m-r-10">
                                <span class="badge badge-purple badge-dot m-r-10"></span>
                                <span class="text-gray font-weight-semibold font-size-13">Margem</span>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-50" style="height: 225px">
                        <canvas class="chart" id="sales-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Meta Mensal</h5>
                    </div>
                    <div class="d-flex align-items-center position-relative m-v-50" style="height:150px;">
                        <div class="w-100 position-absolute" style="height:150px; top:0;">
                            <canvas class="chart m-h-auto" id="porgress-chart"></canvas>
                        </div>
                        <h2 class="w-100 text-center text-large m-b-0 text-success font-weight-normal">R$ <?= formatMoedaBr(3531) ?></h2>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <span class="badge badge-success badge-dot m-r-10"></span>
                        <span><span class="font-weight-semibold">70%</span> do seu objetivo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Ultimas Vendas </h5>
                        <div>
                            <a href="javascript:void(0);" class="btn btn-sm btn-default">View All</a>
                        </div>
                    </div>
                    <div class="m-t-30">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>Data</th>
                                        <th>Vl Projeto</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-weight-light">20220218001</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-l-10 m-b-0 font-weight-light">Erin Gonzales</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="font-weight-light">18/02/2022</td>
                                        <td class="font-weight-light">R$ 18.454,90</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="badge badge-success badge-dot m-r-10"></span>
                                                <span class="font-weight-light">Aprovado</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown dropdown-animated scale-left">
                                                <a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown">
                                                    <i class="anticon anticon-ellipsis"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <button class="dropdown-item" type="button">
                                                        <i class="anticon anticon-eye"></i>
                                                        <span class="m-l-10">Visualizar</span>
                                                    </button>
                                                    <button class="dropdown-item" type="button">
                                                        <i class="anticon anticon-edit"></i>
                                                        <span class="m-l-10">Editar</span>
                                                    </button>
                                                    <a href="./pdfs/teste.php" class="dropdown-item" type="button" target="new">
                                                        <i class="anticon anticon-printer"></i>
                                                        <span class="m-l-10">Imprimir Proposta</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Wrapper END -->
