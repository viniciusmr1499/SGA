<!-- <form class="f-register pl-3">
    <div class="col">
        <h1 class="text-title pt-2"><?php echo 'Material Y'; ?></h1>
        <hr class="pb-4">
    </div>
    <div class="form-group ml-3">
        <div class="row">
            <div class="col-md-6">
                <label for="Equipamento" class="pb-2 t-cel">Equipamento</label>
                <input type="text" class="form-control" readonly name="Equipamento" id="Equipamento">
            </div>
            <div class="col-md-3">
                <label for="Referencia" class="pb-2 t-cel">Referência</label>
                <input type="text" class="form-control" readonly name="Referencia" id="Referencia">
            </div>
            <div class="col-md-3">
                <label for="Estoque" class="pb-2 t-cel">Quantidade</label>
                <input type="number" class="form-control" readonly name="quantidade" id="Estoque">
            </div>
            <div class="col-md-6 mt-4">
                <label for="Endereco" class="pb-2 t-cel">Endereço</label>
                <input type="text" class="form-control" readonly name="Endereco" id="Endereco">
            </div>
            <div class="col-md-6 mt-4">
                <label for="Servico" class="pb-2 t-cel">Serviço</label>
                <input type="text" class="form-control" readonly name="Servico" id="Servico">
            </div>
            
            <div class="col-md-6 mt-4">
                <label for="Descricao" class="pb-2 t-cel">Descrição</label>
                <textarea name="Descricao" maxlength="55" readonly ="Digite sua descrição" id="Descricao" cols="30" rows="3" class="form-control"></textarea>
            </div>

            <div class="col-md-6 mt-4">
                <p class="t-cel pb-2"><?php echo 'Nome do enxoval'; ?> </p>
                <div style="border:1px solid gray; display:flex; align-items:center; justify-content:center;height:100px">
                    <img src="/img/me.png" alt="imagem" class="img-fluid" width="100px">
                </div>
            </div>
            <div class="col-12 mt-2 pt-1 t-cel">
                <hr>
                <a href="/admin/pages/materiais" class="btn btn_register">Voltar</a>
            </div>
        </div>
    </div>
</form> -->

<form class="f-register pl-3">
    <div class="col">
        <h1 class="text-title pt-2">Visualizar <?php echo $data['page']['equipamento']; ?></h1>
        <hr class="pb-4">
    </div>
    <div class="form-group ml-3">
        <div class="row">
            <div class="col-md-6">
                <label class="pb-2 t-cel">Equipamento</label>
                <p class="form-control" name="equipamento" id="Equipamento"><?php echo $data['page']['equipamento'];?></p>
            </div>

            <div class="col-md-3">
                <label class="pb-2 t-cel">Referência</label>
                <p class="form-control"> <?php echo $data['page']['referencia'];?></p>
            </div>

            <div class="col-md-3">
                <label class="pb-2 t-cel">Quantidade</label>
                <p class="form-control"><?php echo $data['page']['quantidade'];?></p>
            </div>

            <div class="col-md-6 mt-4">
                <label class="pb-2 t-cel">Serviço</label>
                <p class="form-control"><?php echo $data['page']['servico'];?></p>
            </div>

            <div class="col-md-2 mt-4">
                <label class="pb-2 t-cel">Código</label>
                <p class="form-control"><?php echo $data['page']['codigo'];?></p>
            </div>

            <div class="col-md-4 mt-4">
                <label class="pb-2 t-cel">Endereço</label>
                <p class="form-control"><?php echo $data['page']['endereco'];?></p>
            </div>

            <div class="col-md-6 mt-4">
                <label for="Descricao" class="pb-2 t-cel">Descrição</label>
                <p class="form-control"><?php echo $data['page']['descricao'];?></p>
            </div>

            <div class="col-md-6 mt-4">
                <label for="anexo" class="pb-2 t-cel">Anexar imagem </label>
                <!-- <input type="file" name="" id="file__img"> -->
                <!-- <i class="file fas fa-download"></i> -->
                <p><input type="file" name="file" id="anexo"></p>
            </div>
            
            <div class="col-12 mt-2 pt-1 t-cel">
                <hr>
                <a href="/admin/pages/materiais" class="btn btn_register">voltar</a>
            </div>
        </div>
    </div>
</form>