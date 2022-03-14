                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Clientes</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="/" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>

                                <span class="breadcrumb-item active">Clientes</span>
                            </nav>
                        </div>
                    </div>

                    <?php
                    if (isset($_POST['action']) && $_POST['action'] == 'create') {

                        $name = trim($_POST['name']);
                        $personal_document = trim(tiraMascara($_POST['personal_document']));
                        $personal_document > 11 ? $type_person = 'pj' : $type_person = 'pf';

                        $street = trim($_POST['street']);
                        $number_address = trim($_POST['number_address']);
                        @$complement_address = trim($_POST['complement_address']);
                        $neighborhood = trim($_POST['neighborhood']);
                        $city = trim($_POST['city']);
                        $state = trim($_POST['state']);
                        $zip_code = trim($_POST['zip_code']);
                        $phone_number = trim($_POST['phone_number']);
                        $cell_phone_number = trim($_POST['cell_phone_number']);
                        @$is_whatsapp = $_POST['is_whatsapp'] == 'on' ? 1 : 0;
                        $email = trim($_POST['email']);

                        $level = 4;

                        $sql = "INSERT INTO person (name, personal_document, type_person, street, number_address, complement_address, neighborhood, city, state, zip_code, phone_number, cell_phone_number, is_whatsapp, email, level)
                    VALUES ('$name', '$personal_document', '$type_person', '$street', '$number_address', '$complement_address', '$neighborhood', '$city', '$state', '$zip_code', '$phone_number', '$cell_phone_number', '$is_whatsapp', '$email','$level')";

                        if ($connection->query($sql)) {
                            $id_person = $connection->lastInsertId();
                            $user_level = 4;

                            $cpf = mascaraCPF(str_pad($_POST['personal_document'], 11, "0", STR_PAD_LEFT));
                            $cpf1 = substr($cpf, 0, 3);
                            $cpf2 = substr($cpf, -2);
                            $password = md5($cpf1 . $cpf2);

                            $sql2 = "INSERT INTO users (id_person, user_level, password)
                        VALUES ('$id_person', '$user_level', '$password')";

                            $connection->query($sql2);

                            echo "<div class='alert alert-success'>Cliente cadastrado com sucesso!</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Erro ao cadastrar cliente!</div>";
                        }
                        //     sweetalert('Sucesso!', 'Usuário cadastrado com sucesso!', 'success', '2000');
                        // } else {
                        //     sweetalert('Erro!', 'Não foi possível cadastrar o usuário!', 'error', '2000');
                        // }
                    }
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0"></h5>
                                <div>
                                    <button data-toggle="modal" data-target="#newCustomer" class="btn btn-tone btn-primary">
                                        <i class="anticon anticon-user-add"></i>
                                        Novo Usuário
                                    </button>
                                </div>
                            </div>

                            <div class="m-t-25">
                                <table id="data-table" class="table table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th class="col-4">Cliente</th>
                                            <th class="col-2">CPF</th>
                                            <th class="col-3">Contato</th>
                                            <th class="col-2">Situação</th>
                                            <th class="col-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql = "SELECT * FROM users
                                                INNER JOIN person
                                                ON users.id_person = person.id
                                                WHERE person.level >=0
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
                                                <th class="font-weight-light align-middle">
                                                    <ul class="my-1">
                                                        <li class="d-inline-block mr-2">
                                                            <i class="anticon anticon-phone text-primary font-size-20"></i>
                                                        </li>
                                                        <li class="d-inline-block">
                                                            <a href="tel:<?= tiraMascara($user['phone_number']) ?>" class="text-gray">
                                                                <?= $user['phone_number'] ?>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <ul class="mb-1">
                                                        <li class="d-inline-block mr-2">
                                                            <i class="anticon anticon-mobile text-primary font-size-20"></i>
                                                        </li>
                                                        <li class="d-inline-block">
                                                            <a href="tel:<?= tiraMascara($user['cell_phone_number']) ?>" class="text-gray">
                                                                <?= $user['cell_phone_number']; ?>
                                                            </a>

                                                        </li>
                                                        <li class="d-inline-block">
                                                            <?php
                                                            if ($user['is_whatsapp'] == 1) {
                                                            ?>
                                                                <a href="https://api.whatsapp.com/send?phone=55<?= tiraMascara($user['cell_phone_number']) ?>&text=Ol%C3%A1%20<?= urlencode($user['name']); ?>%2C%20temos%20novidades%20sobre%20seu%20projeto.%20%20" target="_blank" title="Contato via WhatsApp">
                                                                    &nbsp;<i class="fab fa-whatsapp text-success font-size-18"> </i>
                                                                </a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </li>
                                                    </ul>
                                                    <ul class="mb-1">
                                                        <li class="d-inline-block mr-2">
                                                            <i class="anticon anticon-mail text-primary font-size-20"></i>
                                                        </li>
                                                        <li class="d-inline-block">
                                                            <a href="mailto:<?= $user['email'] ?>" class="text-gray">
                                                                <?= $user['email']; ?>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </th>
                                                <th class="font-weight-light">
                                                    <?= $user['status'] == 1 ? 'Ativo' : 'Inativo'; ?>
                                                </th>
                                                <td>
                                                    <button class="btn btn-icon btn-sm btn-tone btn-secondary" title="Criar Projeto">
                                                        <i class="anticon anticon-appstore  font-size-20"></i>
                                                    </button>
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
                                                                <i class="anticon anticon-appstore"></i>
                                                                <span class="m-l-10">Criar Projetos</span>
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

                <!-- Modal create customers -->
                <div class="modal modal-right fade " id="newCustomer">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="side-modal-wrapper">
                                <div class="vertical-align">
                                    <div class="table-cell">
                                        <div class="modal-body" style="background-color: #fff;">
                                            <h3 class="modal-title text-primary">
                                                <i class="anticon anticon-user-add"></i>
                                                Novo Cliente
                                                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                                    <h1 aria-hidden="true" class="modal-title text-danger">&times;</h1>
                                                </button>
                                            </h3>
                                            <hr />
                                            <section class="container">
                                                <form action="" method="post" enctype="multipart/form">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="name">Nome</label>
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Cliente" required>
                                                        </div>
                                                        <div class="form-group col-md-8">
                                                            <label for="email">E-mail</label>
                                                            <input type="mail" class="form-control" id="email" name="email" placeholder="E-mail do Cliente" required>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="phone_number">Telefone</label>
                                                            <input type="text" class="form-control js_fone" id="phone_number" maxlength="15" name="phone_number" placeholder="Telefone do Cliente" required>
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label for="cell_phone_number">Celular</label>
                                                            <input type="text" class="form-control js_fone" id="cell_phone_number" name="cell_phone_number" maxlength="16" placeholder="Celular do Cliente" required>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <div class="checkbox me m-t-40">
                                                                <input id="checkbox1" name="is_whatsapp" type="checkbox">
                                                                <label for="checkbox1" class="checkbox" style="font-size: .8rem;">
                                                                    WhatsApp?
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="personal_document">CPF</label>
                                                            <input type="text" class="form-control js_cpf" id="personal_document" name="personal_document" placeholder="CPF do Cliente" required>
                                                        </div>
                                                        <div class="form-group col-3">
                                                            <label class="font-weight-semibold" for="zip_code">CEP:</label>
                                                            <input type="text" class="form-control js_cep" onblur="pesquisacep(this.value)" maxlength="9" name="zip_code" id="zip_code" placeholder="00000-000" required>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label class="font-weight-semibold" for="street">Logradouro:</label>
                                                            <input type="text" class="form-control " id="street" name="street" placeholder="Rua, Avenida, Travessa" required>
                                                        </div>
                                                        <div class="form-group col-3">
                                                            <label class="font-weight-semibold" for="number_address">Número:</label>
                                                            <input type="number" class="form-control " id="number_address" name="number_address" placeholder="0000" required>
                                                        </div>
                                                        <div class="form-group col-5">
                                                            <label class="font-weight-semibold" for="neighborhood">Bairro:</label>
                                                            <input type="text" class="form-control " id="neighborhood" name="neighborhood" placeholder="Bairro" required>
                                                        </div>
                                                        <div class="form-group col-5">
                                                            <label class="font-weight-semibold" for="city">Cidade:</label>
                                                            <input type="text" class="form-control " id="city" name="city" placeholder="Cidade" required>
                                                        </div>
                                                        <div class="form-group col-2">
                                                            <label class="font-weight-semibold" for="state">Estado:</label>
                                                            <input type="text" class="form-control " id="state" name="state" placeholder="UF" required>
                                                        </div>
                                                        <div class="form-row ">
                                                            <input type="hidden" name="action" value="create">
                                                            <div class="form-group ">
                                                                <button type="submit" class="btn btn-tone btn-success mr-5">
                                                                    <i class="anticon anticon-save"></i>
                                                                    Atualizar dados
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
