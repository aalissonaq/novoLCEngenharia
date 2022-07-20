                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Equipamentos & Materiais</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="/" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                <a href="#" class="breadcrumb-item">Configurações</a>
                                <span class="breadcrumb-item active">Equipamentos & Materiais</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0"></h5>
                                <div>
                                    <button data-toggle="modal" data-target="#newCustomer" class="btn btn-tone btn-primary">
                                        <!-- <i class="fas fa-boxes"></i> -->
                                        <i class="mdi mdi-solar-power-variant mdi-18px"></i>
                                        Novo Equipamento ou Material
                                    </button>
                                </div>
                            </div>

                            <div class="m-t-25">
                                <table id="data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th class="col-3">Titulo </th>
                                            <th>Descrição </th>
                                            <th class="col-2">
                                                <i class="mdi mdi-mdi-currency-brl mdi-18px"></i>
                                                Preço
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM equipment
                                                ORDER BY equipment.title_equipment ASC";
                                        $result = $connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($result as $equipment) {
                                        ?>
                                            <tr class="font-weight-light">
                                                <td class="text-uppercase">
                                                    <?= $equipment['title_equipment'] ?>
                                                </td>
                                                <th class="font-weight-light">
                                                    <?= lmWord($equipment['decription_equipmentcol'], 150) ?>
                                                </th>
                                                <th class="font-weight-light">
                                                    R$ <?= number_format($equipment['price'], 2, ',', '.') ?>
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
