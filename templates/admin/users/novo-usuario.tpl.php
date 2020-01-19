<form class="f-register pl-3" method="post" enctype="multipart/form-data">
    <div class="col">
        <h1 class="text-title pt-2">Cadastro de Usuário</h1>
        <hr class="pb-4">
    </div>
    <div class="form-group ml-3">
        <div class="row">
            <div class="col-md-6">
                <label for="matricula" class="pb-2 t-cel">Matricula:</label><span class="obrigatorio"> *</span>
                <input type="text" class="form-control" required="true" name="matricula" id="matricula" placeholder="006216">
            </div>
            <div class="col-md-6 ">
                <label for="nome" class="pb-2 t-cel">Nome Completo:</label><span class="obrigatorio"> *</span>
                <input type="text" class="form-control" name="nomeCompleto" required="true" id="nome" placeholder="Vinicius">
            </div>
            <div class="col-md-6 mt-4">
                <label for="cargo" class="pb-2 t-cel">Cargo:</label><span class="obrigatorio"> *</span>
                <input type="text" class="form-control" required="true" name="cargo" id="cargo" placeholder="Aprendiz">
            </div>
            
            <div class="col-md-6 mt-4">
                <label for="setor" class="pb-2 t-cel">Setor:</label><span class="obrigatorio"> *</span>
                <input type="text" class="form-control" required="true" name="setor" id="setor" placeholder="TIC">
            </div>
            <div class="col-md-6 mt-4">
                <label for="email" class="pb-2 t-cel">E-mail:</label><span class="obrigatorio"> *</span>
                <input type="email" class="form-control" name="email" required="true" id="email" placeholder="@aerisenergy.com.br">
            </div>
            <div class="col-md-6 mt-4">
                <label for="anexo" class="pb-2 t-cel">Anexar imagem:</label>
                <input type="file" class="d-flex" name="file" class="file" id="anexo">
            </div>

            <div class="col-md-6 mt-4">
                <label for="nivel" class="pb-2 t-cel">Perfil do Usuário:</label><span class="obrigatorio"> *</span>
                <select requried name="nivel" id="nivel" class="form-control">
                    <option value="">Selecione:</option>
                    <option value="0">COMUM</option>
                    <option value="1">ADMINISTRADOR</option>
                </select>
            </div>
            <!-- <div class="col-md-6 mt-4">
                <label for="senha" class="pb-2 t-cel">Senha:</label><span class="obrigatorio"> *</span>
                <input type="password" required class="form-control" name="senha">
            </div>
            <div class="col-md-6 mt-4">
                <label for="confirmar-senha" class="pb-2 t-cel">Confirmar Senha:</label><span class="obrigatorio"> *</span>
                <input type="password" required class="form-control" name="rep_senha" id="confirmar-senha">
            </div> -->
            
            <div class="col-12 mt-2 pt-1 t-cel">
                <hr>
                <button type="submit" class="btn btn_register">Salvar</button>
                <a href="/admin/users" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
</form>