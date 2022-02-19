                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Usuários do Sistema</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="/" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                <a href="#" class="breadcrumb-item">Configurações</a>
                                <span class="breadcrumb-item active">Usuários</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0"></h5>
                                <div>
                                    <a href="" class="btn btn-tone btn-secondary">
                                        <i class="anticon anticon-user-add"></i>
                                        Novo Usuário
                                    </a>
                                </div>
                            </div>

                            <div class="m-t-25">
                                <table id="data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>Usuário</th>
                                            <th>CPF</th>
                                            <th>Nível de acesso</th>
                                            <th>Situação</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql = "SELECT * FROM users
                                                INNER JOIN person
                                                ON users.id_person = person.id
                                                ORDER BY person.name ASC";
                                        $result = $connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($result as $user) {
                                        ?>
                                            <tr class="font-weight-light">
                                                <td>
                                                    <div class="media align-items-center">
                                                        <?php
                                                        if ($user['avatar'] != '') { ?>
                                                            <div class="avatar avatar-image">
                                                                <img src="assets/images/avatars/<?= $user['avatar'] ?>" alt="">
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="avatar avatar-icon avatar-blue">
                                                                <i class="anticon anticon-user"></i>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="media-body m-l-15 font-weight-light">
                                                            <h5 class="mb-0 font-weight-light">
                                                                <?php echo $user['name']; ?>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <th class="font-weight-light">
                                                    <?= MascaraCPF(str_pad($user['personal_document'], 11, "0", STR_PAD_LEFT)); ?>
                                                </th>
                                                <th class="font-weight-light">
                                                    <?php
                                                    switch ($user['user_level']) {
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
                                                </th>
                                                <th class="font-weight-light">
                                                    <?= $user['status'] == 1 ? 'Ativo' : 'Inativo'; ?>
                                                </th>
                                                <td>
                                                    <div class="dropdown dropdown-animated scale-left">
                                                        <a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown">
                                                            <i class="anticon anticon-ellipsis"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button">
                                                                <i class="anticon anticon-edit"></i>
                                                                <span class="m-l-10">Editar</span>
                                                            </button>
                                                            <button class="dropdown-item" type="button">
                                                                <i class="fas fa-user-alt-slash"></i>
                                                                <span class="m-l-10">Inativar</span>
                                                            </button>
                                                            <button class="dropdown-item" type="button">
                                                                <i class="anticon anticon-key"></i>
                                                                <span class="m-l-10">Resentar Senha</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                    <!-- <tfoot>
                                        <tr>
                                            <<th>Usuário</th>
                                            <th>CPF</th>
                                            <th>Nível de acesso</th>
                                            <th>Situação</th>
                                            <th></th>
                                        </tr>
                                    </tfoot> -->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Wrapper END -->
