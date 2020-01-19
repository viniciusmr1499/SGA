<form class="f-register pl-3">
    <div class="col">
        <h1 class="text-title pt-2"><?php echo $data['page']['nome'];?></h1>
        <hr class="pb-4">
    </div>
    <div class="form-group ml-3">
        <div class="row">
            <div class="col-md-6">
                <label for="matricula" class="pb-2 t-cel">Matricula:</label>
                <p class="form-control text-dark" id="matricula"><?php echo $data['page']['matricula'];?></p>
            </div>
            <div class="col-md-6">
                <label for="nome" class="pb-2 t-cel">Nome Completo:</label>
                <p class="form-control text-dark"  id="nome"><?php echo $data['page']['nome'];?></p>
            </div>
            <div class="col-md-6 mt-2">
                <label for="cargo" class="pb-2 t-cel">Cargo:</label>
                <p class="form-control text-dark" id="cargo"><?php echo $data['page']['cargo'];?></p>
            </div>
            <div class="col-md-6">
                <label for="setor" class="pb-2 t-cel">Setor:</label>
                <p class="form-control text-dark" id="setor"><?php echo $data['page']['setor'];?></p>
            </div>
            
            <div class="col-md-6 mt-6">
                <label for="email" class="pb-2 t-cel">E-mail:</label>
                <p class="form-control text-dark" id="email"><?php echo $data['page']['email'];?></p>
            </div>
            
            <div class="col-md-6 mt-6">
                <label for="date" class="pb-2 t-cel">Data de Cadastro</label>
                <strong><p id="date" class="form-control text-success"><?php echo $data['page']['data_de_criacao']; ?></p></strong>
            </div>

            <!-- <div class="col-md-6 mt-2">
                <label>Avatar</label><br>
                <img class="img-fluid profile" src="/img/<?php echo $data['page']['nome_img'];?>" alt="Avatar">
            </div> -->
            
            <div class="col-12 mt-2 pt-1 t-cel">
                <hr>
                <a href="/admin/users" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
</form>