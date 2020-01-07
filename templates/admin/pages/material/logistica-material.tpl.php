<div id="form-register">
    <section class="row">
        <div class="col-md-12" style="padding:0;">
            <div class="gradient"><h1 class="text-title">Fluxo de materiais</h1></div>
            <hr>
        </div>
        
        <div  class="ml-auto mr-3">
            <a href="#" data-target="#outMaterials" data-toggle="modal"  class="btn btn-dark">Despacho <i class="far fa-hand-point-right"></i></a>
        </div>


        <div class="table-responsive mt-3">
            <table class="table table-register table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-light" style="background:#ff8055">
                    <tr>
                        <th class="t-head" scope="col">Código</th>
                        <th class="t-head" scope="col">Matricula</th>
                        <th class="t-head" scope="col">Ordem de Serviço</th>
                        <th class="t-head" scope="col">Quantidade</th>
                        <th class="t-head" scope="col">Nome</th>
                        <th class="t-head" scope="col">Data de Despacho</th>    
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data['lista'] as $lista):?>
                    <tr>
                        <td class="t-cel"><?php echo $lista['codigo'];?></td>
                        <td class="t-cel"><?php echo $lista['un_medida'];?></td>
                        <td class="t-cel"><?php echo $lista['equipamento'];?></td>
                        <td class="t-cel"><?php echo $lista['referencia'];?></td>
                        <td class="t-cel d-flex"><?php echo $lista['descricao'];?></td>
                        <td class="t-cel"><?php echo $lista['endereco'];?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<div class="modal fade" id="outMaterials" tabindex="-1" role="dialog" aria-labelledby="outMaterials" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="outMaterials">Despacho de Material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/admin/pages/despacho">
                    <div class="form-group">
                        <label for="codigo" class="col-form-label">Código:</label>
                        <input type="number" name="codigo" required="true" class="form-control" placeholder="Código" id="codigo">
                    </div>

                    <div class="form-group">
                        <label for="mat" class="col-form-label">Matricula:</label>
                        <input type="text" required="true" name="matricula" id="mat" class="form-control" placeholder="Ex: 006216">
                    </div>

                    <div class="form-group">
                        <label for="nome" class="col-form-label">Nome:</label>
                        <input type="text" required="true" name="nome" id="nome" class="form-control" placeholder="Colaborador">
                    </div>

                    <div class="form-group">
                        <label for="order" class="col-form-label">Ordem de Serviço:</label>
                        <input type="text" required="true" name="ordem" id="order" class="form-control" placeholder="Ordem de Serviço">
                    </div>

                    <div class="form-group">
                        <label for="qtd" class="col-form-label">Quantidade:</label>
                        <input type="number" name="quantidade" required="true" id="qtd" class="form-control" placeholder="Quantidade">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn_register">Salvar</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
<!-- fim do modal  -->