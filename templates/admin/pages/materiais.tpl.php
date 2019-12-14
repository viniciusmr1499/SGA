<div id="form-register">
    <section class="row">
        <div class="col-md-12">
            <div class="gradient"><h1 class="title__article">Cadastro de materiais</h1></div>
            <hr>
        </div>
        
        <form action="/admin/novo-material" class="ml-auto mr-3" method="post">
            <button class="btn btn__sum"><i class="fas fa-plus"></i></button>
        </form>


        <div class="table-responsive mt-3">
            <table class="table table-register table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th class="t-head" scope="col">Código</th>
                        <th class="t-head" scope="col">Equipamento</th>
                        <th class="t-head" scope="col">Referencia </th>
                        <th class="t-head" scope="col">Descricao</th>
                        <th class="t-head" scope="col">Endereco</th>
                        <th class="t-head" scope="col">Servico</th>
                        <th class="t-head" scope="col">Estoque</th>
                        <th class="t-head" scope="col">Status</th>
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
                        <td class="t-cel">10</td>
                        <td class="t-cel">
                            <a href=""><i class="fas fa-pencil-alt"></i></a>
                            <a href=""><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>