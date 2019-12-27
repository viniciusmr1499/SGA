<form class="f-register pl-3" method="POST">
    <div class="col">
        <h1 class="text-title pt-2"><?php echo $data['page']['nome'];?></h1>
        <hr class="pb-4">
    </div>
    <div class="form-group ml-3">
        <div class="row">
            <div class="col-md-6">
                <label for="matricula" class="pb-2 t-cel">Matricula</label>
                <input type="text" class="form-control" name="matricula" id="matricula" value="<?php echo $data['page']['matricula']?>">
            </div>
            <div class="col-md-6">
                <label for="setor" class="pb-2 t-cel">Setor</label>
                <input type="text" class="form-control" name="setor" id="setor" value="<?php echo $data['page']['setor']?>">
            </div>
            <div class="col-md-6 mt-4">
                <label for="cargo" class="pb-2 t-cel">Cargo</label>
                <input type="text" class="form-control" name="cargo" id="cargo" value="<?php echo $data['page']['cargo']?>">
            </div>
            <div class="col-md-6 mt-4">
                <label for="nome" class="pb-2 t-cel">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $data['page']['nome']?>">
            </div>
            <div class="col-md-6 mt-4">
                <label for="email" class="pb-2 t-cel">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $data['page']['email']?>">
            </div>
            <div class="col-md-6 mt-4">
                <label for="senha" class="pb-2 t-cel">Senha</label>
                <input type="password" class="form-control" name="senha" id="senha" value="<?php echo $data['page']['senha']?>">
            </div>
            <div class="col-md-6 mt-4">
                <label for="c-senha" class="pb-2 t-cel">Confirmar Senha</label>
                <input type="password" class="form-control" name="senha" id="c-senha" value="<?php echo $data['page']['senha']?>">
            </div>

            <div class="col-md-6 mt-4 mb-5">
                <label for="file__img" class="pb-2 t-cel">Anexar imagem </label>
                <input type="file" name="file"class="d-flex" id="file__img">
                
            </div>

            <div class="col-12 mt-2 pt-1 t-cel">
                <hr>
                <button type="submit" class="btn btn_register">Salvar</button>
                <a href="/admin/users" class="btn btn-info">Voltar</a>
            </div>
        </div>
    </div>
</form>