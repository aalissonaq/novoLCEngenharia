<!-- Content Wrapper START -->
<div class="main-content">
    <div class="page-header">
        <h1 class="header-title">Perfil</h1>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="/" class="breadcrumb-item">
                    <i class="anticon anticon-home m-r-5"></i>
                    Home
                </a>
                <a class="breadcrumb-item" href="#">Usuário</a>
                <span class="breadcrumb-item active">Perfil</span>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="d-md-flex align-items-center">
                            <div class="text-center text-sm-left ">

                                <?php
                                $sql = "SELECT * FROM person
                                        WHERE id = {$_SESSION['ID']}";
                                $result = $connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                                $dataPerson = $result[0];

                                if ($_SESSION['FOTO'] == '') {
                                    echo '
                                        <div class="avatar avatar-icon avatar-blue avatar-lg" style="width: 150px; height:150px">
                                            <i class="anticon anticon-user"></i>
                                        </div>
                                        ';
                                } else {
                                    echo '
                                                <div class="avatar avatar-image avatar-lg" style="width: 150px; height:150px">
                                                <img src="assets/images/avatars/' . $_SESSION['FOTO'] . '" alt="Avatar" class="avatar-img rounded-circle">
                                                </div>
                                                ';
                                }
                                ?>


                                <!-- <div class="avatar avatar-image" style="width: 150px; height:150px">
                                    <img src="assets/images/avatars/<? $_SESSION['FOTO']; ?>" alt="avatar de <? $_SESSION['USUARIO']; ?>">
                                </div> -->
                            </div>
                            <div class="text-center text-sm-left m-v-15 p-l-30">
                                <h3 class="m-b-5">
                                    <?= $_SESSION['USUARIO']; ?>
                                </h3>
                                <p class="text-opacity font-size-13">
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
                                </p>
                                <!-- <p class="text-dark m-b-20">Função do Usuário</p> -->
                                <a href="https://api.whatsapp.com/send?phone=55<?= tiraMascara($dataPerson['cell_phone_number']) ?>&text=Ol%C3%A1%20<?= urlencode($dataPerson['name']); ?>%2C%20temos%20novidades%20sobre%20seu%20projeto.%20%20" target="_blank" title="Contato via WhatsApp" class="btn btn-secondary btn-tone">
                                    <i class="fab fa-whatsapp fa-fw"></i>&nbsp;Contato
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="d-md-block d-none border-left col-1"></div>
                            <div class="col">
                                <ul class="list-unstyled m-t-10">
                                    <li class="row">
                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                            <span>E-mail: </span>
                                        </p>
                                        <p class="col font-weight-semibold">
                                            <a href="mailto:<?= $dataPerson['email'] ?>" class="text-gray">
                                                <?= $dataPerson['email']; ?>
                                            </a>
                                        </p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                            <span>Telefone: </span>
                                        </p>
                                        <p class="col font-weight-semibold"> +55

                                            <a href="tel:<?= tiraMascara($dataPerson['phone_number']) ?>" class="text-gray">
                                                <?= $dataPerson['phone_number']; ?>
                                            </a>
                                        </p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-mobile"></i>
                                            <span>Celular: </span>
                                        </p>
                                        <p class="col font-weight-semibold"> +55
                                            <a href="tel:<?= tiraMascara($dataPerson['cell_phone_number']) ?>" class="text-gray">
                                                <?= $dataPerson['cell_phone_number']; ?>
                                            </a>


                                            <?php
                                            if ($dataPerson['is_whatsapp'] == 1) {
                                            ?>
                                                <a href="https://api.whatsapp.com/send?phone=55<?= tiraMascara($dataPerson['cell_phone_number']) ?>&text=Ol%C3%A1%20<?= urlencode($dataPerson['name']); ?>%2C%20temos%20novidades%20sobre%20seu%20projeto.%20%20" target="_blank" title="Contato via WhatsApp">
                                                    <i class="fab fa-whatsapp text-success"></i>
                                                </a>
                                            <?php
                                            }
                                            ?>
                                        </p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                            <span>Endereço: </span>
                                        </p>
                                        <p class="col font-weight-semibold">
                                            <?= $dataPerson['street'] . ', ' . $dataPerson['number_address'] . '<br/>' ?>

                                            <?= $dataPerson['complement_address'] != '' ? '<i class="font-weight-light">' . $dataPerson['complement_address'] . '</i>' : ''; ?><br />
                                            <?= $dataPerson['neighborhood'] . '<br/>' . $dataPerson['city'] . '-' . $dataPerson['state'] . '<br/> CEP: ' . MascaraCEP($dataPerson['zip_code']); ?>
                                        </p>
                                    </li>
                                </ul>
                                <!-- <div class="d-flex font-size-22 m-t-15">
                                    <a href="" class="text-gray p-r-20">
                                        <i class="anticon anticon-facebook"></i>
                                    </a>
                                    <a href="" class="text-gray p-r-20">
                                        <i class="anticon anticon-twitter"></i>
                                    </a>
                                    <a href="" class="text-gray p-r-20">
                                        <i class="anticon anticon-behance"></i>
                                    </a>
                                    <a href="" class="text-gray p-r-20">
                                        <i class="anticon anticon-dribbble"></i>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Informações básicas</h4>
                </div>
                <div class="card-body">
                    <div class="media align-items-center">

                        <?php
                        if ($_SESSION['FOTO'] == '') {
                            echo '
        <div class="avatar avatar-icon avatar-blue m-h-10 m-r-15" style="height: 80px; width: 80px">
            <i class="anticon anticon-user"></i>
        </div>
        ';
                        } else {
                            echo '
                <div class="avatar avatar-image m-h-10 m-r-15" style="height: 80px; width: 80px">
                <img src="assets/images/avatars/' . $_SESSION['FOTO'] . '" alt="Avatar' . $_SESSION['USUARIO'] . '" class="avatar-img rounded-circle">
                </div>
                ';
                        }
                        ?>
                        <div class="m-l-20 m-r-20">
                            <h5 class="m-b-5 font-size-18">Mudar Avatar</h5>
                            <p class="opacity-07 font-size-13 m-b-0">
                                Dimensões recomendadas: <br>
                                120 x 120 Tamanho máximo do arquivo: 5 MB
                            </p>
                        </div>
                        <div>
                            <button class="btn btn-tone btn-secondary">Upload</button>
                        </div>
                    </div>
                    <hr class="m-v-25">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="font-weight-semibold" for="name">Nome:</label>
                                <input type="text" class="form-control" name="name" value="<?= $dataPerson['name'] ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-semibold" for="email">E-mail:</label>
                                <input type="mail" class="form-control" name="email" value="<?= $dataPerson['email'] ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label class="font-weight-semibold" for="phone_number">Número de telefone:</label>
                                <input type="text" class="form-control js_fone" maxlength="15" name="phone_number" value="<?= $dataPerson['phone_number'] ?>">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="font-weight-semibold" for="cell_phone_number">Número de Celular:</label>
                                <input type="text" class="form-control js_fone" maxlength="16" name="cell_phone_number" value="<?= $dataPerson['cell_phone_number'] ?>" />
                            </div>
                            <div class="form-group col-md-2">

                                <!-- <label class="font-weight-semibold" for="language">é WhatsApp?</label> -->
                                <div class="checkbox me m-t-40">
                                    <input id="checkbox1" name="is_whatsapp" type="checkbox" <?= $dataPerson['is_whatsapp'] ? 'checked' : '' ?>>
                                    <label for="checkbox1">é WhatsApp?</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="font-weight-semibold" for="birth">Data de nascimento:</label>
                                <input type="text" maxlength="10" class="form-control js_da" id="birth" name="birth" value="<?= $dataPerson['birth'] ?>" />
                            </div>

                            <div class="form-group col-md-3">
                                <label class="font-weight-semibold " for="personal_document">CPF:</label>
                                <input type="text" class="form-control js_cpf" name="personal_document" value="<?= $dataPerson['personal_document']; ?>" />
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label class="font-weight-semibold" for="zip_code">CEP:</label>
                                <input type="text" class="form-control js_cep" onblur="pesquisacep(this.value)" maxlength="9" name="zip_code" id="zip_code" value="<?= $dataPerson['zip_code'] ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-semibold" for="address">Logradouro:</label>
                                <input type="text" class="form-control " id="address" FontLib\Table\Type\name="address" value="<?= $dataPerson['address'] ?>">
                            </div>
                            <div class="form-group col-md-1">
                                <label class="font-weight-semibold" for="number_address">Nº:</label>
                                <input type="text" class="form-control js_numAdress " id="number_address" maxlength="5" name="number_address" value="<?= $dataPerson['number_address'] ?>">
                            </div>
                            <div class="form-group col-md-5">
                                <label class="font-weight-semibold" for="complement_address">Complemento:</label>
                                <input type="text" class="form-control " id="complement_address" name="complement_address" value="<?= $dataPerson['complement_address'] ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-semibold" for="neighborhood">Bairro:</label>
                                <input type="text" class="form-control " id="neighborhood" name="neighborhood" value="<?= $dataPerson['neighborhood'] ?>">
                            </div>
                            <div class="form-group col-md-5">
                                <label class="font-weight-semibold" for="city">Cidade:</label>
                                <input type="text" class="form-control " id="city" name="city" value="<?= $dataPerson['city'] ?>">
                            </div>
                            <div class="form-group col-md-1">
                                <label class="font-weight-semibold" for="state">Estado:</label>
                                <input type="text" class="form-control " id="state" maxlength="2" name="state" value="<?= $dataPerson['state'] ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <button class="btn btn-tone btn-secondary">
                                    <i class="anticon anticon-save"></i>
                                    Atualizar dados
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Alterar a senha</h4>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="oldPassword">Senha Antiga:</label>
                            <input type="password" class="form-control" id="oldPassword" placeholder="Old Password">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="newPassword">Nova Senha:</label>
                            <input type="password" class="form-control" id="newPassword" placeholder="New Password">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="confirmPassword">Confirm Password:</label>
                            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                        </div>
                        <div class="form-group col-md-3">
                            <button class="btn btn-tone btn-secondary m-t-30">
                                <i class="anticon anticon-save"></i>
                                Mudar Senha
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5>Bio</h5>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here'.</p>
                        <hr>
                        <h5>Specialilty</h5>
                        <h5 class="m-t-20">
                            <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">Sketch</span>
                            <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">Marvel</span>
                            <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">Photoshop</span>
                            <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">Illustrator</span>
                            <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">Web Design</span>
                            <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">Mobile App Design</span>
                            <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">User Interface</span>
                            <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">User Experience</span>
                        </h5>
                        <hr>
                        <h5>Experices</h5>
                        <div class="m-t-20">
                            <div class="media m-b-30">
                                <div class="avatar avatar-image">
                                    <img src="assets/images/others/adobe-thumb.png" alt="">
                                </div>
                                <div class="media-body m-l-20">
                                    <h6 class="m-b-0">UI/UX Designer, Adobe Inc.</h6>
                                    <span class="font-size-13 text-gray">Jul 2018</span>
                                </div>
                            </div>
                            <div class="media m-b-30">
                                <div class="avatar avatar-image">
                                    <img src="assets/images/others/amazon-thumb.png" alt="">
                                </div>
                                <div class="media-body m-l-20">
                                    <h6 class="m-b-0">Product Developer, Amazon.com Inc.</h6>
                                    <span class="font-size-13 text-gray">Jul-2017 - Jul 2018</span>
                                </div>
                            </div>
                            <div class="media m-b-30">
                                <div class="avatar avatar-image">
                                    <img src="assets/images/others/nvidia-thumb.png" alt="">
                                </div>
                                <div class="media-body m-l-20">
                                    <h6 class="m-b-0">Interface Designer, Nvidia Corporation</h6>
                                    <span class="font-size-13 text-gray">Jul-2016 - Jul 2017</span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Education</h5>
                        <div class="m-t-20">
                            <div class="media m-b-30">
                                <div class="avatar avatar-image">
                                    <img src="assets/images/others/cambridge-thumb.png" alt="">
                                </div>
                                <div class="media-body m-l-20">
                                    <h6 class="m-b-0">MSt in Social Innovation, Cambridge University</h6>
                                    <span class="font-size-13 text-gray">Jul-2012 - Jul 2016</span>
                                </div>
                            </div>
                            <div class="media m-b-30">
                                <div class="avatar avatar-image">
                                    <img src="assets/images/others/phillips-academy-thumb.png" alt="">
                                </div>
                                <div class="media-body m-l-20">
                                    <h6 class="m-b-0">Phillips Academy</h6>
                                    <span class="font-size-13 text-gray">Jul-2005 - Jul 2011</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5>Reviews (18)</h5>
                        <div class="m-t-20">
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
                                    <span>The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and illustrious history. It was born from humble roots, only to rise to well-seasoned greatness.</span>
                                    <div class="star-rating m-t-15">
                                        <input type="radio" id="star1-5" name="rating-1" value="5" checked disabled /><label for="star1-5" title="5 star"></label>
                                        <input type="radio" id="star1-4" name="rating-1" value="4" disabled /><label for="star1-4" title="4 star"></label>
                                        <input type="radio" id="star1-3" name="rating-1" value="3" disabled /><label for="star1-3" title="3 star"></label>
                                        <input type="radio" id="star1-2" name="rating-1" value="2" disabled /><label for="star1-2" title="2 star"></label>
                                        <input type="radio" id="star1-1" name="rating-1" value="1" disabled /><label for="star1-1" title="1 star"></label>
                                    </div>
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
                                    <span>The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and illustrious history. It was born from humble roots, only to rise to well-seasoned greatness.</span>
                                    <div class="star-rating m-t-15">
                                        <input type="radio" id="star2-5" name="rating-2" value="5" disabled /><label for="star2-5" title="5 star"></label>
                                        <input type="radio" id="star2-4" name="rating-2" value="4" checked disabled /><label for="star2-4" title="4 star"></label>
                                        <input type="radio" id="star2-3" name="rating-2" value="3" disabled /><label for="star2-3" title="3 star"></label>
                                        <input type="radio" id="star2-2" name="rating-2" value="2" disabled /><label for="star2-2" title="2 star"></label>
                                        <input type="radio" id="star2-1" name="rating-2" value="1" disabled /><label for="star2-1" title="1 star"></label>
                                    </div>
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
                                    <span>The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and illustrious history. It was born from humble roots, only to rise to well-seasoned greatness.</span>
                                    <div class="star-rating m-t-15">
                                        <input type="radio" id="star3-5" name="rating-3" value="5" checked disabled /><label for="star3-5" title="5 star"></label>
                                        <input type="radio" id="star3-4" name="rating-3" value="4" disabled /><label for="star3-4" title="4 star"></label>
                                        <input type="radio" id="star3-3" name="rating-3" value="3" disabled /><label for="star3-3" title="3 star"></label>
                                        <input type="radio" id="star3-2" name="rating-3" value="2" disabled /><label for="star3-2" title="2 star"></label>
                                        <input type="radio" id="star3-1" name="rating-3" value="1" disabled /><label for="star3-1" title="1 star"></label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Connected</h5>
                        <div class="m-t-30">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-image">
                                    <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                </div>
                                <div class="m-l-10">
                                    <h5 class="m-b-0">
                                        <a href="" class="text-dark">Erin Gonzales</a>
                                    </h5>
                                    <span class="font-size-13 text-gray">UI/UX Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-30">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-image">
                                    <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                </div>
                                <div class="m-l-10">
                                    <h5 class="m-b-0">
                                        <a href="" class="text-dark">Darryl Day</a>
                                    </h5>
                                    <span class="font-size-13 text-gray">Software Engineer</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-30">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-image">
                                    <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                </div>
                                <div class="m-l-10">
                                    <h5 class="m-b-0">
                                        <a href="" class="text-dark">Marshall Nichols</a>
                                    </h5>
                                    <span class="font-size-13 text-gray">Product Manager</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-30">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-image">
                                    <img src="assets/images/avatars/thumb-6.jpg" alt="">
                                </div>
                                <div class="m-l-10">
                                    <h5 class="m-b-0">
                                        <a href="" class="text-dark">Riley Newman</a>
                                    </h5>
                                    <span class="font-size-13 text-gray">Data Analyst</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5>Projects</h5>
                        <div class="m-t-20">
                            <div class="m-b-20 p-b-20 border-bottom">
                                <div class="media align-items-center m-b-15">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/others/coffee-app-thumb.jpg" alt="">
                                    </div>
                                    <div class="media-body m-l-20">
                                        <h5 class="m-b-0">
                                            <a href="" class="text-dark">Coffee Finder App</a>
                                        </h5>
                                    </div>
                                </div>
                                <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                <div class="d-inline-block">
                                    <a class="m-r-5" data-toggle="tooltip" title="Eugene Jordan" href="">
                                        <div class="avatar avatar-image avatar-sm">
                                            <img src="assets/images/avatars/thumb-6.jpg" alt="">
                                        </div>
                                    </a>
                                    <a class="m-r-5" data-toggle="tooltip" title="Pamela" href="">
                                        <div class="avatar avatar-image avatar-sm">
                                            <img src="assets/images/avatars/thumb-7.jpg" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="float-right">
                                    <span class="badge badge-pill badge-blue font-size-12 p-h-10">In Progress</span>
                                </div>
                            </div>
                            <div class="m-b-20 p-b-20 border-bottom">
                                <div class="media align-items-center m-b-15">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/others/weather-app-thumb.jpg" alt="">
                                    </div>
                                    <div class="media-body m-l-20">
                                        <h5 class="m-b-0">
                                            <a href="" class="text-dark">Weather App</a>
                                        </h5>
                                    </div>
                                </div>
                                <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                <div class="d-inline-block">
                                    <a class="m-r-5" data-toggle="tooltip" title="Lillian Stone" href="">
                                        <div class="avatar avatar-image avatar-sm">
                                            <img src="assets/images/avatars/thumb-8.jpg" alt="">
                                        </div>
                                    </a>
                                    <a class="m-r-5" data-toggle="tooltip" title="Victor Terry" href="">
                                        <div class="avatar avatar-image avatar-sm">
                                            <img src="assets/images/avatars/thumb-9.jpg" alt="">
                                        </div>
                                    </a>
                                    <a class="m-r-5" data-toggle="tooltip" title="Wilma Young" href="">
                                        <div class="avatar avatar-image avatar-sm">
                                            <img src="assets/images/avatars/thumb-10.jpg" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="float-right">
                                    <span class="badge badge-pill badge-cyan font-size-12 p-h-10">Completed</span>
                                </div>
                            </div>
                            <div class="m-b-20 p-b-20 border-bottom">
                                <div class="media align-items-center m-b-15">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/others/music-app-thumb.jpg" alt="">
                                    </div>
                                    <div class="media-body m-l-20">
                                        <h5 class="m-b-0">
                                            <a href="" class="text-dark">Music App</a>
                                        </h5>
                                    </div>
                                </div>
                                <p>Protein, iron, and calcium are some of the nutritional benefits associated with cheeseburgers.</p>
                                <div class="d-inline-block">
                                    <a class="m-r-5" data-toggle="tooltip" title="Darryl Day" href="">
                                        <div class="avatar avatar-image avatar-sm">
                                            <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                        </div>
                                    </a>
                                    <a class="m-r-5" data-toggle="tooltip" title="Virgil Gonzales" href="">
                                        <div class="avatar avatar-image avatar-sm">
                                            <img src="assets/images/avatars/thumb-4.jpg" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="float-right">
                                    <span class="badge badge-pill badge-cyan font-size-12 p-h-10">Completed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
</div>
</div>
<!-- Content Wrapper END -->
