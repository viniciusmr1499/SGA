<form class="f-register pl-3" method="post">
    <div class="col">
        <h1 class="text-title pt-2">Cadastro de Usuário</h1>
        <hr class="pb-4">
    </div>
    <div class="form-group ml-3">
        <div class="row">
            <div class="col-md-6">
                <label for="matricula" class="pb-2 t-cel">Matricula</label>
                <input type="text" class="form-control" required="true" name="matricula" id="matricula" placeholder="006216">
            </div>
            <div class="col-md-6 ">
                <label for="nome" class="pb-2 t-cel">Nome</label>
                <input type="text" class="form-control" name="nome" required="true" id="nome" placeholder="Vinicius">
            </div>
            <div class="col-md-6 mt-4">
                <label for="cargo" class="pb-2 t-cel">Cargo</label>
                <input type="text" class="form-control" name="cargo" id="cargo" placeholder="Aprendiz">
            </div>
            
            <div class="col-md-6 mt-4">
                <label for="setor" class="pb-2 t-cel">Setor</label>
                <input type="text" class="form-control" name="setor" id="setor" placeholder="TIC">
            </div>
            <div class="col-md-6 mt-4">
                <label for="email" class="pb-2 t-cel">E-mail</label>
                <input type="email" class="form-control" name="email" required="true" id="email" placeholder="@aerisenergy.com.br">
            </div>
            <div class="col-md-6 mt-4">
                <label for="file__img" class="pb-2 t-cel">Anexar imagem</label>
                <input type="file" class="d-flex" name="file" id="file__img">
            </div>
            <div class="col-md-6 mt-4">
                <label for="senha" class="pb-2 t-cel">Senha</label>
                <input type="password" class="form-control" name="senha" id="senha">
            </div>
            <div class="col-md-6 mt-4">
                <label for="confirmar-senha" class="pb-2 t-cel">Confirmar Senha</label>
                <input type="password" class="form-control" name="senha" id="confirmar-senha">
            </div>
            
            <div class="col-12 mt-2 pt-1 t-cel">
                <hr>
                <button type="submit" class="btn btn_register">Cadastrar</button>
            </div>
        </div>
    </div>
</form>