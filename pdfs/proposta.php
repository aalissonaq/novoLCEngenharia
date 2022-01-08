<?php
date_default_timezone_set('America/Fortaleza');
require __DIR__ . '/../vendor/autoload.php';
?>
<html>

<head>
  <style>
    @page {
      margin: 130px 0px;
    }

    #header {
      position: fixed;
      left: 0px;
      top: -130px;
      right: 0px;
      height: 275px;
      background-image: url('<?= dirname(__DIR__, 1) ?>/pdfs/papel_timprado.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      z-index: -1;
    }

    #footer {
      position: fixed;
      left: 0px;
      bottom: -150px;
      right: 0px;
      height: 310px;
      opacity: 0.6;
      background-image: url('<?= dirname(__DIR__, 1) ?>/pdfs/papel_timprado.png');
      background-repeat: no-repeat;
      background-size: cover;
      background-position: bottom center;
      z-index: -1;
    }

    #footer .page:after {
      content: counter(page, georgian);
    }

    #content {
      position: relative;
      top: 85px;
      left: 10%;
      width: 82%;
    }

    .title {
      font-size: 25px;
      color: darkorange;
      margin-top: 4rem;
      text-align: right;
    }

    .title_p1 {
      font-size: 15px;
      color: darkorange;
      margin-top: 4rem;
      text-align: right;
    }

    .dtCapa {
      position: fixed;
      bottom: 5px;
      left: 30%;
      text-align: center;
      color: darkorange;
    }
  </style>

<body style="background-image: url(<?= dirname(__DIR__, 1) ?>/assets/images/bgpdf/logo_vert.png); background-repeat: no-repeat;background-position:right bottom; background-size: auto;">
  <div id="header">

  </div>
  <div id="footer">
    <p class="page">
    </p>
  </div>
  <div id="content">

    <p class="title">
      <i>
        Proposta Comercial Sistema de Energia Solar<br />
      </i>
      <small class="title_p1">
        ORÇAMENTO–PE&nbsp;<?= date('m/Y') ?>
      </small>
    </p>
    <div class="" style="margin-top: 10rem;">
      <span class="" style="font-size: 20px; font-weight: bold;">
        <b>
          NOME COMPLETO DO CLIENTE
        </b>
      </span><br />
      <small class="">
        CONSUMO – 400 kWH/mês
      </small><br />
      <small class="">
        GERAÇÃO – 3,35 kWp
      </small>
    </div>
    <div class="dtCapa">
      Petrolina-PE – <?= date('d/m/Y') ?>
    </div>

    <p style="page-break-before: always;"></p>
    <h2 class="titleH2" style="color:darkorange;">
      ESCOLHA A<br />
      LC ENGENHARIA
      </h1>
      <p style=" text-align: justify;">
        A LC Engenharia oferece soluções completas, adequadas ao perfil de cada cliente. Pensamos em todos os detalhes do seu projeto. O sistema inicial, a escolha dos melhores equipamentos e a execução são feitas por profissionais capacitados e habilitados presando sempre segurança e qualidade.
      </p>
      <h2 class="" style="color:darkorange; text-align: center;">
        NOSSA METODOLOGIA DE TRABALHO
      </h2>
      <div class="">
        <ul class="" style="list-style:none; text-align: justify;">
          <li>
            <span style="color:darkorange;">1. PROJETO</span>
            : Nossa equipe técnica fará uma visita técnica e levantará todos os dados e informações necessárias para a elaboração do seu projeto e então submete-lo a concessionária de energia.
          </li>
          <br />
          <li>
            <span style="color:darkorange;">2. APROVAÇÃO PELA CONCESSIONÁRIA DE ENERGIA</span>
            : Após o envio do projeto por nossa equipe técnica a concessionária tem, por norma da ANEEL (Agência Nacional de Energia Elétrica), um prazo de 15(quinze) dias para autorizar a instalação. Nossa equipe acompanhará diariamente todo o processo. NÃO PRECISA SE PREOCUPAR COM NADA.
          </li>
          <br />
          <li>
            <span style="color:darkorange;">3. INSTALAÇÃO</span>
            : Após a aprovação a nossa equipe entrará em contato para podermos agendar a instalação do seu SISTEMA SOLAR.
          </li>
          <br />
          <li>
            <span style="color:darkorange;">4. ATIVAÇÃO</span>
            : Logo após a instalação, a concessionária fará uma vistoria e irá trocar o seu relógio(medidor).
          </li>
        </ul>
        <h3 style=" opacity: 0.5; text-align:center;">
          PRONTO: VOCÊ JÁ ESTÁ GERANDO SUA PRÓPRIA ENERGIA
        </h3>
        <h2 class="" style="color:; text-align: center;">
          • TRABALHAMOS COM OS MELHORES FORNECEDORES <br />
          <span class="" style="color:orange; font-size: 10px; text-align:justify;">
            (Sujeito a alteração)
          </span>
        </h2>
        <p>
          <center>
            <img src="<?= dirname(__DIR__, 1) ?>/pdfs/fornecedores.png" alt="" style="margin-top: -25px;">
          </center>
        </p>
        <div class="">
          <h2 style="text-align:left; color:darkorange;">
            FUNCIONAMENTO E VANTAGENS
          </h2>
          <center>
            <img src="<?= dirname(__DIR__, 1) ?>/pdfs/funcionamento.png" alt="" style="align-items: center;">
          </center>
          <p>

          <ul class="" style="list-style:none; text-align: justify;">
            <li>
              <span style="color:darkorange;">1. PAINEL SOLAR </span>
              : Capta a energia da luz solar e a transforma em energia elétrica..
            </li>
            <br />
            <li>
              <span style="color:darkorange;">2. INVERSOR</span>
              : Transforma a energia gerada pelos painéis para o padrão da rede elétrica da concessionária.
            </li>
            <br />
            <li>
              <span style="color:darkorange;">3. ENERGIA</span>
              : A energia gerada vai para o quadro de luz para que você possa utiliza-la em todos os seus aparelhos elétricos.
            </li>
            <br />
            <li>
              <span style="color:darkorange;">4. MEDIDOR DE ENERGIA</span>
              : Registrará os valores de geração de energia própria e a energia consumida da concessionária
            </li>
            <br />
            <li>
              <span style="color:darkorange;">5. BENEFÍCIO</span>
              : Quando a geração de energia é maior que o consumo, a energia excedente é enviada para a rede elétrica gerando créditos
            </li>
          </ul>
          <h2 style="color:darkorange; text-align:center;">
            INVESTIMENTO SEGURO E RETORNO GARANTIDO
          </h2>
          <ul>
            <li>Reduza até 95% do seu consumo na conta de LUZ;</li>
            <li>Valorização do seu estabelecimento ou sua residência;</li>
            <li>No mínimo 20 anos de energia grátis após o retorno do seu investimento.</li>
          </ul>
          </p>
          <p style="page-break-before: always;"></p>
          <h2 style="color:darkorange;">
            FACILIDADES
          </h2>
          <ul>
            <li>Instalação rápida e sem necessidade de obras – em média a instalação dura 4 dias;</li>
            <li>Baixíssima manutenção - basicamente limpeza e verificações.</li>
          </ul>

          <h2 style="color:darkorange;">
            ENERGIA LIMPA E INFINITA
          </h2>
          <ul>
            <li>Energia 100% renovável;</li>
            <li>Sem ruídos e sem emissão de gases poluentes;</li>
            <li>• Redução do impacto ambiental.</li>
          </ul>


        </div>


      </div>
  </div>
</body>

</html>
