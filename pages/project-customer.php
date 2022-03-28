              <!-- Content Wrapper START -->
              <div class="main-content">
                  <?php
                    $sql = "SELECT * FROM person WHERE id = '{$_GET['idcliente']}'";
                    $result = $connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                    $person = $result[0];
                    ?>
                  <div class="page-header no-gutters">
                      <div class="row align-items-md-center">
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="header-sub-title">
                                          <nav class="breadcrumb breadcrumb-dash">
                                              <a href="/" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                              <a href="?page=customers" class="breadcrumb-item">Clientes</a>
                                              <span class="breadcrumb-item active">
                                                  Projetos do Cliente:
                                                  <b class="text-secondary">
                                                      <?= $person['name']; ?>
                                                  </b>
                                              </span>
                                          </nav>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="text-md-right m-v-10">
                                  <div class="btn-group m-r-10">
                                      <button id="list-view-btn" type="button" onclick="history.go(-1)" class="btn btn-default btn-icon" data-toggle="tooltip" data-placement="bottom" title="Voltar">
                                          <i class="fas fa-chevron-left"></i>
                                      </button>
                                      <!-- <button id="card-view-btn" type="button" class="btn btn-default btn-icon active" data-toggle="tooltip" data-placement="bottom" title="Card View">
                                          <i class="anticon anticon-appstore"></i>
                                      </button> -->
                                  </div>
                                  <button class="btn btn-tone btn-primary" data-toggle="modal" data-target="#create-new-project">
                                      <i class="anticon anticon-appstore"></i>
                                      <span class="m-l-5">Novo Projeto para
                                          <b class="text-warning">
                                              <?= explode(' ', $person['name'])[0]; ?>
                                          </b>
                                      </span>
                                  </button>
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
                              <div class="col-md-3">
                                  <div class="card">
                                      <div class="card-body">
                                          <div class="d-flex justify-content-between">
                                              <div class="media">
                                                  <div class="avatar avatar-image rounded">
                                                      <img src="assets/images/others/thumb-1.jpg" alt="">
                                                  </div>
                                                  <div class="m-l-10">
                                                      <h5 class="m-b-0">Mind Cog App</h5>
                                                      <span class="text-muted font-size-11"><?= uuidv4() ?></span>
                                                  </div>
                                              </div>
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
                                                          <span class="m-l-10">Edit</span>
                                                      </button>
                                                      <button class="dropdown-item" type="button">
                                                          <i class="anticon anticon-delete"></i>
                                                          <span class="m-l-10">Delete</span>
                                                      </button>
                                                  </div>
                                              </div>
                                          </div>
                                          <p class="m-t-25">European minnow priapumfish mosshead warbonnet shrimpfish.</p>
                                          <div class="m-t-30">
                                              <div class="d-flex justify-content-between">
                                                  <span class="font-weight-semibold">Progress</span>
                                                  <span class="font-weight-semibold">100%</span>
                                              </div>
                                              <div class="progress progress-sm m-t-10">
                                                  <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                                              </div>
                                          </div>
                                          <div class="m-t-20">
                                              <div class="d-flex justify-content-between align-items-center">
                                                  <div>
                                                      <span class="badge badge-pill badge-cyan">Ready</span>
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

                          </div>
                      </div>
                      <div class="card d-none" id="list-view">
                          <div class="card-body">
                              <div class="table">
                                  <table class="table table-hover table-sm">
                                      <thead>
                                          <tr>
                                              <th>Project</th>
                                              <th>Tasks</th>
                                              <th>Members</th>
                                              <th>Progress</th>
                                              <th></th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td>
                                                  <div class="media align-items-center">
                                                      <div class="avatar avatar-image rounded">
                                                          <img src="assets/images/others/thumb-1.jpg" alt="">
                                                      </div>
                                                      <div class="m-l-10">
                                                          <h5 class="m-b-0">Mind Cog App</h5>
                                                      </div>
                                                  </div>
                                              </td>
                                              <td>
                                                  <span>31 Tasks</span>
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
                                                              <span class="m-l-10">Edit</span>
                                                          </button>
                                                          <button class="dropdown-item" type="button">
                                                              <i class="anticon anticon-delete"></i>
                                                              <span class="m-l-10">Delete</span>
                                                          </button>
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
              <!-- Content Wrapper END -->

              <!-- Modal new Project -->
              <div class="modal modal-right fade" id="create-new-project">
                  <div class="modal-dialog modal-xl" role="document">
                      <div class="modal-content">
                          <div class="side-modal-wrapper page-header">
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
                                          <input type="hidden" id="idCustumer" name="id_person_responsable" value="" />
                                          <hr />
                                          <section class="container">
                                              <form action="" method="post" enctype="multipart/form">
                                                  <input type="hidden" name="uuid" value="<?= $uuid ?>">
                                                  <div class="form-group">
                                                      <label for="title">Titulo do Projeto</label>
                                                      <input type="text" focus class="form-control" id="title" placeholder="Nome do Projeto">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="decription">Descrição do Projeto</label>
                                                      <textarea class=" form-control" name="decription" rows="3"></textarea>
                                                  </div>
                                                  <!--<div class="form-group">
                                                        <label for="states">Estado do Projeto</label></br>
                                                        <select class="select2" name="states">
                                                            <option value="" selected disabled>Selecione ...</option>
                                                            <option value="create">Criando</option>
                                                            <option value="in progress">Em Andamento</option>
                                                            <option value="suspended">Suspenso</option>
                                                            <option value="cancel">Canselado</option>
                                                        </select>
                                                    </div> -->
                                                  <div class="form-group">
                                                      <label for="id_type_project">Tipo do Projeto</label></br>
                                                      <?php
                                                        $sql = "SELECT * FROM types_project";
                                                        $result = $connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);

                                                        ?>
                                                      <select class="select2" name="id_type_project" onChange="selectTipoProjeto()">
                                                          <option value="" selected disabled>Selecione ...</option>
                                                          <?php foreach ($result as $key => $value) : ?>
                                                              <option value="<?= $value['id'] ?>"><?= $value['title'] ?></option>
                                                          <?php endforeach; ?>
                                                      </select>

                                                  </div>

                                                  <div class="form-group">
                                                      <label for="deadline">Previsão do Projeto</label>
                                                      <input type="date" class="form-control" id="deadline" name="deadline" placeholder="Previsão do Projeto">
                                                  </div>

                                                  <div class=" no-gutters">
                                                      <div class="row align-items-md-center">
                                                          <div class="col-md-6">
                                                              <div class="row">
                                                                  <div class="input-affix m-v-10">
                                                                      <button type="submit" class="btn btn-tone btn-success m-v-10">
                                                                          <i class="anticon anticon-save"></i>
                                                                          Criar Projeto
                                                                      </button>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <div class="text-md-right m-v-10">
                                                                  <div class="btn-group m-r-10">
                                                                      <button type="reset" class="btn btn-tone btn-danger m-v-10">
                                                                          <i class="anticon anticon-delete"></i>
                                                                          Limpar Formulário
                                                                      </button>
                                                                  </div>
                                                              </div>
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