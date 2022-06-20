<?php
$uuid = $_GET['uuid'];
$sql = "SELECT * FROM projects WHERE uuid = '{$uuid}'";
$result = $connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$refer = $result[0];
?>
<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="media align-items-center">
                                <div class="avatar avatar-image rounded">
                                    <img src="assets/images/others/thumb-3.jpg" alt="">
                                </div>
                                <div class="m-l-10">
                                    <h4 class="m-b-0 text-uppercase">
                                        <?= $refer['title'] ?>
                                    </h4>
                                </div>
                            </div>
                            <div>
                                <?php
                                switch ($refer['states']) {
                                    case 'create':
                                        $stateColor = 'cyan';
                                        $Status = 'Criado';
                                        break;
                                    case 'progress':
                                        $stateColor = 'purple';
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
                                <span class="badge badge-pill badge-<?= $stateColor ?> ">
                                    <?= $Status; ?>
                                </span>
                                <span>
                                    <a href="./../pdfs/proposta-solar.php?id=<?= $uuid ?>" target="_new" class="btn btn-primary btn-tone btn-xs">
                                        <i class="anticon anticon-file-pdf text-danger font-size-18 m-h-5"></i>Proposta
                                    </a>
                                </span>
                                <span>
                                    <button class="btn btn-secondary btn-tone btn-xs" onclick="history.go(-1)">
                                        <i class="anticon anticon-left"></i>
                                        Voltar
                                    </button>
                                </span>

                            </div>
                        </div>
                        <div class="m-t-40">
                            <h6>Descrição do Projeto:</h6>
                            <p class="text-justify">
                                <?= $refer['decription'] ?>
                            </p>
                        </div>
                        <div class="d-md-flex m-t-30 align-items-center justify-content-between">
                            <div class="d-flex align-items-center m-t-10">
                                <span class="text-dark font-weight-semibold m-r-10 m-b-5">Responsável: </span>
                                <?php
                                $sql = "SELECT * FROM projects
                                        INNER JOIN person
                                        ON projects.id_person_responsable = person.id
                                        WHERE uuid = '{$_GET['uuid']}'";
                                $result = $connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $resultado) {

                                ?>
                                    <a class="m-r-5 m-b-5" href="javascript:void(0);" data-toggle="tooltip" title="<?= $resultado['name'] ?>">
                                        <div class="avatar avatar-image" style="width: 30px; height: 30px;">
                                            <img src="assets/images/avatars/<?= $resultado['avatar'] ?>" alt="<?= $resultado['name'] ?>">
                                        </div>
                                    </a>
                                <?php } ?>
                            </div>
                            <div class="m-t-10">
                                <span class="font-weight-semibold m-r-10 m-b-5 text-dark">Previsão: </span>
                                <span>
                                    <?= date('d/m/Y', strtotime($refer['deadline'])) ?>

                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-30">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#project-details-tasks">Tarefas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#project-details-comments">Comentários</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#project-details-project">Dados do Projeto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#project-details-attachment">Arquivos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#project-details-proposal">Criar Proposta</a>
                            </li>
                        </ul>
                        <div class="tab-content m-t-15 p-25">
                            <div class="tab-pane fade show active" id="project-details-tasks">
                                <div class="checkbox m-b-20">
                                    <input id="task-1" type="checkbox">
                                    <label for="task-1">Irish skinny, grinder affogato</label>
                                </div>
                                <div class="checkbox m-b-20">
                                    <input id="task-2" type="checkbox">
                                    <label for="task-2">Let us wax poetic about the beauty of the cheeseburger.</label>
                                </div>
                                <div class="checkbox m-b-20">
                                    <input id="task-3" type="checkbox">
                                    <label for="task-3">I'm gonna build me an airport</label>
                                </div>
                                <div class="checkbox m-b-20">
                                    <input id="task-4" type="checkbox" checked="">
                                    <label for="task-4">Efficiently unleash cross-media information</label>
                                </div>
                                <div class="checkbox m-b-20">
                                    <input id="task-5" type="checkbox" checked="">
                                    <label for="task-5">Here's the story of a man named Brady</label>
                                </div>
                                <div class="checkbox m-b-20">
                                    <input id="task-6" type="checkbox" checked="">
                                    <label for="task-6">Bugger bag egg's old boy willy jolly</label>
                                </div>
                                <div class="checkbox m-b-20">
                                    <input id="task-7" type="checkbox" checked="">
                                    <label for="task-7">Hand-crafted exclusive finest tote bag Ettinger</label>
                                </div>
                                <div class="checkbox m-b-20">
                                    <input id="task-8" type="checkbox" checked="">
                                    <label for="task-8">I'll be sure to note that in my log</label>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="project-details-project">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-h-0">
                                        <div class="media m-b-15">
                                            <div class="avatar avatar-image">
                                                <img src="assets/images/avatars/thumb-8.jpg" alt="">
                                            </div>
                                            <div class="media-body m-l-20">
                                                <h6 class="m-b-0">
                                                    <a href="" class="text-dark">Lillian Stone</a>
                                                </h6>
                                                <span class="font-size-13 text-gray">28th Jul 2018</span>
                                            </div>
                                        </div>
                                        <p>The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and illustrious history. It was born from humble roots, only to rise to well-seasoned greatness.</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="project-details-comments">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-h-0">
                                        <div class="media m-b-15">
                                            <div class="avatar avatar-image">
                                                <img src="assets/images/avatars/thumb-8.jpg" alt="">
                                            </div>
                                            <div class="media-body m-l-20">
                                                <h6 class="m-b-0">
                                                    <a href="" class="text-dark">Lillian Stone</a>
                                                </h6>
                                                <span class="font-size-13 text-gray">28th Jul 2018</span>
                                            </div>
                                        </div>
                                        <p>The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and illustrious history. It was born from humble roots, only to rise to well-seasoned greatness.</p>
                                    </li>
                                    <li class="list-group-item p-h-0">
                                        <div class="media m-b-15">
                                            <div class="avatar avatar-image">
                                                <img src="assets/images/avatars/thumb-9.jpg" alt="">
                                            </div>
                                            <div class="media-body m-l-20">
                                                <h6 class="m-b-0">
                                                    <a href="" class="text-dark">Victor Terry</a>
                                                </h6>
                                                <span class="font-size-13 text-gray">28th Jul 2018</span>
                                            </div>
                                        </div>
                                        <p>The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and illustrious history. It was born from humble roots, only to rise to well-seasoned greatness.</p>
                                    </li>
                                    <li class="list-group-item p-h-0">
                                        <div class="media m-b-15">
                                            <div class="avatar avatar-image">
                                                <img src="assets/images/avatars/thumb-10.jpg" alt="">
                                            </div>
                                            <div class="media-body m-l-20">
                                                <h6 class="m-b-0">
                                                    <a href="" class="text-dark">Wilma Young</a>
                                                </h6>
                                                <span class="font-size-13 text-gray">28th Jul 2018</span>
                                            </div>
                                        </div>
                                        <p>The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and illustrious history. It was born from humble roots, only to rise to well-seasoned greatness.</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="project-details-attachment">
                                <div class="custom-file m-b-15">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Selecione um Arquivo</label>
                                </div>
                                <div class="file" style="min-width: 200px;">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-icon avatar-cyan rounded m-r-15">
                                            <i class="anticon anticon-file-exclamation font-size-20"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Mockup.zip</h6>
                                            <span class="font-size-13 text-muted">7MB</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="file" style="min-width: 200px;">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-icon avatar-blue rounded m-r-15">
                                            <i class="anticon anticon-file-word font-size-20"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Guideline.doc</h6>
                                            <span class="font-size-13 text-muted">128 KB</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="file" style="min-width: 200px;">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-icon avatar-gold rounded m-r-15">
                                            <i class="anticon anticon-file-image font-size-20"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Logo.png</h6>
                                            <span class="font-size-13 text-muted">128 KB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="project-details-proposal">
                                <section class="container">
                                    <form action="" method="post" enctype="multipart/form">
                                        <input type="hidden" name="uuid" value="<?= $uuid ?>">
                                        <input type="hidden" id="idCustumer" name="id_person_responsable" value="" />

                                        <label for="">Material do Projeto</label><br />
                                        <div class="form-row align-items-center m-b-20">
                                            <div class="col-5">
                                                <label class="sr-only" for="description">Description</label>
                                                <input type="text" class="form-control mb-9" id="description" placeholder="Descrição">
                                            </div>
                                            <div class="col-2">
                                                <label class="sr-only" for="qtd">qtd</label>
                                                <input type="number" class="form-control mb-9" id="qtd" placeholder="Quantidade ">
                                            </div>
                                            <div class="col-3">
                                                <label class="sr-only" for="valor">Valor</label>
                                                <input type="text" class="form-control mb-9 js_dinheiro" id="valor" placeholder="Valor ">
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-secondary btn-tone m-r-5">
                                                    <i class="fas fa-boxess"></i>
                                                    Salvar
                                                </button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Descrição</th>
                                                        <th scope="col">Quantidade</th>
                                                        <th scope="col">Valor Unit</th>
                                                        <th scope="col">Valor total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Descrição no mareial utilizado no projeto</td>
                                                        <td class="text-center">10</td>
                                                        <td>R$ <?= formatMoedaBr(1000) ?></td>
                                                        <td>R$ <?= formatMoedaBr(1000 * 10) ?></td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="4" class="text-right"><b>Total Geral</b></td>
                                                        <td>R$ <?= formatMoedaBr(1000 * 10) ?></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>


                                        <!--<div class="form-group">
                                            <label for="title">Titulo do Projeto</label>
                                            <input type="text" disabled class="form-control" id="title" name="title" id="uuidProjetct" value="<?= $projectPerson['title'] ?>">
                                        </div>
                                        <div class="form-group">
                                                      <label for="decription">Descrição do Projeto</label>
                                                      <textarea class="form-control" name="decription" rows="3"></textarea>
                                                  </div>-->


                                        <div class="form-group ">
                                            <label for="title">Valor da Proposta (R$)</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$ </span>
                                                </div>
                                                <input type="text" class="form-control js_dinheiro" id="title" name="title" id="uuidProjetct" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="states">Forma de Pagamento</label></br>
                                            <select class="select2" name="states">
                                                <option value="" selected disabled>Escolha a forma de Pagamento</option>
                                                <option value="transPix">Transferência Bancária ou PIX</option>
                                                <option value="Crédito">Cartão de Crédito</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="deadline">Validade da Proposta</label>
                                            <input type="date" class="form-control" id="deadline" name="deadline" placeholder="Previsão do Projeto">
                                        </div>
                                        <input type="hidden" name="action" value="createProject">
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
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Atividas</h4>
                    </div>
                    <div class="card-body">
                        <ul class="timeline timeline-sm">
                            <li class="timeline-item">
                                <div class="timeline-item-head">
                                    <div class="avatar avatar-icon avatar-sm avatar-cyan">
                                        <i class="anticon anticon-check"></i>
                                    </div>
                                </div>
                                <div class="timeline-item-content">
                                    <div class="m-l-10">
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-image">
                                                <img src="assets/images/avatars/thumb-4.jpg" alt="">
                                            </div>
                                            <div class="m-l-10">
                                                <h6 class="m-b-0">Virgil Gonzales</h6>
                                                <span class="text-muted font-size-13">
                                                    <i class="anticon anticon-clock-circle"></i>
                                                    <span class="m-l-5">10:44 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="m-t-20">
                                            <p class="m-l-20">
                                                <span class="text-dark font-weight-semibold">Complete task </span>
                                                <span class="m-l-5"> Prototype Design</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-item-head">
                                    <div class="avatar avatar-icon avatar-sm avatar-blue">
                                        <i class="anticon anticon-link"></i>
                                    </div>
                                </div>
                                <div class="timeline-item-content">
                                    <div class="m-l-10">
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-image">
                                                <img src="assets/images/avatars/thumb-8.jpg" alt="">
                                            </div>
                                            <div class="m-l-10">
                                                <h6 class="m-b-0">Lilian Stone</h6>
                                                <span class="text-muted font-size-13">
                                                    <i class="anticon anticon-clock-circle"></i>
                                                    <span class="m-l-5">8:34 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="m-t-20">
                                            <p class="m-l-20">
                                                <span class="text-dark font-weight-semibold">Attached file </span>
                                                <span class="m-l-5"> Mockup Zip</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-item-head">
                                    <div class="avatar avatar-icon avatar-sm avatar-purple">
                                        <i class="anticon anticon-message"></i>
                                    </div>
                                </div>
                                <div class="timeline-item-content">
                                    <div class="m-l-10">
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-image">
                                                <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                            </div>
                                            <div class="m-l-10">
                                                <h6 class="m-b-0">Erin Gonzales</h6>
                                                <span class="text-muted font-size-13">
                                                    <i class="anticon anticon-clock-circle"></i>
                                                    <span class="m-l-5">8:34 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="m-t-20">
                                            <p class="m-l-20">
                                                <span class="text-dark font-weight-semibold">Commented </span>
                                                <span class="m-l-5"> 'This is not our work!'</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-item-head">
                                    <div class="avatar avatar-icon avatar-sm avatar-purple">
                                        <i class="anticon anticon-message"></i>
                                    </div>
                                </div>
                                <div class="timeline-item-content">
                                    <div class="m-l-10">
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-image">
                                                <img src="assets/images/avatars/thumb-6.jpg" alt="">
                                            </div>
                                            <div class="m-l-10">
                                                <h6 class="m-b-0">Riley Newman</h6>
                                                <span class="text-muted font-size-13">
                                                    <i class="anticon anticon-clock-circle"></i>
                                                    <span class="m-l-5">8:34 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="m-t-20">
                                            <p class="m-l-20">
                                                <span class="text-dark font-weight-semibold">Commented </span>
                                                <span class="m-l-5"> 'Hi, please done this before tommorow'</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-item-head">
                                    <div class="avatar avatar-icon avatar-sm avatar-red">
                                        <i class="anticon anticon-delete"></i>
                                    </div>
                                </div>
                                <div class="timeline-item-content">
                                    <div class="m-l-10">
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-image">
                                                <img src="assets/images/avatars/thumb-7.jpg" alt="">
                                            </div>
                                            <div class="m-l-10">
                                                <h6 class="m-b-0">Pamela Wanda</h6>
                                                <span class="text-muted font-size-13">
                                                    <i class="anticon anticon-clock-circle"></i>
                                                    <span class="m-l-5">8:34 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="m-t-20">
                                            <p class="m-l-20">
                                                <span class="text-dark font-weight-semibold">Removed </span>
                                                <span class="m-l-5"> a file</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-item-head">
                                    <div class="avatar avatar-icon avatar-sm avatar-gold">
                                        <i class="anticon anticon-file-add"></i>
                                    </div>
                                </div>
                                <div class="timeline-item-content">
                                    <div class="m-l-10">
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-image">
                                                <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                            </div>
                                            <div class="m-l-10">
                                                <h6 class="m-b-0">Marshall Nichols</h6>
                                                <span class="text-muted font-size-13">
                                                    <i class="anticon anticon-clock-circle"></i>
                                                    <span class="m-l-5">5:21 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="m-t-20">
                                            <p class="m-l-20">
                                                <span class="text-dark font-weight-semibold">Create </span>
                                                <span class="m-l-5"> this project</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Wrapper END -->
