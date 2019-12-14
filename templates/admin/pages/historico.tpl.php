<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Histórico</h1>
    <p class="mb-4"><strong>Info:</strong> Listagem com todos os items já cadastrados no SGA</p>

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
                            <th class="t-head" style="font-weight:bold" scope="col">Equipamento</th>
                            <th class="t-head" style="font-weight:bold" scope="col">Referencia </th>
                            <th class="t-head" style="font-weight:bold" scope="col">Descricao</th>
                            <th class="t-head" style="font-weight:bold" scope="col">Endereco</th>
                            <th class="t-head" style="font-weight:bold" scope="col">Servico</th>
                            <th class="t-head" style="font-weight:bold" scope="col">Data de inicio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="t-cel">006216</td>
                            <td class="t-cel">TARTLER</td>
                            <td class="t-cel">EK80-0020</td>
                            <td class="t-cel">EK80-0020 Motor dosador de corrente alt </td>
                            <td class="t-cel">BL1-A1</td>
                            <td class="t-cel">Lam Vestas - V110</td>
                            <td><?php echo date('d/m/Y')?></td>
                        </tr>

                        <tr>
                            <td class="t-cel">006846</td>
                            <td class="t-cel">TARTLER</td>
                            <td class="t-cel">EK80-0060</td>
                            <td class="t-cel">EK80-0080 Motor dosador de corrente alt </td>
                            <td class="t-cel">BL5-A2</td>
                            <td class="t-cel">Lam Vestas - V150</td>
                            <td><?php echo date('d/m/Y')?></td>
                        </tr>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>