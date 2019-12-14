<form action="/admin/materiais" class="f-register pl-3" method="post">
    <div class="col">
        <h1 class="text-title pt-2">Materiais</h1>
        <hr class="pb-4">
    </div>
    <div class="form-group ml-3">
        <div class="row">
            <div class="col-md-6">
                <label for="Equipamento" class="pb-2 t-cel">Equipamento</label>
                <input type="text" class="form-control" name="Equipamento" id="Equipamento" placeholder="Equipamento">
            </div>
            <div class="col-md-6">
                <label for="Referencia" class="pb-2 t-cel">Referência</label>
                <input type="text" class="form-control" name="Referencia" id="Referencia" placeholder="Referencia">
            </div>
            <div class="col-md-6 mt-4">
                <label for="Endereco" class="pb-2 t-cel">Endereço</label>
                <input type="text" class="form-control" name="Endereco" id="Endereco" placeholder="Endereco">
            </div>
            <div class="col-md-6 mt-4">
                <label for="Servico" class="pb-2 t-cel">Serviço</label>
                <input type="text" class="form-control" name="Servico" id="Servico" placeholder="Servico">
            </div>
            <div class="col-md-6 mt-4">
                <label for="Descricao" class="pb-2 t-cel">Descrição</label>
                <textarea name="Descricao" maxlength="55" placeholder="Digite sua descrição" id="Descricao" cols="30" rows="3" class="form-control"></textarea>
            </div>
            <div class="col-md-6 mt-4">
                <label for="Estoque" class="pb-2 t-cel">Estoque</label>
                <input type="number" class="form-control" name="Estoque" id="Estoque">
            </div>
            <div class="col-12 mt-2 pt-1 t-cel">
                <hr>
                <button type="submit" class="btn btn_register">Cadastrar</button>
            </div>
        </div>
    </div>
</form>