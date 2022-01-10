<?php
date_default_timezone_set('America/Fortaleza');
// require dirname(__DIR__, 1) . '/vendor/autoload.php';

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
      top: 83px;
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
      color: #212761;
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

    table tbody tr:nth-child(2n+2) {
      background: #FFE4B5;
      opacity: 0.4;
    }
  </style>

<body style="background-image: url(<?= dirname(__DIR__, 1) ?>/pdfs/logo_vert.png); background-repeat: no-repeat;background-position:right bottom; background-size: auto;">
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
    <div class="" style="margin-top: 10rem; color: #212761">
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
          <h2 style="text-align:left; color:darkorange; page-break-before: always;">
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
          <h2 style="color:darkorange;">
            FACILIDADES
          </h2>
          <ul>
            <li>Instalação rápida e sem necessidade de obras – em média a instalação dura 4 dias;</li>
            <li>Baixíssima manutenção - basicamente limpeza e verificações.</li>
          </ul>

          <h2 style="color:darkorange; page-break-before: always;">
            ENERGIA LIMPA E INFINITA
          </h2>
          <ul>
            <li>Energia 100% renovável;</li>
            <li>Sem ruídos e sem emissão de gases poluentes;</li>
            <li>• Redução do impacto ambiental.</li>
          </ul>
          <div class="">
            <h2 style="color:darkorange;">
              INFORMAÇÕES GERAIS
            </h2>
            <div style="display:flex;">
              <div style="width: 60%; line-height: 150%;">
                <span style="font-weight: bold; text-transform: uppercase;">Titular:</span>
                <span style="font-size: 0.9rem;">
                  Antonio Alisson Almeida Queiroz Sistemas
                </span>
                <span style="font-weight: bold; text-transform: uppercase;">Número do contrato:</span>
                <span style="font-size: 0.9rem;">
                  0000000000
                </span>
                <span style="font-weight: bold; text-transform: uppercase;">Localização:</span>
                <span style="font-size: 0.9rem;">
                  Rua João de Deus, nº 0, Centro, São Paulo - SP
                </span>
                <br />
                <span style="font-weight: bold; text-transform: uppercase;">Custo médio:</span>
                <span style="font-size: 0.9rem;">
                  R$ 500,00
                </span>
                <br />
                <span style="font-weight: bold; text-transform: uppercase;">Área utilizada:</span>
                <span style="font-size: 0.9rem;">
                  50 m²
                </span>
              </div>
              <div style="position: relative;width: 40%; left: 60%; line-height: 150%;">
                <span style="font-weight: bold; text-transform: uppercase;">
                  CNPJ/CPF:
                </span>
                <span style="font-size: 0.9rem;">
                  00.000.000/0000-00
                </span>
                <br />
                <br />
                <span style="font-weight: bold; text-transform: uppercase;">
                  Tipo de Imóvel:
                </span>
                <span style="font-size: 0.9rem;">
                  Residencial
                </span>
                <br />
                <br />
                <span style="font-weight: bold; text-transform: uppercase;">
                  Consumo Médio:
                </span>
                <span style="font-size: 0.9rem;">
                  R$ 500,00
                </span>
                <span style="font-weight: bold; text-transform: uppercase;">
                  Economia mensal:
                </span>
                <span style="font-size: 0.9rem;">
                  R$ 450,00
                </span>
              </div>
            </div>
          </div>
          <div class="" style="margin-top:-9rem;">
            <h2 style="color:darkorange;">
              SISTEMA SOLAR
            </h2>
            <table border="0" style=" width: 100%; border-style: solid; border-collapse:collapse; text-align: center;">
              <thead style="color:#213671; background-color:orange; border-bottom-color: indigo;">
                <tr>
                  <th>EQUIPAMENTO</th>
                  <th>MODELO</th>
                  <th>QUANTIDADE</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Painel Solar</td>
                  <td>BYD 335 PHK 36 – POLI</td>
                  <td>10</td>
                </tr>
                <tr>
                  <td>Inversor</td>
                  <td>Growatt - 3,0KW</td>
                  <td>1</td>
                </tr>
                <tr>
                  <td>Cabos solares e conectores</td>
                  <td>Conduspar e Multicontact</td>
                  <td>Adequado ao projeto</td>
                </tr>
                <tr>
                  <td>Estrutura de Fixação</td>
                  <td>Telha Colonial</td>
                  <td>Estrutura para 10 módulos</td>
                </tr>
              </tbody>
            </table>
            <table border="0" style=" width: 100%; border-style: solid; border-collapse:collapse; text-align: center;">
              <thead style="color:#213671; background-color:orange; border-bottom-color: indigo;">
                <tr>
                  <th colspan="2">SERVIÇOS</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="text-align:start;">Projeto e regularização do sistema</td>
                  <td>INCLUSO</td>
                </tr>
                <tr>
                  <td style="text-align:start;">Instalação completa e Comissionamento</td>
                  <td>INCLUSO</td>
                </tr>
              </tbody>
            </table>
            <table border="0" style=" width: 100%; border-style: solid; border-collapse:collapse; text-align: center;">
              <thead style="color:#213671; background-color:orange; border-bottom-color: indigo;">
                <tr>
                  <th colspan="2">ADICIONAIS</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="text-align:start;">Material e instalação</td>
                  <td>INCLUSO</td>
                </tr>
                <tr>
                  <td style="text-align:start;">Monitoramento Remoto</td>
                  <td>INCLUSO NO INVERSOR</td>
                </tr>
              </tbody>
            </table>
            <table border="0" style=" width: 100%; border-style: solid; border-collapse:collapse; text-align: center;">
              <thead style="color:#213671; background-color:orange; border-bottom-color: indigo;">
                <tr>
                  <th colspan="2">BÔNUS</th>
                </tr>
              </thead>
              <tbody>
                <tr style="text-align: center; font-weight: bold;">
                  <td>Retroft da Instalação elétrica </td>
                  <td>SERVIÇO INCLUSO</td>
                </tr>
              </tbody>
            </table>
          </div>
          <hr />
          <div class="">
            <h2 style="color:darkorange;">
              GARANTIAS
            </h2>
            <div style=" margin-top:-2rem;">
              <ul>
                <li>Painéis : 10 anos contra defeitos de fabricação e 25 anos de até 80% da eficiência;</li>
                <li>Inversor; 5 anos contra defeito de fabricação</li>
                <li>Stringboxes, Cabos e conectores: 18 meses</li>
                <li>Instalação: 12 meses</li>
                <li>Não está incluso neste orçamento nenhuma obra civil, pintura ou qualquer tipo de reforma que seja necessária decorrente da instalação do sistema fotovoltaico.</li>
              </ul>
              <p>
                <b>
                  OBS:
                </b>
                Este orçamento tem validade de 10 dias corridos a contar da data da solicitação.
              </p>
            </div>
          </div>
          <div style="">
            <h2 style="color:darkorange;">
              PROPOSTA
            </h2>
            <table border="0" style=" width: 100%; border-style: solid; border-collapse:collapse; text-align: center;">

              <tbody style="">
                <tr>
                  <td style="text-align: start;">Material</td>
                  <td style="text-align:right;">R$ 14.736,92</td>
                </tr>

                <tr style="text-align: center; ">
                  <td style="text-align: start;">Instalação</td>
                  <td style="text-align: right;">R$ 3.690,98</td>
                </tr>
                <tr style="text-align: center;font-weight: bold; ">
                  <td style="">TOTAL</td>
                  <td style="text-align: right;">R$ 18.454,90</td>
                </tr>

              </tbody>
            </table>
          </div>
          <div>
            <h2 style="color:darkorange;">
              FINANCIAMENTO DA SUA GERAÇÃO
            </h2>
            <img src="<?= dirname(__DIR__, 1) . '/pdfs/image_feliz.jpg' ?>" alt="financiamento" style="width: 100%;">
            <img src="<?= dirname(__DIR__, 1) . '/pdfs/financiamentopng.png' ?>" alt="financiamento" style="width: 100%;">
          </div>
          <!-- <p style="page-break-after: always;"></p> -->
          <div style="">
            <h2 style="color:darkorange;">
              TEMPO DE RETORNO (2 ANOS E 10 MESES)
            </h2>
            <img src="<?= dirname(__DIR__, 1) . '/pdfs/payback.png' ?>" alt="financiamento" style="width: 100%;">
          </div>


          <p class="title">
            <i>
              LC ENGENHARIA<br />
            </i>
            <small class="title_p1">
              ENTRE NESSA GERAÇÃO
            </small>
          </p>
          <br />

          <p style="text-align:right;">
            <small>Estamos a sua disposição</small>
          </p>
        </div>
</body>

</html>
