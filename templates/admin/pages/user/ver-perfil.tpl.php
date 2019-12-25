<form class="f-register pl-3">
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
            <div class="col-md-6 mt-4 mb-5">
                <label for="file__img" class="pb-2 t-cel">Anexar imagem: <i class="file fas fa-download"></i></label>
                <input type="file"  id="file__img">
            </div>

            <div class="col-md-6 mt-4">
                <label for="cargo" class="pb-2 t-cel">Cargo:</label>
                <input type="text" class="form-control" id="cargo" readonly="true" value="<?php echo $data['page']['cargo'];?>">
            </div>
            
            <div class="col-12 mt-2 pt-1 t-cel">
                <hr>
                <a href="/admin/pages" class="btn btn_register">Voltar</a>
            </div>
        </div>
    </div>
</form>