<main class="grid grid-main">
    <div class="content-container">


        <div class="busca-container">

            <!-- ESQUERDA (FORM) -->
            <div class="busca-form">
                <form action="<?= base_url('Consultas_banco/busca_contrato') ?>" method="post" class="form-contrato">

                    <h5>Busca Contrato</h5>

                    <div class="form-grid">
                        <label>CONTRATO
                            <input type="text" name="contrato" required>
                        </label>
                    </div>

                    <div class="botoes-form">
                        <button type="submit" class="btn enviar">Buscar</button>
                    </div>

                </form>
            </div>

            <!-- DIREITA (RESULTADO) -->
            <div class="busca-resultado">

                <?php if (!empty($buscou)): ?>

                    <?php if (!empty($consulta)): ?>

                        <div class="resultado-card">

                            <div class="topo">
                                <div>
                                    <span>Contrato</span>
                                    <strong><?= $consulta['CD_CONTRATO'] ?></strong>
                                </div>

                                <div>
                                    <span>Matrícula</span>
                                    <strong><?= $consulta['CD_MATRICULA'] ?></strong>
                                </div>

                                <div>
                                    <span>Vendedor</span>
                                    <strong><?= $consulta['CD_VENDEDOR'] ?></strong>
                                </div>
                            </div>

                            <hr class="linha-vermelha">

                            <div class="responsavel">
                                <span>Responsável</span>
                                <strong><?= $consulta['NM_RESPONSAVEL_FINANCEIRO'] ?></strong>
                            </div>

                        </div>

                    <?php else: ?>
                        <p class="mensagem">Nenhum resultado encontrado.</p>
                    <?php endif; ?>

                <?php endif; ?>

            </div>

        </div>


        <?php if (!empty($buscou) && !empty($consulta)): ?>
                <?php if ($consulta['TP_CONTRATO'] == 'I'): ?>
                
                    <div class="proximo-container">
                        <form action="<?= base_url('home/CriarPropostaDependente') ?>" method="post">
                        <input type="hidden" name="contrato" value="<?= $consulta['CD_CONTRATO'] ?>">
                            <button type="submit" class="btn-proximo-grande">
                            Criar Proposta
                            </button>
                        </form>

                    </div>
                    <?php else: ?>
                    <p class="mensagem">Contrato Empresarial</p>
                <?php endif; ?>
        <?php endif; ?>

    </div>


</main>