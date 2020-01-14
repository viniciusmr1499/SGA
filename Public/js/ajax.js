$('#buscarEquipamento').click(function(e){
    // e.preventDefault();
    let equipamento = $('#codigo').val();
    if(equipamento == ""){
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
        $('#equipamento-nome').val("Equipamento");
        return;
    }
    $('#buscarEquipamento').attr('disabled', 'disabled');

    $.ajax({
        type: "POST",
        url: "/admin/pages/"+equipamento+"/buscar-equipamento",
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
            $('#equipamento-nome').val("Equipamento");
            return;
        }
        
        $('#equipamento-nome').val(nome.equipamento);

    }).fail(function (data) {
        // console.log(data);
    })
});

$('#codigo').change(function(){
    let valor = $(this).val();
    
    if(valor == ''){
        $('#equipamento-nome').val("Equipamento");
    }
   
})

$('#codigo').focusout(function(){
    let valor = $(this).val();
    
    if(valor == ''){
        $('#equipamento-nome').val("Equipamento");
    }

})



// SEGUNDA FUNCAO PARA BUSCAR NOME DO EQUIPAMENTO

$('#buscarNomeEquipamento').click(function(e){
    // e.preventDefault();
    let equipamento = $('#id_codigo').val();
    
    if(equipamento == ""){
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
        $('#equipamento-nome').val("Equipamento");
        return;
    }

    $('#buscarEquipamento').attr('disabled', 'disabled');

    $.ajax({
        type: "POST",
        url: "/admin/pages/"+equipamento+"/buscar-equipamento",
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
            $('#equipamento-nome').val("Equipamento");

            return;
        }

        $('#equipamento-nome').val(nome.equipamento);

    }).fail(function (data) {
        // console.log(data);
    })
});


$('#id_codigo').change(function(){
    let valor = $(this).val();
    
    if(valor == ''){
        $('#equipamento-nome').val("Equipamento");
    }
   
})

$('#id_codigo').focusout(function(){
    let valor = $(this).val();
    
    if(valor == ''){
        $('#equipamento-nome').val("Equipamento");
    }

})