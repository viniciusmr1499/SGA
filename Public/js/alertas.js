$(".confirm").each(function() {
    $(this).confirm({
        title: 'Excluir usuário',
        content: 'Tem certeza que deseja excluir este usuario?',
        type: 'dark',
        typeAnimated: true,
        buttons: {
            confirmar: function () {
                location.href = this.$target.attr('href');
            },
            cancelar: function () {
                $.alert('Ação cancelada!');
            }
        }
    });
});

$(".confirmMaterial").each(function() {
    $(this).confirm({
        title: 'Excluir material',
        content: 'Tem certeza que deseja excluir este material?',
        type: 'dark',
        typeAnimated: true,
        buttons: {
            confirmar: function () {
                location.href = this.$target.attr('href');
            },
            cancelar: function () {
                $.alert('Ação cancelada!');
            }
        }
    });
});

function validar(){
    const senha = formuser.senha.value;
    const rep_senha = formuser.rep_senha.value;

    if(rep_senha == '' || senha.length <=5){
        $.alert({
            title: 'ATENÇÃO!',
            content: 'Preencha o campo "SENHA" com no mínimo 6 caracteres!',
            type: 'orange',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'Fechar',
                    btnClass: 'btn-warning',
                    close: function(){
                    }
                },
            }
        });

        formuser.senha.focus();
        return false;
    }

    if(rep_senha == '' || rep_senha.length <=5){

        $.alert({
            title: 'ATENÇÃO!',
            content: 'Preencha o campo "CONFIRMAR SENHA" com no mínimo 6 caracteres!',
            type: 'orange',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'Fechar',
                    btnClass: 'btn-warning',
                    close: function(){
                    }
                },
            }
        });

        formuser.rep_senha.focus();
        return false;
    }

    if(senha != rep_senha){
        $.alert({
            title: 'Inválido!',
            content: 'Senhas diferentes',
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

        formuser.rep_senha.focus();
        return false;
    }
}

function validadorImage(){
    
    var upload = document.getElementById("anexo");
    if(upload != null){
        upload.addEventListener("change", function(e) {
            var size = upload.files[0].size;
            if(size > 2097152) { //2MB
                $.alert({
                    title: 'OPS!',
                    content: 'O Tamanho da imagem não pode ser superior a 2MB!',
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
                upload.value = ""; //Limpa o campo
            } 
        });
    }
}

validadorImage();