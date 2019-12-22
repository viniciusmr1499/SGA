<div id="form-register">
    <section class="row">
        <div class="col-md-12">
            <div class="gradient"><h1 class="title__article">Cadastro de materiais</h1></div>
            <hr>
        </div>
        
        <div  class="ml-auto mr-3">
            <a href="/admin/pages/novo-material" class="btn btn__sum"><i class="fas fa-plus"></i></a>
        </div>


        <div class="table-responsive mt-3">
            <table class="table table-register table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th class="t-head" scope="col">Código</th>
                        <th class="t-head" scope="col">Equipamento</th>
                        <th class="t-head" scope="col">Referência </th>
                        <th class="t-head" scope="col">Descrição</th>
                        <th class="t-head" scope="col">Endereço</th>
                        <th class="t-head" scope="col">Servico</th>
                        <th class="t-head" scope="col">Quantidade</th>
                        <th class="t-head" scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data['lista'] as $lista):?>
                    <tr>
                        <td class="t-cel"><?php echo $lista['codigo'];?></td>
                        <td class="t-cel"><?php echo $lista['equipamento'];?></td>
                        <td class="t-cel"><?php echo $lista['referencia'];?></td>
                        <td class="t-cel d-flex"><?php echo $lista['descricao'];?></td>
                        <td class="t-cel"><?php echo $lista['endereco'];?></td>
                        <td class="t-cel d-flex"><?php echo $lista['servico'];?></td>
                        <td class="t-cel"><?php echo $lista['quantidade'];?></td>
                        <td class="t-cel d-flex justify-content-center align-self-center">
                            <a href="/admin/pages/<?php echo $lista['id_material']?>/ver-material"><i class="fas fa-eye"></i></a>
                            <a href="/admin/pages/<?php echo $lista['id_material']?>/editar-material"><i class="fas fa-pencil-alt"></i></a>
                            <a href="/admin/pages/<?php echo $lista['id_material']?>/remover-material" class="confirm fas fa-trash"></a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </section>
</div>