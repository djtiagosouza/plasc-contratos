<main class="grid grid-main">
<div class="content-container">
    <h1 class="h1">Dados da Adesão</h1>

    <form action="<?= $url_base ?>/GeraAdesoes/Gera_Adesao" method="post" class="form-contrato">

        <!-- ==============================
             DADOS DA PROPOSTA
        =============================== -->
        <h5>DADOS DA PROPOSTA</h5>

        <div class="form-grid">
            <label>DATA DO VENCIMENTO
                <select id="dt_vencimento" name="dt_vencimento">
                    <option value="">Selecione...</option>
                    <option value="05" <?= set_select('dt_vencimento', '05'); ?>>DIA 05</option>
                    <option value="10" <?= set_select('dt_vencimento', '10'); ?>>DIA 10</option>
                    <option value="15" <?= set_select('dt_vencimento', '15'); ?>>DIA 15</option>
                    <option value="20" <?= set_select('dt_vencimento', '20'); ?>>DIA 20</option>
                    <option value="25" <?= set_select('dt_vencimento', '25'); ?>>DIA 25</option>
                    <option value="30" <?= set_select('dt_vencimento', '30'); ?>>DIA 30</option>
                </select>
            </label>

            <label>UNIDADE DE VENDA
                <select id="unidade_venda" name="unidade_venda">
                    <option value="">Selecione...</option>
                    <option value="1" <?= set_select('unidade_venda', '1'); ?>>UNIDADE RIO BRANCO</option>
                    <option value="2" <?= set_select('unidade_venda', '2'); ?>>UNIDADE SANTA CASA</option>
                    <option value="3" <?= set_select('unidade_venda', '3'); ?>>UNIDADE BRAZ BERNARDINO</option>
                    <option value="4" <?= set_select('unidade_venda', '4'); ?>>SANTOS DUMONT</option>
                    <option value="5" <?= set_select('unidade_venda', '5'); ?>>RIO POMBA</option>
                    <option value="6" <?= set_select('unidade_venda', '6'); ?>>LIMA DUARTE</option>
                    <option value="7" <?= set_select('unidade_venda', '7'); ?>>UNIDADE BENFICA</option>
                    <option value="8" <?= set_select('unidade_venda', '8'); ?>>SAO JOAO NEPOMUCENO</option>
                </select>
            </label>
        </div>

        <!-- ==============================
             DADOS DO TITULAR
        =============================== -->
        <h5>DADOS DO TITULAR</h5>

        <div class="form-grid">
            <label>Nome
                <input type="text" name="nome" required value="<?= set_value('nome') ?>">
            </label>

            <label>Data de Nascimento
                <input type="date" name="data_nascimento" value="<?= set_value('data_nascimento') ?>">
            </label>

            <label>Telefone
                <input type="text" name="telefone" value="<?= set_value('telefone') ?>">
            </label>

            <label>Nome da Mãe
                <input type="text" name="mae" value="<?= set_value('mae') ?>">
            </label>

            <label>Nome do Pai
                <input type="text" name="pai" value="<?= set_value('pai') ?>">
            </label>

            <label>CPF
                <input type="text" name="cpf" value="<?= set_value('cpf') ?>">
            </label>

            <label>CNS
                <input type="text" name="cns" value="<?= set_value('cns') ?>">
            </label>

            <label>Sexo
                <select name="sexo">
                    <option value="">Selecione...</option>
                    <option value="M" <?= set_select('sexo', 'M'); ?>>Masculino</option>
                    <option value="F" <?= set_select('sexo', 'F'); ?>>Feminino</option>
                    <option value="O" <?= set_select('sexo', 'O'); ?>>Outro</option>
                </select>
            </label>

            <label>Estado Civil
                <select id="estado_civil" name="estado_civil">
                    <option value="">Selecione...</option>
                    <option value="S" <?= set_select('estado_civil', 'S'); ?>>Solteiro(a)</option>
                    <option value="C" <?= set_select('estado_civil', 'C'); ?>>Casado(a)</option>
                    <option value="D" <?= set_select('estado_civil', 'D'); ?>>Divorciado(a)</option>
                    <option value="V" <?= set_select('estado_civil', 'V'); ?>>Viúvo(a)</option>
                    <option value="O" <?= set_select('estado_civil', 'O'); ?>>Outros</option>
                </select>
            </label>

            <label>Endereço
                <input type="text" name="endereco" value="<?= set_value('endereco') ?>">
            </label>

            <label>Bairro
                <input type="text" name="bairro" value="<?= set_value('bairro') ?>">
            </label>

            <label>Município
                <input type="text" name="municipio" value="<?= set_value('municipio') ?>">
            </label>

            <label>UF
                <input type="text" name="uf" maxlength="2" value="<?= set_value('uf') ?>">
            </label>

            <label>CEP
                <input type="text" name="cep" value="<?= set_value('cep') ?>">
            </label>

            <label>Número
                <input type="text" name="numero" value="<?= set_value('numero') ?>">
            </label>

            <label>Complemento
                <input type="text" name="complemento" value="<?= set_value('complemento') ?>">
            </label>

            <label>Email
                <input type="text" name="email" value="<?= set_value('email') ?>">
            </label>
        </div>

        <!-- ==============================
             DEPENDENTES
        =============================== -->
        <div id="dependentes-container">

            <!-- TEMPLATE DO DEPENDENTE (oculto) -->
            <div id="dependente-template" style="display:none;">
                <div class="dependente">
                    <hr>
                    <h5>Dependente</h5>

                    <div class="form-grid">

                        <label>Nome
                            <input type="text" name="dependente[nome][]">
                        </label>

                        <label>Data de Nascimento
                            <input type="date" name="dependente[data_nascimento][]">
                        </label>

                        <label>Telefone
                            <input type="text" name="dependente[telefone][]">
                        </label>

                        <label>Nome da Mãe
                            <input type="text" name="dependente[mae][]">
                        </label>

                        <label>Nome do Pai
                            <input type="text" name="dependente[pai][]">
                        </label>

                        <label>CPF
                            <input type="text" name="dependente[cpf][]">
                        </label>

                        <label>CNS
                            <input type="text" name="dependente[cns][]">
                        </label>

                        <label>Sexo
                            <select name="dependente[sexo][]">
                                <option value="">Selecione...</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                                <option value="O">Outro</option>
                            </select>
                        </label>

                        <label>Estado Civil
                            <select name="dependente[estado_civil][]">
                                <option value="">Selecione...</option>
                                <option value="S">Solteiro(a)</option>
                                <option value="C">Casado(a)</option>
                                <option value="D">Divorciado(a)</option>
                                <option value="V">Viúvo(a)</option>
                                <option value="O">Outros</option>
                            </select>
                        </label>

                        <label>Parentesco
                            <select name="dependente[parentesco][]">
                                <option value="">Selecione...</option>
                                <option value="D">conjuge</option>
                                <option value="D">filho</option>
                                <option value="D">filha</option>
                            </select>
                        </label>

                        <label>Email
                            <input type="text" name="dependente[email][]">
                        </label>
                    </div>

                    <!-- Apenas botão remover -->
                    <div class="botoes-form">
                        <button type="button" class="btn remove">Remover</button>
                    </div>
                    <hr>
                </div>
            </div>

        </div>

        <!-- ==============================
             BOTÕES FINAIS DO FORM
        =============================== -->
        <div class="botoes-form">
            <a href="<?= $url_base ?>/home/GeraAdesao" class="btn limpar">Limpar</a>

            <button type="button" id="add-dependente" class="btn incluir">
                Incluir Dependente
            </button>

            <button type="submit" class="btn enviar">
                Enviar
            </button>
        </div>

    </form>
</div>
</main>