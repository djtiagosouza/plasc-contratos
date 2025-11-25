<aside class="collapsed">
  <div class="brand">
    <a href="<?= $url_base?>/home/Principal">Plasc</a>

  </div>

  <div class="brand">
    <p style="text-align: center"><?= session()->get('usuario_logado'); ?></p>
  </div>
  <div class="sair">
    <a href="<?= $url_base ?>/home/Logout">Sair</a>
  </div>
  <hr class="linha-vermelha">

  <nav class="collapsed">
    <!-- MENU: CONSULTA -->
    <button class="menu-collapse" type="button" data-toggle="collapse" data-target="#myContent" aria-expanded="false" aria-controls="collapseExample">
      <span class="caret"></span> Consulta
    </button>

    <div class="collapse" id="myContent">
      <ul class="nav">
        <li>
          <a href="#">
            <svg class="lnr lnr-briefcase">
              <use xlink:href="#lnr-briefcase"></use>
            </svg>
            Pasta
          </a>
        </li>
        <li>
          <a href="#">
            <svg class="lnr lnr-envelope">
              <use xlink:href="#lnr-envelope"></use>
            </svg>
            Envelopes
          </a>
        </li>
        <li>
          <a href="#">
            <svg class="lnr lnr-user">
              <use xlink:href="#lnr-user"></use>
            </svg>
            Segnatário
          </a>
        </li>
      </ul>
    </div>

    <!-- MENU: INDIVIDUAL -->
    <button class="menu-collapse" type="button" data-toggle="collapse" data-target="#mainContent" aria-expanded="false" aria-controls="collapseExample">
      <span class="caret"></span> Individual
    </button>

    <div class="collapse" id="mainContent">
      <ul class="nav">
        <li>
          <a href="<?= $url_base ?>/home/GeraContrato">
            <svg class="lnr lnr-file-add">
              <use xlink:href="#lnr-file-add"></use>
            </svg>
            Gerar Contrato
          </a>
        </li>
        <li>
          <a href="<?= $url_base ?>/home/GeraAdesao">
            <svg class="lnr lnr-users">
              <use xlink:href="#lnr-users"></use>
            </svg>
            Adesão
          </a>
        </li>
        <li>
          <a href="#">
            <svg class="lnr lnr-cross-circle">
              <use xlink:href="#lnr-cross-circle"></use>
            </svg>
            Vazio
          </a>
        </li>
      </ul>
    </div>

    <!-- MENU: EMPRESARIAL -->
    <button class="menu-collapse" type="button" data-toggle="collapse" data-target="#fundNavigation" aria-expanded="false" aria-controls="collapseExample">
      <span class="caret"></span> Empresarial
    </button>

    <div class="collapse" id="fundNavigation">
      <ul class="nav">
        <li>
          <a href="<?= $url_base ?>/home/GeraContratoEmpresarial">
            <svg class="lnr lnr-file-add">
              <use xlink:href="#lnr-file-add"></use>
            </svg>
            Gerar Contrato
          </a>
        </li>
        <li>
          <a href="#">
            <svg class="lnr lnr-cross-circle">
              <use xlink:href="#lnr-cross-circle"></use>
            </svg>
            Vazio
          </a>
        </li>
        <li>
          <a href="#">
            <svg class="lnr lnr-cross-circle">
              <use xlink:href="#lnr-cross-circle"></use>
            </svg>
            Vazio
          </a>
        </li>
      </ul>
    </div>
  </nav>
</aside>