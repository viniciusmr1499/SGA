<form class="f-register pl-3" method="POST" name="formuser" enctype="multipart/form-data">
    <div class="col">
        <h1 class="text-title pt-2"><?php echo $data['page']['nome'];?></h1>
        <hr class="pb-4">
    </div>
    <div class="form-group ml-3">
        <div class="row">
            <div class="col-md-6">
                <label for="matricula" class="pb-2 t-cel">Matricula:</label>
                <input type="text" required class="form-control" name="matricula" id="matricula" value="<?php echo $data['page']['matricula']?>">
            </div>
            <div class="col-md-6">
                <label for="nome" class="pb-2 t-cel">Nome Completo:</label>
                <input type="text" class="form-control" name="nomeCompleto" id="nome" value="<?php echo $data['page']['nome']?>">
            </div>
            <div class="col-md-6 mt-4">
                <label for="cargo" class="pb-2 t-cel">Cargo:</label>
                <input type="text" class="form-control" name="cargo" id="cargo" value="<?php echo $data['page']['cargo']?>">
            </div>
            
            <div class="col-md-6 mt-4">
                <label for="setor" class="pb-2 t-cel">Setor:</label>
                <input type="text" class="form-control" value="<?php echo $data['page']['setor']; ?>" required="true" name="setor" id="setor" placeholder="TIC">
            </div>

            <div class="col-md-6 mt-4">
                <label for="email" class="pb-2 t-cel">E-mail:</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $data['page']['email']?>">
            </div>

            <div class="col-md-6 mt-4">
                <label for="nivel" class="pb-2 t-cel">Nível do Usuário:</label><span class="obrigatorio"> *</span>
                <select requried name="nivel" id="nivel" class="form-control">
                <option value="<?php echo $data['page']['nivel']; ?>"><?php echo $data['page']['nivel'];?> - ADMINISTRADOR</option>
                <?php if($data['page']['nivel'] == 1):?>
                    <option value="0">0 - COMUM</option>
                <?php else: ?>
                    <option value="<?php echo $data['page']['nivel']?>"><?php echo $data['page']['nivel']?> - ADMINISTRADOR</option>
                <?php endif;?>
                </select>
            </div>

            <!-- <div class="col-md-6 mt-4">
                <label for="senha" class="pb-2 t-cel">Senha</label>
                <input type="password" class="form-control" name="senha" id="senha">
            </div>
            <div class="col-md-6 mt-4">
                <label for="rep_senha" class="pb-2 t-cel">Confirmar Senha</label>
                <input type="password" id="rep_senha" class="form-control" name="rep_senha">
            </div> -->

            <div class="col-12 mt-2 pt-1 t-cel">
                <hr>
                <button type="submit" class="btn btn_register">Salvar</button>
                <a href="/admin/users" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
</form>