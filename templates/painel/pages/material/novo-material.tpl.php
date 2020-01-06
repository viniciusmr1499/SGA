<form class="f-register pl-3" method="post" enctype="multipart/form-data">
    <div class="col">
        <h1 class="text-title pt-2">Materiais</h1>
        <hr class="pb-4">
    </div>
    <div class="form-group ml-3">
        <div class="row">
            <div class="col-md-6">
                <label for="Equipamento" class="text-uppercase pb-2 t-cel">EQUIPAMENTO:</label><span class="obrigatorio"> *</span>
                <input type="text" class="form-control" required name="equipamento" id="Equipamento" placeholder="Equipamento">
            </div>

            <div class="col-md-3">
                <label for="Referencia" class="text-uppercase pb-2 t-cel">Referência:</label><span class="obrigatorio"> *</span>
                <input type="text" class="form-control"  required name="referencia" id="Referencia" placeholder="Referencia">
            </div>

            <div class="col-md-3">
                <label for="Estoque" class="text-uppercase pb-2 t-cel">Quantidade:</label><span class="obrigatorio"> *</span>
                <input type="number" class="form-control"  required placeholder="Ex: 1" required  name="quantidade" id="Estoque">
            </div>
            <div class="col-md-6 mt-4">
                <label for="Servico" class="text-uppercase pb-2 t-cel">Serviço:</label><span class="obrigatorio"> *</span>
                <input type="text" class="form-control"  required name="servico" id="Servico" placeholder="Servico">
            </div>

            <div class="col-md-2 mt-4">
                <label for="un_medida" class="text-uppercase pb-2 t-cel">UN.MEDIDA:</label><span class="obrigatorio"> *</span>
                <input type="number" class="form-control" required  name="un_medida" id="un_medida" placeholder="Ex: UN">
            </div>

            <div class="col-md-4 mt-4">
                <label for="Endereco" class="text-uppercase pb-2 t-cel">Endereço:</label><span class="obrigatorio"> *</span>
                <input type="text" class="form-control"  required name="endereco" id="Endereco" placeholder="Endereco">
            </div>

            <div class="col-md-6 mt-4">
                <label for="Descricao" class="text-uppercase pb-2 t-cel">Descrição:</label>
                <textarea maxlength="55" name="descricao" placeholder="Digite sua descrição" id="Descricao" cols="30" rows="3" class="form-control"></textarea>
            </div>

            <div class="col-md-6 mt-4">
                <label for="anexo" class="text-uppercase pb-2 t-cel">Anexar imagem: </label>
                <p><input type="file" accept="image/*" name="file" id="anexo"></p>
            </div>
            
            <div class="col-12 mt-2 pt-1 t-cel">
                <hr>
                <button type="submit" class="btn btn_register">Cadastrar</button>
                <a href="/painel/pages/materiais" class="btn btn-info">Voltar</a>
            </div>
        </div>
    </div>
</form>