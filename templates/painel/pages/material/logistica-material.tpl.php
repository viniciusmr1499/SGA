<form method="post" class="f-register pl-3" style="margin-top:0; padding-top:2rem;">
    <div class="col">
        <h1 class="text-title pt-2">Controle de Material</h1>
        <hr class="pb-4">
    </div>
    
    <div class="form-group ml-3">
        <div class="row">
            <div class="col-md-4">
                <label for="cod">CÓDIGO</label>
                <input type="text" id="cod" class="form-control" placeholder="Código" name="codigo">
            </div>

            <div class="col-md-4">
                <label for="un.med">UN.MEDIDA</label>
                <input type="text" id="un.med" class="form-control" placeholder="Unidade de medida" name="un_medida">
            </div>

            <div class="col-md-4">
                <label for="qtd">QUANTIDADE</label>
                <input type="text" id="qtd" class="form-control" placeholder="Quantidade" name="quantidade">
            </div>
            
            <div class="col-md-6 mt-3">
                <label for="resp">RESPONSÁVEL</label>
                <input type="text" id="resp" class="form-control" placeholder="Responsável" name="nome">
            </div>
            <div class="col-md-6 mt-3">
                <label for="end">ENDEREÇO</label>
                <input type="text" id="end" class="form-control" placeholder="Endereço" name="endereco">
            </div>
            
            <div class="col-md-6 mt-3">
                <label for="des">DESCRIÇÃO</label>
                <textarea id="des" cols="30" rows="6" placeholder="Descrição.." class="form-control" name="descricao"></textarea>
            </Div>
            
        <!-- fim da linha -->
        </div>

    </div>
    <div class="col mb-2">
        <hr class="mb-3 mt-4">
        <button class="btn btn_register">Enviar</button>
        <a href="/painel" class="btn btn-dark">Voltar</a>
    </div>
    
</form>