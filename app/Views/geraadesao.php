<div id="content-container">
    <h1>Dados da Adesão</h1>


    <form action="<?= $url_base ?>/GeraAdesoes/Gera_Adesao" method="post" class="form-contrato">
        <h5>Dados da proposta</h5>
        <div class="form-grid">

            <label>DATA DO VENCIMENTO
                <select id="DT_VENCIMENTO" name="DT_VENCIMENTO" >
                    <option value="">Selecione...</option>
                    <option value="05" <?= set_select('DT_VENCIMENTO', 'solteiro'); ?>>DIA 05</option>
                    <option value="10" <?= set_select('DT_VENCIMENTO', 'casado'); ?>>DIA 10</option>
                    <option value="15" <?= set_select('DT_VENCIMENTO', 'divorciado'); ?>>DIA 15</option>
                    <option value="20" <?= set_select('DT_VENCIMENTO', 'viuvo'); ?>>DIA 20</option>
                    <option value="25" <?= set_select('DT_VENCIMENTO', 'separado'); ?>>DIA 25</option>
                    <option value="30" <?= set_select('DT_VENCIMENTO', 'outro'); ?>>DIA 30</option>
                </select>
            </label>

            <label>Unidade de Venda
                <input type="text" name="nome" required value="<?= set_value('nome') ?>">
            </label>

            <label>Tipo de Contrato
                <input type="text" name="nome" required value="<?= set_value('nome') ?>">
            </label>
        </div> 
         <h5>Dados do contrato</h5>
        <div class="form-grid">

             <label>Metodo de Venda
                <input type="text" name="metodo_venda" required value="<?= set_value('metodo_venda') ?>">
            </label>

            <label>Unidade de Venda
                <input type="text" name="nome" required value="<?= set_value('nome') ?>">
            </label>

            <label>Tipo de Contrato
                <input type="text" name="nome" required value="<?= set_value('nome') ?>">
            </label>
            </div>
            <div class="form-grid">

            <label>Nome
                <input type="text" name="nome" required value="<?= set_value('nome') ?>">
            </label>

            <label>Data de Nascimento
                <input type="date" name="data_nascimento"  value="<?= set_value('data_nascimento') ?>">
            </label>

            <label>Telefone
                <input type="text" name="telefone" value="<?= set_value('telefone') ?>">
            </label>

            <label>Nome da Mãe
                <input type="text" name="mae"  value="<?= set_value('mae') ?>">
            </label>

            <label>Nome da Pai
                <input type="text" name="pai" value="<?= set_value('pai') ?>">
            </label>

            <label>CPF
                <input type="text" name="cpf"  value="<?= set_value('cpf') ?>">
            </label>

            <label>CNS
                <input type="text" name="cns"  value="<?= set_value('cns') ?>">
            </label>

            <label>Sexo
                <select name="sexo" >
                    <option value="">Selecione...</option>
                    <option value="M" <?= set_select('sexo', 'masculino'); ?>>Masculino</option>
                    <option value="F" <?= set_select('sexo', 'feminino'); ?>>Feminino</option>
                    <option value="O" <?= set_select('sexo', 'outro'); ?>>Outro</option>
                    <option value="NF" <?= set_select('sexo', 'nao_informar'); ?>>Não Informado</option>
                </select>
            </label>

            <label> Estado Civil
                <select id="estado_civil" name="estado_civil" >
                    <option value="">Selecione...</option>
                    <option value="solteiro" <?= set_select('estado_civil', 'solteiro'); ?>>Solteiro(a)</option>
                    <option value="casado" <?= set_select('estado_civil', 'casado'); ?>>Casado(a)</option>
                    <option value="divorciado" <?= set_select('estado_civil', 'divorciado'); ?>>Divorciado(a)</option>
                    <option value="viuvo" <?= set_select('estado_civil', 'viuvo'); ?>>Viúvo(a)</option>
                    <option value="separado" <?= set_select('estado_civil', 'separado'); ?>>Separado(a)</option>
                    <option value="outro" <?= set_select('estado_civil', 'outro'); ?>>Outro</option>
                </select>
            </label>

            <label>Endereço
                <input type="text" name="endereco"  value="<?= set_value('endereco') ?>">
            </label>

            <label>Bairro
                <input type="text" name="bairro"  value="<?= set_value('bairro') ?>">
            </label>

            <label>Município
                <input type="text" name="municipio"  value="<?= set_value('municipio') ?>">
            </label>

            <label>UF
                <input type="text" name="uf" maxlength="2"  value="<?= set_value('uf') ?>">
            </label>

            <label>CEP
                <input type="text" name="cep"  value="<?= set_value('cep') ?>">
            </label>

            <label>Numéro
                <input type="text" name="numero"  value="<?= set_value('numero') ?>">
            </label>

            <label>Complemento
                <input type="text" name="complemento"  value="<?= set_value('complemento') ?>">
            </label>

            
             <label>Email
                <input type="text" name="email"  value="<?= set_value('email') ?>">
            </label>
        </div>
        
        <div id="dependentes-container">
            <div id="dependente-template" style="display:none;">
                <div class="dependente">
                    <hr>
                    <h5>Dependente</h5>
                    <div class="form-grid">
                        <label>Nome
                            <input type="text" name="dependente[nome][]" >
                        </label>

                        <label>Data de Nascimento
                            <input type="date" name="dependente[data_nascimento][]" >
                        </label>
                         <label>Telefone
                            <input type="text" name="dependente[telefone][]" value="<?= set_value('dependente[telefone][]') ?>">
                        </label>
                         <label>Nome da Mãe
                            <input type="text" name="dependente[mae][]"  value="<?= set_value('dependente[mae][]') ?>">
                        </label>

                        <label>Nome da Pai
                            <input type="text" name="dependente[pai][]" value="<?= set_value('dependente[pai][]') ?>">
                        </label>

                         <label>CPF
                            <input type="text" name="dependente[cpf][]">
                        </label>
                        <label>CNS
                            <input type="text" name="dependente[cns][]"  value="<?= set_value('dependente[cns][]') ?>">
                        </label>

                        <label>Sexo
                            <select name="dependente[sexo][]" >
                                <option value="">Selecione...</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                                <option value="O">Outro</option>
                            </select>
                        </label>
                       
                        <label> Estado Civil
                            <select id="estado_civil" name="dependente[estado_civil][]" >
                                <option value="">Selecione...</option>
                                <option value="solteiro" <?= set_select('dependente[estado_civil][]', 'solteiro'); ?>>Solteiro(a)</option>
                                <option value="casado" <?= set_select('dependente[estado_civil][]', 'casado'); ?>>Casado(a)</option>
                                <option value="divorciado" <?= set_select('dependente[estado_civil][]', 'divorciado'); ?>>Divorciado(a)</option>
                                <option value="viuvo" <?= set_select('dependente[estado_civil][]', 'viuvo'); ?>>Viúvo(a)</option>
                                <option value="separado" <?= set_select('dependente[estado_civil][]', 'separado'); ?>>Separado(a)</option>
                                <option value="outro" <?= set_select('dependente[estado_civil][]', 'outro'); ?>>Outro</option>
                            </select>
                        </label>
                        <label> Grau de Parentesco
                            <select id="parentesco" name="dependente[parentesco][]" >
                                <option value="">Selecione...</option>
                                <option value="conjuge" <?= set_select('dependente[parentesco][]', 'conjuge'); ?>>conjuge</option>
                                <option value="filho" <?= set_select('dependente[parentesco][]', 'filho'); ?>>filho</option>
                                <option value="filha" <?= set_select('dependente[parentesco][]', 'filha'); ?>>filha</option>
                            </select>
                        </label>
                         <label>Email
                            <input type="text" name="dependente[email][]"  value="<?= set_value('dependente[email][]') ?>">
                        </label>
                    </div>
                    <div class="botoes-form">
                        <button type="button" class="btn remove">Remover</button>
                    </div>

                    <hr>
                </div>
            </div>
        </div>

        <div class="botoes-form">
            <a href="<?= $url_base ?>/home/GeraAdesao" class="btn limpar">Limpar</a>
            <button type="button" id="add-dependente" class="btn incluir">Incluir Dependente</button>
            <button type="submit" class="btn enviar">Enviar</button>
        </div>



    </form>
</div>