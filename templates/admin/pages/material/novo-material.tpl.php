<form class="f-register pl-3" method="post">
    <div class="col">
        <h1 class="text-title pt-2">Materiais</h1>
        <hr class="pb-4">
    </div>
    <div class="form-group ml-3">
        <div class="row">
            <div class="col-md-6">
                <label for="Equipamento" class="pb-2 t-cel">Equipamento</label>
                <input type="text" class="form-control" name="equipamento" id="Equipamento" placeholder="Equipamento">
            </div>

            <div class="col-md-3">
                <label for="Referencia" class="pb-2 t-cel">Referência</label>
                <input type="text" class="form-control" name="referencia" id="Referencia" placeholder="Referencia">
            </div>

            <div class="col-md-3">
                <label for="Estoque" class="pb-2 t-cel">Quantidade</label>
                <input type="number" class="form-control" placeholder="Ex: 1" name="quantidade" id="Estoque">
            </div>
            <div class="col-md-6 mt-4">
                <label for="Servico" class="pb-2 t-cel">Serviço</label>
                <input type="text" class="form-control" name="servico" id="Servico" placeholder="Servico">
            </div>

            <div class="col-md-2 mt-4">
                <label for="codigo" class="pb-2 t-cel">Código</label>
                <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código">
            </div>

            <div class="col-md-4 mt-4">
                <label for="Endereco" class="pb-2 t-cel">Endereço</label>
                <input type="text" class="form-control" name="endereco" id="Endereco" placeholder="Endereco">
            </div>

            <div class="col-md-6 mt-4">
                <label for="Descricao" class="pb-2 t-cel">Descrição</label>
                <textarea maxlength="55" name="descricao" placeholder="Digite sua descrição" id="Descricao" cols="30" rows="3" class="form-control"></textarea>
            </div>

            <div class="col-md-6 mt-4">
                <label for="anexo" class="pb-2 t-cel">Anexar imagem </label>
                <!-- <input type="file" name="" id="file__img"> -->
                <!-- <i class="file fas fa-download"></i> -->
                <p><input type="file" name="file" id="anexo"></p>
            </div>
            
            <div class="col-12 mt-2 pt-1 t-cel">
                <hr>
                <button type="submit" class="btn btn_register">Cadastrar</button>
            </div>
        </div>
    </div>
</form>