<form class="f-register pl-3">
    <div class="col">
        <h1 class="text-title pt-2"><?php echo $data['page']['equipamento']; ?></h1>
        <hr class="pb-4">
    </div>
    <div class="form-group ml-3">
        <div class="row">
            <div class="col-md-3">
                <label class="pb-2 t-cel">Código</label>
                <p class="form-control" readonly="true"><?php echo $data['page']['codigo'];?></p>
            </div>
            
            <div class="col-md-2">
                <label class="pb-2 t-cel">Quantidade</label>
                <p class="form-control"><?php echo $data['page']['quantidade'];?></p>
            </div>

            <div class="col-md-2">
                <label class="pb-2 t-cel">UN.Medida</label>
                <p class="form-control"><?php echo $data['page']['un_medida'];?></p>
            </div>

            <div class="col-md-5">
                <label class="pb-2 t-cel">Equipamento</label>
                <p class="form-control" name="equipamento" id="Equipamento"><?php echo $data['page']['equipamento'];?></p>
            </div>

            <div class="col-md-6 mt-2">
                <label class="pb-2 t-cel">Referência</label>
                <p class="form-control"> <?php echo $data['page']['referencia'];?></p>
            </div>
            <div class="col-md-6 mt-2">
                <label for="Descricao" class="pb-2 t-cel">Descrição</label>
                <p class="form-control"><?php echo $data['page']['descricao'];?></p>
            </div>
            <!-- <div class="col-md-4 mt-2">
                <label class="pb-2 t-cel">Serviço</label>
                <p class="form-control"><?php echo $data['page']['servico'];?></p>
            </div> -->

            <div class="col-md-4 mt-2">
                <label class="pb-2 t-cel">Endereço</label>
                <p class="form-control"><?php echo $data['page']['endereco'];?></p>
            </div>
            
            <div class="col-md-4 mt-2">
                <label class="pb-2 t-cel">Clique aqui <i class="fas fa-camera"></i></label><br>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Ver imagem</button>
            
            </div>
            
            <div class="col-12 mt-2 pt-1 t-cel">
                <hr>
                <a href="/painel/pages/materiais" class="btn btn_register">voltar</a>
            </div>
        </div>
    </div>
</form>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class=" modal-content">
        <img src="/img/<?php echo $data['page']['nome_img'];?>" class="img-fluid" alt="Imagem">
    </div>
</div>