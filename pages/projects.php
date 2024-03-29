                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header no-gutters">
                        <div class="row align-items-md-center">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="input-affix m-v-10">
                                            <i class="prefix-icon anticon anticon-search opacity-04"></i>
                                            <input type="text" class="form-control" placeholder="Search Project">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right m-v-10">
                                    <div class="btn-group m-r-10">
                                        <button id="list-view-btn" type="button" class="btn btn-default btn-icon" data-toggle="tooltip" data-placement="bottom" title="Ver Lista">
                                            <i class="anticon anticon-ordered-list"></i>
                                        </button>
                                        <button id="card-view-btn" type="button" class="btn btn-default btn-icon active" data-toggle="tooltip" data-placement="bottom" title="Ver Cartões">
                                            <i class="anticon anticon-appstore"></i>
                                        </button>
                                    </div>
                                    <!-- <button class="btn btn-tone btn-primary" data-toggle="modal" data-target="#create-new-project" >
                                        <i class="anticon anticon-appstore"></i>
                                        <span class="m-l-5">Novo Projeto</span>
                                    </button> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    if (isset($_POST['action']) && $_POST['action'] == 'create') {
                        echo $_POST['decription'];
                    }
                    ?>

                    <div class="container-fluid">
                        <div id="card-view">
                            <div class="row">
                                <?php
                                $sql = "SELECT * FROM projects";
                                $result = $connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $project) {
                                ?>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="media">
                                                        <div class="avatar avatar-image rounded">
                                                            <?= $project['id_type_project'] == 1 ? '<img src="assets/images/logo/logo-fold.png" alt="">' : '<i class="anticon anticon-appstore text-primary"></i>' ?>
                                                            <!-- <img src="assets/images/logo/logo-fold.png" alt=""> -->
                                                        </div>
                                                        <div class="m-l-10">
                                                            <h5 class="m-b-0"><?= $project['title'] ?></h5>
                                                            <span class="text-muted font-size-11"><?= $project['uuid'] ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown dropdown-animated scale-left">
                                                        <a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown">
                                                            <i class="anticon anticon-ellipsis"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a href="?page=projectDetails&uuid=<?= $project['uuid'] ?>" class="dropdown-item" type="button">
                                                                <i class="anticon anticon-eye"></i>
                                                                <span class="m-l-10">Detalhes</span>
                                                            </a>
                                                            <button class="dropdown-item" type="button">
                                                                <i class="anticon anticon-edit"></i>
                                                                <span class="m-l-10">Editar</span>
                                                            </button>
                                                            <button class="dropdown-item" type="button">
                                                                <i class="anticon anticon-delete"></i>
                                                                <span class="m-l-10">Delete</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="m-t-25 text-justify" style="min-height: 160px;">
                                                    <?= lmWord($project['decription'], 80) ?>
                                                </p>
                                                <div class="m-t-30">
                                                    <?php
                                                    $progress = rand(1, 100);
                                                    ?>
                                                    <div class="d-flex justify-content-between">
                                                        <span class="font-weight-semibold">O Projeto esta em:</span>
                                                        <span class="font-weight-semibold">
                                                            <?php
                                                            echo  $project['states'] == 'finished'
                                                                ? '100%'
                                                                :  $progress . "%"
                                                            ?>
                                                        </span>
                                                    </div>

                                                    <?php
                                                    switch ($project['states']) {
                                                        case 'create':
                                                            $progressBarColor = 'info ';
                                                            $Status = 'Criado';
                                                            break;
                                                        case 'progress':
                                                            $progressBarColor = 'secondary ';
                                                            $Status = 'Em Andamento';
                                                            break;
                                                        case 'suspended':
                                                            $progressBarColor = 'warning ';
                                                            $Status = 'Suspenso';
                                                            break;
                                                        case 'cancel':
                                                            $progressBarColor = 'danger ';
                                                            $Status = 'Canselado';
                                                            break;
                                                        case 'finished':
                                                            $progressBarColor = 'success ';
                                                            $Status = 'Concluido';
                                                            break;
                                                    };
                                                    ?>

                                                    <div class="progress progress-sm m-t-10">
                                                        <?php
                                                        echo  $project['states'] == 'finished'
                                                            ? "<div class=\"progress-bar bg-{$progressBarColor}\" role=\"progressbar\" style=\"width: 100%\"></div>"
                                                            : "<div class=\"progress-bar bg-{$progressBarColor}\" role=\"progressbar\" style=\"width: {$progress}%\"></div>"
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="m-t-20">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <?php
                                                            switch ($project['states']) {
                                                                case 'create':
                                                                    $stateColor = 'cyan';
                                                                    $Status = 'Criado';
                                                                    break;
                                                                case 'progress':
                                                                    $stateColor = 'cyan';
                                                                    $Status = 'Em Andamento';
                                                                    break;
                                                                case 'suspended':
                                                                    $stateColor = 'gold';
                                                                    $Status = 'Suspenso';
                                                                    break;
                                                                case 'cancel':
                                                                    $stateColor = 'red';
                                                                    $Status = 'Canselado';
                                                                    break;
                                                                case 'finished':
                                                                    $stateColor = 'green';
                                                                    $Status = 'Concluido';
                                                                    break;
                                                            };
                                                            ?>

                                                            <span class="badge badge-pill badge-<?= $stateColor ?>">
                                                                <?= $Status; ?>
                                                            </span>

                                                        </div>
                                                        <div>
                                                            <a class="m-r-5" href="javascript:void(0);" data-toggle="tooltip" title="Pamela Wanda">
                                                                <div class="avatar avatar-image avatar-sm">
                                                                    <img src="assets/images/avatars/thumb-7.jpg" alt="">
                                                                </div>
                                                            </a>
                                                            <a class="m-r-5" href="javascript:void(0);" data-toggle="tooltip" title="Darryl Day">
                                                                <div class="avatar avatar-image avatar-sm">
                                                                    <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="card d-none" id="list-view">
                            <div class="card-body">
                                <div class="table">
                                    <table class="table table-hover table-sm">
                                        <thead>
                                            <tr>
                                                <th>Titilo de Projeto</th>
                                                <th>UUID</th>
                                                <th>Members</th>
                                                <th>Progress</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM projects";
                                            $result = $connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($result as $project) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <div class="media align-items-center">
                                                            <div class="avatar avatar-image rounded">
                                                                <?= $project['id_type_project'] == 1 ? '<img src="assets/images/logo/logo-fold.png" alt="">' : '<i class="anticon anticon-appstore text-primary"></i>' ?>
                                                                <!-- <img src="assets/images/others/thumb-1.jpg" alt=""> -->
                                                            </div>
                                                            <div class="m-l-10">
                                                                <h5 class="m-b-0"><?= $project['title'] ?></h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span><?= $project['uuid'] ?></span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <a class="m-r-5" href="javascript:void(0);" data-toggle="tooltip" title="Pamela Wanda">
                                                                    <div class="avatar avatar-image avatar-sm">
                                                                        <img src="assets/images/avatars/thumb-7.jpg" alt="">
                                                                    </div>
                                                                </a>
                                                                <a class="m-r-5" href="javascript:void(0);" data-toggle="tooltip" title="Darryl Day">
                                                                    <div class="avatar avatar-image avatar-sm">
                                                                        <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="progress progress-sm w-100 m-b-0">
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                                            </div>
                                                            <div class="m-l-10">
                                                                <i class="anticon anticon-check-o text-success"></i>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="dropdown dropdown-animated scale-left">
                                                            <a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown">
                                                                <i class="anticon anticon-ellipsis"></i>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                <a href="?page=projectDetails" class="dropdown-item" type="button">
                                                                    <i class="anticon anticon-eye"></i>
                                                                    <span class="m-l-10">Detalhar</span>
                                                                </a>
                                                                <button class="dropdown-item" type="button">
                                                                    <i class="anticon anticon-edit"></i>
                                                                    <span class="m-l-10">Editar</span>
                                                                </button>
                                                                <button class="dropdown-item" type="button">
                                                                    <i class="anticon anticon-delete"></i>
                                                                    <span class="m-l-10">Delete</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Content Wrapper END -->

                <!-- Modal -->
                <div class="modal modal-right fade" id="create-new-project">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="side-modal-wrapper">
                                <div class="vertical-align">
                                    <div class="table-cell">
                                        <div class="modal-body" style="background-color: #fff;">
                                            <h3 class="modal-title text-primary">
                                                <i class="anticon anticon-appstore"></i>
                                                Novo Projeto
                                                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                                    <h1 aria-hidden="true" class="modal-title text-danger">&times;</h1>
                                                </button>
                                            </h3>
                                            <span class="text-muted">
                                                # <?= $uuid = uuidv4() ?>
                                            </span>
                                            <hr />
                                            <section class="container">
                                                <form action="" method="post" enctype="multipart/form">
                                                    <input type="hidden" name="uuid" value="<?= $uuid ?>">
                                                    <div class="form-group">
                                                        <label for="title">Titulo do Projeto</label>
                                                        <input type="text" class="form-control" id="title" placeholder="Nome do Projeto">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="decription">Descrição do Projeto</label>
                                                        <textarea class=" form-control" name="decription" rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="states">Estado do Projeto</label></br>
                                                        <select class="select2">
                                                            <option value="" selected disabled>Selecione ...</option>
                                                            <option value="create">Criando</option>
                                                            <option value="in progress">Em Andamento</option>
                                                            <option value="suspended">Suspenso</option>
                                                            <option value="cancel">Canselado</option>
                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="project-members">Membros do Projeto</label>
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <a class="m-r-5" href="javascript:void(0);" data-toggle="tooltip" title="Pamela Wanda">
                                                                    <div class="avatar avatar-image avatar-sm">
                                                                        <img src="assets/images/avatars/thumb-7.jpg" alt="">
                                                                    </div>
                                                                </a>
                                                                <a class="m-r-5" href="javascript:void(0);" data-toggle="tooltip" title="Darryl Day">
                                                                    <div class="avatar avatar-image avatar-sm">
                                                                        <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status do Projeto</label>
                                                        <div class="d-flex align-items-center">
                                                            <div class="progress progress-sm w-100 m-b-0">
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%"></div>
                                                            </div>
                                                            <div class="m-l-10">
                                                                <i class="anticon anticon-check-o text-success"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tags do Projeto</label>
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <a class="m-r-5" href="javascript:void(0);" data-toggle="tooltip" title="Pamela Wanda">
                                                                    <div class="avatar avatar-image avatar-sm">
                                                                        <img src="assets/images/avatars/thumb-7.jpg" alt="">
                                                                    </div>
                                                                </a>
                                                                <a class="m-r-5" href="javascript:void(0);" data-toggle="tooltip" title="Darryl Day">
                                                                    <div class="avatar avatar-image avatar-sm">
                                                                        <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row ">
                                                        <input type="hidden" name="action" value="create">
                                                        <div class="form-group ">
                                                            <button type="submit" class="btn btn-tone btn-success mr-5">
                                                                <i class="anticon anticon-save"></i>
                                                                Criar Projeto
                                                            </button>
                                                            <button type="reset" class="btn btn-tone btn-danger" style="position: absolute; right: 2.5rem;">
                                                                <i class="anticon anticon-delete"></i>
                                                                Limpar Formulário
                                                            </button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('.select2').select2();
                    });

                    function decription(value) {
                        var described = document.getElementById('editor').value;
                        alert(described);

                    }
                </script>
