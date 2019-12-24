<div id="form-register">
    <section class="row">
        <div class="col-md-12">
            <div class="gradient">
                <h1 class="title__article">Cadastro de Usuário</h1>
                <hr>
            </div>
        </div>
        
        <div class="ml-auto mr-3">
            <a href="/admin/pages/novo-usuario" class="btn btn__sum"><i class="fas fa-plus"></i></a>
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
                        <td class="t-cel d-flex justify-content-center align-self-center">
                            <a href="/admin/pages/<?php echo $lista['id_usuario']; ?>/ver-perfil"><i class="fas fa-eye"></i></a>
                            <a href="/admin/pages/<?php echo $lista['id_usuario']; ?>/editar-usuario"><i class="fas fa-pencil-alt"></i></a>
                            <a href="/admin/pages/<?php echo $lista['id_usuario']; ?>/remover-usuario" class="fas fa-trash confirm"></a> 
                        </td>
                    </tr>
                <?php endforeach; ?> 
                </tbody>
            </table>
        </div>
    </section>
</div>