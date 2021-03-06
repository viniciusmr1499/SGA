<div id="form-register">
    <section class="row">
        <div class="col-md-12" style="padding:0;">
            <div class="gradient">
                <h1 class="text-title">Usuários</h1>
                <hr>
            </div>
        </div>
        
        <div class="ml-auto mr-3">
            <a href="/admin/users/novo-usuario" class="btn btn-info"><i class="fas fa-plus"> Adicionar Usuário</i></a>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-register table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th class="t-head" scope="col">Matricula</th>
                        <th class="t-head" scope="col">Nome</th>
                        <th class="t-head" scope="col">E-mail</th>
                        <th class="t-head" scope="col">Setor</th>
                        <th class="t-head" scope="col">Cargo</th>
                        <th class="t-head" scope="col">Data de cadastro</th>
                        <th class="t-head" scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data['lista'] as $lista): ?>
                    <tr scope="row">
                        <td class="t-cel"><?php echo $lista['matricula']?></td>
                        <td class="t-cel d-flex"><?php echo $lista['nome']?></td>
                        <td class="t-cel"><?php echo $lista['email']?></td>
                        <td class="t-cel"><?php echo $lista['setor']?></td>
                        <td class="t-cel"><?php echo $lista['cargo']?></td>
                        <td class="t-cel"><?php echo $lista['row_data']?></td>
                        <td class="t-cel d-flex justify-content-center align-self-center">
                            <a href="/admin/users/<?php echo $lista['id_usuario']; ?>/ver-perfil"><i class="fas fa-eye"></i></a>
                            <a href="/admin/users/<?php echo $lista['id_usuario']; ?>/editar-usuario"><i class="fas fa-pencil-alt"></i></a>
                            <a href="/admin/users/<?php echo $lista['id_usuario']; ?>/remover-usuario" class="fas fa-trash confirm"></a> 
                        </td>
                    </tr>
                <?php endforeach; ?> 
                </tbody>
            </table>
        </div>
    </section>
</div>