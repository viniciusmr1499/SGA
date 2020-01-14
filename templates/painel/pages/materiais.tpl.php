<div id="form-register">
    <section class="row">
        <div class="col-md-12" style="padding:0;">
            <div class="gradient"><h1 class="text-title">Materiais</h1></div>
            <hr>
        </div>
        
        <div  class="ml-auto mr-3">
            <a href="#" class="btn btn-success mt-1" data-target="#renovarEstoque" data-toggle="modal"><i class="fas fa-box-open"></i> Renovar Estoque</i></a>
            <a href="/painel/pages/novo-material" class="text-title mt-1 btn btn-primary"><i class="fas fa-plus"> Adicionar Material </i></a>
        </div>


        <div class="table-responsive mt-3">
            <table class="table table-register table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th class="t-head" scope="col">Código</th>
                        <th class="t-head" scope="col">UN.Medida</th>
                        <th class="t-head" scope="col">Equipamento</th>
                        <th class="t-head" scope="col">Referência </th>
                        <th class="t-head" scope="col">Descrição</th>
                        <th class="t-head" scope="col">Endereço</th>
                        <th class="t-head" scope="col">Quantidade</th>
                        <th class="t-head" scope="col">Status</th>
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
                        <td class="t-cel"><?php echo $lista['quantidade'];?></td>
                        <td class="t-cel d-flex justify-content-center align-self-center">
                            <a href="/painel/pages/<?php echo $lista['codigo']?>/ver-material"><i class="fas fa-eye"></i></a>
                            <a href="/painel/pages/<?php echo $lista['codigo']?>/editar-material"><i class="fas fa-pencil-alt"></i></a>
                            <a href="/painel/pages/<?php echo $lista['codigo']?>/remover-material" class="fas fa-trash confirmMaterial"></a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<div class="modal fade" id="renovarEstoque" tabindex="-1" role="dialog" aria-labelledby="renovarEstoque" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="renovarEstoque">Estoque</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/painel/pages/renovar-estoque">
                    <div class="form-group">
                        <label for="codigo" class="col-form-label">Código:</label>
                        <input type="number" required="true" class="form-control" placeholder="Código" id="codigo" name="codigo">
                    </div>
                    
                    <div class="form-group">
                        <label for="equipamento" class="col-form-label">EQUIPAMENTO:</label>
                        <input type="text" readonly="true" required class="form-control" placeholder="Equipamento" value="">
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