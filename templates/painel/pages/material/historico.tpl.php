<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Histórico</h1>
    <p class="mb-4"><strong>Info:</strong> Listagem com todos os itens já cadastrados no SGA (Sistema de gerenciamento Aeris)</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class=" d-flex card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-table"></i> Tabela 
            </h6>
            <a href="#" class="h4 ml-auto title__article">Gerar Relatório
                <i class="fas fa-file-excel"></i>
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive ordena">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="t-head" style="font-weight:bold" scope="col">Código</th>
                            <th class="t-head" style="font-weight:bold">UN.Medida</th>
                            <th class="t-head" style="font-weight:bold" scope="col">Equipamento</th>
                            <th class="t-head" style="font-weight:bold" scope="col">Referencia </th>
                            <th class="t-head" style="font-weight:bold" scope="col">Descricao</th>
                            <th class="t-head" style="font-weight:bold" scope="col">Endereco</th>
                            <th class="t-head" style="font-weight:bold" scope="col">Servico</th>
                            <th class="t-head" style="font-weight:bold" scope="col">Data de cadastro</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data['itens'] as $item): ?>
                        <tr>
                            <td class="t-cel"><?php echo $item['codigo']?></td>
                            <td class="t-cel"><?php echo $item['un_medida'];?></td>
                            <td class="t-cel"><?php echo $item['equipamento']?></td>
                            <td class="t-cel"><?php echo $item['referencia']?></td>
                            <td class="t-cel"><?php echo $item['descricao']?></td>
                            <td class="t-cel"><?php echo $item['endereco']?></td>
                            <td class="t-cel"><?php echo $item['servico']?></td>
                            <td class="t-cel d-flex justify-content-center align-sel-center"><?php echo $item['data_de_cadastro']?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>