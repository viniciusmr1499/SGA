<form class="f-register pl-3" method="post" name="formuser" enctype="multipart/form-data">
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
                <label for="anexo" class="pb-2 t-cel">Anexar imagem:</label><span class="obrigatorio"> *</span>
                <input type="file" class="d-flex" required="true" name="file" id="anexo">
                <input type="hidden" name="fotoAntiga" value="img/<?php echo $_SESSION['avatar'];?>">
            </div>
            
            <div class="col-12 mt-5 pt-1 t-cel">
                <hr>
                <button type="submit" class="btn btn_register">Salvar</button>
                <a href="/admin" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
</form>