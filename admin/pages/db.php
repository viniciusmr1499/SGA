<?php 

function material_get_data($redirecionarError){
    $file = filter_input(INPUT_POST, 'file');
    $un_medida = filter_input(INPUT_POST, 'un_medida');
    $equipamento = filter_input(INPUT_POST, 'equipamento');
    $referencia = filter_input(INPUT_POST, 'referencia');
    $descricao = filter_input(INPUT_POST, 'descricao');
    $endereco = filter_input(INPUT_POST, 'endereco');
    $servico = filter_input(INPUT_POST, 'servico');
    $quantidade = filter_input(INPUT_POST, 'quantidade');
    

    if(is_null($un_medida) or is_null($equipamento)){
        flash('Informe os campos obrigatórios','error');
        header('location: ' . $redirecionarError);
        die();
    }
    return compact('un_medida','equipamento','referencia','quantidade','servico','file','endereco','descricao');
}

function despache_get_data(){
    $codigo = filter_input(INPUT_POST,'codigo');
    $matricula = filter_input(INPUT_POST,'matricula');
    $ordem = filter_input(INPUT_POST,'ordem');
    $nome = filter_input(INPUT_POST,'nome');
    $quantidade = filter_input(INPUT_POST, 'quantidade');
    
    return compact('codigo','matricula','ordem','nome','quantidade');
}

// *** FUNCÇÕES ANÔNIMAS PARA OS MATERIAIS ***
$listarMateriais = function() use($conn){
    // Listagem de materiais
    $sql = 'SELECT * FROM materiais WHERE quantidade > 0';
    $result = $conn->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);

};

$historico = function() use($conn){
    // Listagem de materiais
    $sql = 'SELECT * FROM materiais';
    $result = $conn->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);
};

$criarMaterial = function() use ($conn){
    // pegar os dados do formulário
    $data = material_get_data('/admin/pages/novo-material');
    
    //Tratando o arquivo
    if(isset($_FILES['file'])){
        // var_dump($_FILES['file']);exit;
        date_default_timezone_set('America/Sao_Paulo');
        $extensao = strtolower(substr($_FILES['file']['name'], -4)); // pega a extensao do arquivo
        $novo_nome = 'Mat - ' . date("Y.m.d"). $extensao; // define o nome do arquivo
        $diretorio = __DIR__ . "/../../public/img/"; // define o diretório para onde iremos enviar o arquivo
        // var_dump($_FILES['file']); exit;
        $data['file'] = $novo_nome;
        // var_dump($data['file']);exit;
        move_uploaded_file($_FILES['file']['tmp_name'], $diretorio.$novo_nome); // efetua o upload
        
        // CRIAR MATERIAL
        $sql = 'INSERT INTO materiais (un_medida,equipamento,referencia,nome_img,descricao,endereco,servico,quantidade,data_de_cadastro,data_de_atualizacao) VALUES (?,?,?,?,?,?,?,?,NOW(),NOW())';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('dssssssi',$data['un_medida'],$data['equipamento'],$data['referencia'],$data['file'],$data['descricao'],$data['endereco'],$data['servico'],$data['quantidade']);
        
        flash('Material foi inserido com sucesso!', 'success');
    }

    return $stmt->execute();
};

$editarMaterial = function($id) use ($conn){
    //EDITAR MATERIAL
    $data = material_get_data('/admin/pages/materiais');
    date_default_timezone_set('America/Sao_Paulo');
    
    if(isset($_FILES['file'])){
        $extensao = strtolower(substr($_FILES['file']['name'], -4)); // pega a extensao do arquivo
        $result = 'Mat - ' . date("Y.m.d-H.i.s"). $extensao; // define o nome do arquivo
        $diretorio = __DIR__ . "/../../public/img/"; // define o diretório para onde iremos enviar o arquivo
        
        $data['file'] = $result;
        // var_dump($data['file']);exit;
        move_uploaded_file($_FILES['file']['tmp_name'], $diretorio.$result); // efetua o upload

        // EDITAR MATERIAL
        $sql = 'UPDATE materiais SET un_medida=?, equipamento=?,referencia=?,descricao=?,nome_img=?,endereco=?,servico=?,quantidade=?,data_de_atualizacao=NOW() WHERE codigo = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('dssssssii',$data['un_medida'],$data['equipamento'],$data['referencia'],$data['descricao'],$data['file'],$data['endereco'],$data['servico'],$data['quantidade'],$id);

        flash('Material foi atualizado com sucesso!', 'success'); 
    }
    
    return $stmt->execute();
};

$removerMaterial = function($id) use ($conn){
    // REMOVER MATERIAL
    $sql = 'DELETE FROM materiais WHERE codigo = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$id);
    flash('Material foi excluído com sucesso!', 'success');

    return $stmt->execute();
};

$verMaterial = function($id) use ($conn){
    //VER APENAS UM MATERIAL POR VEZ  
    $sql = 'SELECT * FROM materiais WHERE codigo = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$id);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_assoc();
};

$despacho = function() use ($conn){
    $data = despache_get_data();

    // var_dump($data['nome']);exit;
    $sql = 'SELECT * FROM materiais';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    $r = $result->fetch_assoc();
    $qtd = $r['quantidade'];
    $data['quantidade'] = (int) $data['quantidade'];

    // var_dump($data['quantidade']);exit;
    
    if($data['quantidade'] > $qtd){
        flash('Valor de quantidade superior ao que tem em estoque!', 'warning');
        header('location: /admin/pages/logistica-material');
        exit;
    }else{
        $qtd -= $data['quantidade'];
        $sql = 'UPDATE materiais SET quantidade=? WHERE codigo = ?';

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ii',$qtd,$data['codigo']);

        return $stmt->execute();
    }
};

$listarDespacho = function(){
    // $sql = 'SELECT * FROM controle_saida_materiais WHERE quantidade > 0';
    // $result = $conn->query($sql);

    // return $result->fetch_all(MYSQLI_ASSOC);
};