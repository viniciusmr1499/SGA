<form class="f-register pl-3" method='post' enctype="multipart/form-data">
    <div class="col">
        <h1 class="text-title pt-2">EDITAR MATERIAL</h1>
        <hr class="pb-4">
    </div>
    <div class="form-group ml-3">
        <div class="row">
            <div class="col-md-6">
                <label for="Equipamento" class="text-uppercase pb-2 t-cel">Equipamento</label>
                <input type="text" class="form-control" name="equipamento" id="Equipamento" value="<?php echo $data['page']['equipamento'];?>">
            </div>

            <div class="col-md-3">
                <label for="Referencia" class="text-uppercase pb-2 t-cel">Referência</label>
                <input type="text" class="form-control" name="referencia" id="Referencia" value="<?php echo $data['page']['referencia'];?>">
            </div>

            <div class="col-md-3">
                <label for="Estoque" class="text-uppercase pb-2 t-cel">Quantidade</label>
                <input type="text" class="form-control" value="<?php echo $data['page']['quantidade'];?>" name="quantidade" id="Estoque">
            </div>
            
            <div class="col-md-3 mt-4">
                <label for="un_medida" class="text-uppercase pb-2 t-cel">UN.MEDIDA:</label><span class="obrigatorio"> *</span>
                <select name="un_medida" id="un_medida" class="form-control select2">
                    <option>Selecione:</option>
                    <?php foreach($data2['lista'] as $item) : ?>
                    <option><?php echo $item['nome'];?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-4 mt-4">
                <label for="Endereco" class="text-uppercase pb-2 t-cel">Endereço</label>
                <input type="text" class="form-control" name="endereco" id="Endereco" value="<?php echo $data['page']['endereco'];?>">
            </div>

            <div class="col-md-6 mt-4">
                <label for="Descricao" class="text-uppercase pb-2 t-cel">Descrição</label>
                <textarea maxlength="55" name="descricao" id="Descricao" cols="30" rows="3" class="form-control"><?php echo $data['page']['equipamento'];?></textarea>
            </div>

            <div class="col-md-6 mt-4">
                <label for="anexo" class="text-uppercase pb-2 t-cel">Anexar imagem </label>
                <p><input type="file" name="file" id="anexo"></p>
                <input type="hidden" name="fotoAntiga" value="img/<?php echo $data['page']['nome_img']?>">
            </div>
            
            <div class="col-12 mt-2 pt-1 t-cel">
                <hr>
                <button type="submit" class="btn btn_register">Salvar</button>
                <a href="/painel/pages/materiais" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
</form>