<div id="form-register">
    <section class="row">
        <div class="col-md-12" style="padding:0;">
            <div class="gradient"><h1 class="text-title">Fluxo de Materiais</h1></div>
            <hr>
        </div>

        <div class="col-12 pb-2" style="display:flex;align-items:center ;justify-content:flex-end">
            <a href="#" data-target="#outMaterials" data-toggle="modal"  class="mr-1 btn btn-info">Deliberar <i class="far fa-hand-point-right"></i></a>
            <a href="/admin/pages/gerar-relatorio-deliberacao" class="btn btn-success ml-1">Gerar Relatório
                <i class="fas fa-file-excel"></i>
            </a>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-register table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-light" style="background:#ff8055">
                    <tr>
                        <th class="t-head" scope="col">Código</th>
                        <th class="t-head" scope="col">Matricula</th>
                        <th class="t-head" scope="col">Colaborador</th>
                        <th class="t-head" scope="col">Setor</th>
                        <th class="t-head" scope="col">Utilização</th>
                        <th class="t-head" scope="col">Equipamento</th>
                        <th class="t-head" scope="col">Quantidade</th>
                        <th class="t-head" scope="col">Data de envio</th>    
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data['lista'] as $item):?>
                    <tr>
                        <td class="t-cel"><?php echo $item['codigo'];?></td>
                        <td class="t-cel"><?php echo $item['matricula'];?></td>
                        <td class="t-cel"><?php echo $item['colaborador'];?></td>
                        <td class="t-cel"><?php echo $item['setor'];?></td>
                        <td class="t-cel"><?php echo $item['utilizacao'];?></td>
                        <td class="t-cel"><?php echo $item['equipamento'];?></td>
                        <td class="t-cel"><?php echo $item['quantidade'];?></td>
                        <td class="t-cel"><?php echo $item['data_de_despache'];?></td>
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
                        <div class="row">
                            <div class="col-md-10">
                                <label for="codigo" class="col-form-label">Código:</label>
                                <input type="number" name="codigo" id="codigo" required="true" class="form-control"  id="codigo">
                            </div>
                            <div class="position">
                                <button id="buscarEquipamento" class="btn btn-info">
                                    <i class="fas fa-search p-1" style="box-sizing:border-box;font-size:1.1rem;"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="equipamento" class="col-form-label">EQUIPAMENTO:</label>
                        <input type="text" readonly="true" required class="form-control" placeholder="equipamento" id="equipamento-nome">
                    </div>
                    
                    <div class="row">
                        <div class="col-3">
                            <label for="mat" class="col-form-label">Matricula:</label>
                            <input type="text" required="true" name="matricula" id="mat" class="form-control">
                        </div>
                        <div class="col-9">
                            <label for="colaborador" class="col-form-label">Colaborador:</label>
                            <input type="text" required="true" name="colaborador" id="colaborador" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="order" class="col-form-label">Utilizacao:</label>
                        <input type="text" required="true" name="utilizacao" id="order" class="form-control">
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <label for="Setor" class="col-form-label">Setor:</label>
                            <input type="text" required="true" name="setor" id="Setor" class="form-control">
                        </div>
                        <div class="col-md-12   ">
                            <label for="qtd" class="col-form-label">Quantidade:</label>
                            <input type="number" name="quantidade" required="true" id="qtd" class="form-control">
                        </div>
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