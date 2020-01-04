<form class="f-register pl-3" method="post" name="formuser">
    <div class="col">
        <h1 class="text-title pt-2"><?php echo $data['page']['nome']; ?></h1>
        <hr class="pb-4">
    </div>
    <div class="form-group ml-3">
        <div class="row">
            <div class="col-md-6">
                <label for="matricula" class="pb-2 t-cel">Matricula:</label>
                <input type="text" readonly="true" class="form-control" id="matricula" value="<?php echo $data['page']['matricula'];?>">
            </div>

            <div class="col-md-6">
                <label for="setor" class="pb-2 t-cel">Setor:</label>
                <input type="text" class="form-control" id="setor" readonly="true" value="<?php echo $data['page']['setor'];?>">
            </div>

            <div class="col-md-6 mt-4">
                <label for="nome" class="pb-2 t-cel">Nome:</label>
                <input type="text" class="form-control"  id="nome" readonly="true" value="<?php echo $data['page']['nome'];?>">
            </div>

            <div class="col-md-6 mt-4">
                <label for="email" class="pb-2 t-cel">E-mail:</label>
                <input type="email" class="form-control" id="email" readonly="true" value="<?php echo $data['page']['email'];?>">
            </div>

            <div class="col-md-6 mt-4">
                <label for="cargo" class="pb-2 t-cel">Cargo:</label>
                <input type="text" class="form-control" id="cargo" readonly="true" value="<?php echo $data['page']['cargo'];?>">
            </div>
            <div class="col-md-6 mt-4">
                <label for="file__img" class="pb-2 t-cel">Anexar imagem:</label>
                <input type="file" class="d-flex" name="file" id="file__img">
            </div>

            <div class="col-md-6 mt-4">
                <label for="senha" class="pb-2 t-cel">Senha:</label><span class="obrigatorio"> *</span>
                <input type="password" class="form-control" required="true" name="senha" id="senha" value="">
            </div>

            <div class="col-md-6 mt-4">
                <label for="confirmar-senha" class="pb-2 t-cel">Confirmar Senha:</label><span class="obrigatorio"> *</span>
                <input type="password" class="form-control" required="true" name="rep_senha" id="confirmar-senha" value="">
            </div>
            
            <div class="col-12 mt-5 pt-1 t-cel">
                <hr>
                <button type="submit" class="btn btn_register" onclick="return validar();">Salvar</button>
                <a href="/painel" class="btn btn-dark">Voltar</a>
            </div>
        </div>
    </div>
</form>