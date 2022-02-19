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

            $street = trim($_POST['street']);
            $number_address = trim($_POST['number_address']);
            $complement_address = trim($_POST['complement_address']);
            $neighborhood = trim($_POST['neighborhood']);
            $city = trim($_POST['city']);
            $state = trim($_POST['state']);
            $zip_code = trim($_POST['zip_code']);
            $phone_number = trim($_POST['phone_number']);
            $cell_phone_number = trim($_POST['cell_phone_number']);
            @$is_whatsapp = $_POST['is_whatsapp'] == 'on' ? 1 : 0;
            $email = trim($_POST['email']);

            $sql = "INSERT INTO person (name, personal_document, street, number_address, complement_address, neighborhood, city, state, zip_code, phone_number, cell_phone_number, is_whatsapp, email)
                    VALUES ('$name', '$personal_document', '$street', '$number_address', '$complement_address', '$neighborhood', '$city', '$state', '$zip_code', '$phone_number', '$cell_phone_number', '$is_whatsapp', '$email')";

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

                      <!-- Button trigger modal -->
                      <button data-toggle="modal" data-target="#newCustomer" class="btn btn-tone btn-primary">
                          <i class="anticon anticon-user-add"></i>
                          Novo Usuário
                      </button>

                  </div>
              </div>

              <div class="m-t-25">
                  <div class="table-responsive2 col-12">
                      <table id="data-table" class="table table-hover table-sm ">
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
                                                WHERE user_level = 4
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
                                          <a href="tel:<?= tiraMascara($user['phone_number']) ?>" class="text-gray">
                                              <i class="anticon anticon-phone text-primary font-size-20"></i>
                                              <?= $user['phone_number']; ?>
                                          </a>
                                          <br />
                                          <a href="tel:<?= tiraMascara($user['cell_phone_number']) ?>" class="text-gray">
                                              <i class="anticon anticon-mobile text-primary font-size-20"></i>
                                              <?= $user['cell_phone_number']; ?>
                                          </a>
                                          <?php
                                            if ($user['is_whatsapp'] == 1) {
                                            ?>
                                              <a href="https://api.whatsapp.com/send?phone=55<?= tiraMascara($user['cell_phone_number']) ?>&text=Ol%C3%A1%20<?= urlencode($user['name']); ?>%2C%20temos%20novidades%20sobre%20seu%20projeto.%20%20" target="_blank" title="Contato via WhatsApp">
                                                  <i class="fab fa-whatsapp text-success"></i>
                                              </a>
                                          <?php
                                            }
                                            ?>
                                          <br />
                                          <a href="mailto:<?= $user['email'] ?>" class="text-gray">
                                              <i class="anticon anticon-mail text-primary font-size-20"></i>
                                              <?= $user['email']; ?>
                                          </a>
                                      </th>
                                      <th class="font-weight-light">
                                          <?= $user['status'] == 1 ? 'Ativo' : 'Inativo'; ?>
                                      </th>
                                      <td class="text-center  align-items-center">
                                          <button class="btn btn-icon btn-tone btn-secondary" title="Criar Projeto">
                                              <i class="anticon anticon-solution font-size-20"></i>
                                          </button>

                                          <div class="dropdown dropdown-animated scale-left">
                                              <button class="text-gray font-size-24 btn btn-icon " href="javascript:void(0);" data-toggle="dropdown" title="Ações">
                                                  <i class="anticon anticon-ellipsis"></i>
                                              </button>
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
  </div>
  <!-- Content Wrapper END -->



  <!-- Modal -->
  <div class="modal modal-right fade " id="newCustomer">
      <div class="modal-dialog modal-xl " role="document">
          <div class="modal-content">
              <div class="side-modal-wrapper">
                  <div class="vertical-align">
                      <div class="table-cell">
                          <div class="modal-body" style="background-color: #fff;">
                              <header class="fixed-header">
                                  <h3 class="modal-title text-primary">
                                      <i class="anticon anticon-user-add"></i>
                                      Novo Usuário
                                      <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                          <h1 aria-hidden="true" class="modal-title text-danger">&times;</h1>
                                      </button>
                                  </h3>
                                  <hr />
                              </header>

                              <section class="container">
                                  <div class="">
                                      <form action="" method="post" enctype="multipart/form">
                                          <div class="form-row">
                                              <div class="form-group col-12">
                                                  <label class="font-weight-semibold" for="name">Nome:</label>
                                                  <input type="text" class="form-control" name="name" value="">
                                              </div>

                                          </div>
                                          <div class="form-row">
                                              <div class="form-group col-8">
                                                  <label class="font-weight-semibold" for="email">E-mail:</label>
                                                  <input type="mail" class="form-control" name="email" value="">
                                              </div>
                                              <div class="form-group col-4">
                                                  <label class="font-weight-semibold" for="phone_number">Número de Telefone:</label>
                                                  <input type="text" class="form-control js_fone" maxlength="15" name="phone_number" value="">
                                              </div>
                                          </div>
                                          <div class="form-row">
                                              <div class="form-group col-5">
                                                  <label class="font-weight-semibold" for="cell_phone_number">Número de Celular:</label>
                                                  <input type="text" class="form-control js_fone" maxlength="16" name="cell_phone_number" value="" />
                                              </div>
                                              <div class="form-group col-3">

                                                  <!-- <label class="font-weight-semibold" for="language">é WhatsApp?</label> -->
                                                  <div class="checkbox me m-t-40">
                                                      <input id="checkbox1" name="is_whatsapp" type="checkbox">
                                                      <label for="checkbox1" class="checkbox" style="font-size: .8rem;">
                                                          WhatsApp?
                                                      </label>
                                                  </div>
                                              </div>
                                              <div class="form-group col-4">
                                                  <label class="font-weight-semibold " for="personal_document">CPF:</label>
                                                  <input type="text" class="form-control js_cpf" name="personal_document" value="" />
                                              </div>

                                          </div>
                                          <div class="form-row">
                                              <div class="form-group col-3">
                                                  <label class="font-weight-semibold" for="zip_code">CEP:</label>
                                                  <input type="text" class="form-control js_cep" onblur="pesquisacep(this.value)" maxlength="9" name="zip_code" id="zip_code" value="">
                                              </div>
                                              <div class="form-group col-7">
                                                  <label class="font-weight-semibold" for="street">Logradouro:</label>
                                                  <input type="text" class="form-control " id="street" name="street" value="">
                                              </div>
                                              <div class="form-group col-2">
                                                  <label class="font-weight-semibold" for="number_address">Nº:</label>
                                                  <input type="text" class="form-control js_numAdress" id="number_address" maxlength="5" name="number_address" value="">
                                              </div>
                                              <div class="form-group col-12">
                                                  <label class="font-weight-semibold" for="complement_address">Complemento:</label>
                                                  <input type="text" class="form-control " id="complement_address" name="complement_address" value="">
                                              </div>
                                              <div class="form-group col-5">
                                                  <label class="font-weight-semibold" for="neighborhood">Bairro:</label>
                                                  <input type="text" class="form-control " id="neighborhood" name="neighborhood" value="">
                                              </div>
                                              <div class="form-group col-5">
                                                  <label class="font-weight-semibold" for="city">Cidade:</label>
                                                  <input type="text" class="form-control " id="city" name="city" value="">
                                              </div>
                                              <div class="form-group col-2">
                                                  <label class="font-weight-semibold" for="state">Estado:</label>
                                                  <input type="text" class="form-control " id="state" maxlength="2" name="state" value="">
                                              </div>
                                          </div>
                                          <div class="form-row">
                                              <input type="hidden" name="action" value="create">
                                              <div class="form-group col-12">
                                                  <button type="submit" class="btn btn-tone btn-primary">
                                                      <i class="anticon anticon-save"></i>
                                                      Atualizar dados
                                                  </button>

                                              </div>
                                      </form>
                                  </div>
                              </section>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- End Modal -->
