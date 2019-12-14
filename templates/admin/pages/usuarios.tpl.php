<div id="form-register">
    <section class="row">
        <div class="col-md-12">
            <div class="gradient">
                <h1 class="title__article">Cadastro de Usuário</h1>
                <hr>
            </div>
        </div>
        
        <form action="/admin/novo-usuario" class="ml-auto mr-3" method="post">
            <button class="btn btn__sum"><i class="fas fa-plus"></i></button>
        </form>

        <div class="table-responsive mt-3">
            <table class="table table-register table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th class="t-head" scope="col">Matricula</th>
                        <th class="t-head" scope="col">Nome</th>
                        <th class="t-head" scope="col">E-mail</th>
                        <th class="t-head" scope="col">Setor</th>
                        <th class="t-head" scope="col">Cargo</th>
                        <th class="t-head" scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr scope="row">
                        <td class="t-cel">006216</td>
                        <td class="t-cel">Marcos Vinicius Meneses de Oliveira</td>
                        <td class="t-cel">Vinicius.oliveira@aerisenergy.com.br</td>
                        <td class="t-cel">TIC</td>
                        <td class="t-cel">Aprendiz</td>
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