$('#buscarEquipamento').click(function(e){
    // e.preventDefault();
    let descricao = $('#codigo').val();
    if(descricao == ""){
        $.alert({
            title: 'Campo vazio!',
            content: 'Favor, preencher o campo código!',
            type: 'orange',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'Fechar',
                    btnClass: 'btn-orange',
                    close: function(){
                    }
                },
            }
        });
        $('#descricao-nome').val("descricao");
        return;
    }
    $('#buscarEquipamento').attr('disabled', 'disabled');

    $.ajax({
        type: "POST",
        url: "/admin/pages/"+descricao+"/buscar-descricao",
        processData: false,
        cache: false,
        contentType: false,
        beforeSend: function(){ 
            // SERVE PARA RETORNAR ALGO ENQUANTO A CONSULTA É EXECUTADA
                        
        }
    }).done(function(data) {
        $('#buscarEquipamento').removeAttr('disabled');
        // console.log(data);
        let nome = JSON.parse(data);

        if(nome == null){
            $.alert({
                title: 'Inválido!',
                content: 'Código informado não existe!',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Fechar',
                        btnClass: 'btn-red',
                        close: function(){
                        }
                    },
                }
            });
            $('#descricao-nome').val("Descricao");
            return;
        }
        
        $('#descricao-nome').val(nome.descricao);

    }).fail(function (data) {
        // console.log(data);
    })
});

$('#codigo').change(function(){
    let valor = $(this).val();
    
    if(valor == ''){
        $('#descricao-nome').val("Descrição");
    }
   
})

$('#codigo').focusout(function(){
    let valor = $(this).val();
    
    if(valor == ''){
        $('#descricao-nome').val("Descrição");
    }

})

// SEGUNDA FUNCAO PARA BUSCAR NOME Da descricao
$('#buscarNomeEquipamento').click(function(e){
    // e.preventDefault();
    let descricao = $('#id_codigo').val();
    
    if(descricao == ""){
        $.alert({
            title: 'Campo vazio!',
            content: 'Favor, preencher o campo código!',
            type: 'orange',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'Fechar',
                    btnClass: 'btn-orange',
                    close: function(){
                    }
                },
            }
        });
        $('#descricao-nome').val("Descrição");
        return;
    }

    $('#buscarEquipamento').attr('disabled', 'disabled');

    $.ajax({
        type: "POST",
        url: "/admin/pages/"+descricao+"/buscar-descricao",
        processData: false,
        cache: false,
        contentType: false,
        beforeSend: function(){ 
            // SERVE PARA RETORNAR ALGO ENQUANTO A CONSULTA É EXECUTADA
                        
        }
    }).done(function(data) {
        $('#buscarNomeEquipamento').removeAttr('disabled');
        // console.log(data);
        let nome = JSON.parse(data);

        if(nome == null){
            $.alert({
                title: 'Inválido!',
                content: 'Código informado não existe!',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Fechar',
                        btnClass: 'btn-red',
                        close: function(){
                        }
                    },
                }
            });
            $('#descricao-nome').val("Descrição");

            return;
        }

        $('#descricao-nome').val(nome.descricao);

    }).fail(function (data) {
        // console.log(data);
    })
});

$('#id_codigo').change(function(){
    let valor = $(this).val();
    
    if(valor == ''){
        $('#descricao-nome').val("Descrição");
    }
   
})

$('#id_codigo').focusout(function(){
    let valor = $(this).val();
    
    if(valor == ''){
        $('#descricao-nome').val("Descrição");
    }

})

/* ************ FUNÇÕES PARA O PAINEL ****************/
$('#buscarNomeEquipamento2').click(function(e){
    // e.preventDefault();
    let descricao = $('#id_codigo').val();
    
    if(descricao == ""){
        $.alert({
            title: 'Campo vazio!',
            content: 'Favor, preencher o campo código!',
            type: 'orange',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'Fechar',
                    btnClass: 'btn-orange',
                    close: function(){
                    }
                },
            }
        });
        $('#descricao-nome').val("Descrição");
        return;
    }

    $('#buscarEquipamento').attr('disabled', 'disabled');

    $.ajax({
        type: "POST",
        url: "/painel/pages/"+descricao+"/buscar-descricao",
        processData: false,
        cache: false,
        contentType: false,
        beforeSend: function(){ 
            // SERVE PARA RETORNAR ALGO ENQUANTO A CONSULTA É EXECUTADA
                        
        }
    }).done(function(data) {
        $('#buscarNomeEquipamento').removeAttr('disabled');
        // console.log(data);
        let nome = JSON.parse(data);

        if(nome == null){
            $.alert({
                title: 'Inválido!',
                content: 'Código informado não existe!',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Fechar',
                        btnClass: 'btn-red',
                        close: function(){
                        }
                    },
                }
            });
            $('#descricao-nome').val("Descrição");

            return;
        }

        $('#descricao-nome').val(nome.descricao);

    }).fail(function (data) {
        // console.log(data);
    })
});

$('#buscarEquipamento2').click(function(e){
    // e.preventDefault();
    let descricao = $('#codigo').val();
    if(descricao == ""){
        $.alert({
            title: 'Campo vazio!',
            content: 'Favor, preencher o campo código!',
            type: 'orange',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'Fechar',
                    btnClass: 'btn-orange',
                    close: function(){
                    }
                },
            }
        });
        $('#descricao-nome').val("descricao");
        return;
    }
    $('#buscarEquipamento').attr('disabled', 'disabled');

    $.ajax({
        type: "POST",
        url: "/painel/pages/"+descricao+"/buscar-descricao",
        processData: false,
        cache: false,
        contentType: false,
        beforeSend: function(){ 
            // SERVE PARA RETORNAR ALGO ENQUANTO A CONSULTA É EXECUTADA
                        
        }
    }).done(function(data) {
        $('#buscarEquipamento').removeAttr('disabled');
        // console.log(data);
        let nome = JSON.parse(data);

        if(nome == null){
            $.alert({
                title: 'Inválido!',
                content: 'Código informado não existe!',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Fechar',
                        btnClass: 'btn-red',
                        close: function(){
                        }
                    },
                }
            });
            $('#descricao-nome').val("Descricao");
            return;
        }
        
        $('#descricao-nome').val(nome.descricao);

    }).fail(function (data) {
        // console.log(data);
    })
});