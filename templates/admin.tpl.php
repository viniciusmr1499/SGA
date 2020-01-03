<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/dest/bootstrap.min.css">
    <link rel="stylesheet" href="/css/dest/style.css">
    <link rel="stylesheet" href="/resources/pinotify/pnotify.custom.min.css">
    <link rel="stylesheet" href="/resources/jquery-confirm/dist/jquery-confirm.min.css">
    <title>Painel ADM- SGA</title>
</head>
<body id="page-top">   
    
    <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <div class="sidebar-heading">
                    <a href="/admin">
                        <img src="/img/logo.png" style="padding-bottom:1rem;"height="auto" width="130px"alt="Logo"> 
                    </a>   
                </div>

                <div class="list-group list-group-flush">
                    <a href="/admin" class="list-group-item"><i class="fas fa-home"></i> Início</a>
                    <a href="/admin/users" class="list-group-item"><i class="fas fa-user"></i> Usuários</a>
                    
                    <div class="dropdown">
                        <a href="materiais.php" aria-haspopup="true" aria-expanded="false" role="button" class="list-group-item dropdown-toggle" data-toggle="dropdown"><i id="dropdownMenuLink" class="fas fa-hand-holding-usd"></i> Inventário</a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">
                            <a href="/admin/pages/materiais" class="dropdown-item list-group-item"><i class="fas fa-notes-medical"></i> Cadastro de Ativos</a>
                            <a href="/admin/pages/historico" class="dropdown-item list-group-item"><i class="fas fa-history"></i> Histórico</a>   
                        </div>
                    </div>
                </div>
                
            </div>

        <div id="page-content-wrapper">
            <header>
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <span id="menu-toggle" class="h__toggle fas fa-chevron-circle-left"></span>
                    <span class="ml-3 navbar-brand text-gray-700 text-justify">SGA - Sistema de Gerenciamento Aeris</span>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ghost">
                            <a href="#" target="" class="nav-link ghost text-gray-600"><i class="fas fa-book-open"></i>&nbsp;Manual SGA</a>
                        </li>
                        <!-- Nav Item - Messages -->
                        <div class="topbar-divider d-none d-sm-block"></div>
                        
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo 'Olá, ' . $_SESSION['usuario'];?></span>
                                <img class="img-profile rounded-circle" src="/img/me.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/auth/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                                
                            </div>
                        </li>
                    </ul>

                </nav>
            </header>

            <div class="container-fluid mb-5 pb-5">
                <?php include $content ?>
            </div>
            <footer id="footer">
                <p class="f__text">
                    &copy; Aeris energy 2010 - <?php echo date('Y')?> - Todos os direitos reservados - v1.0.0
                </p>
            </footer>
        </div>      
        <!-- /#page-content-wrapper -->
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    
   
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/efect-toggle.js"></script>
    <script src="/js/filter.js"></script>
    <script src="/js/admin.js"></script>
    <script src="/js/datatables/jquery.dataTables.min.js"></script>
    <script src="/js/datatables/dataTables.bootstrap4.js"></script>
    <script src="/resources/pinotify/pnotify.custom.min.js"></script>
    <script src="/resources/jquery-confirm/dist/jquery-confirm.min.js"></script>
    <script>
        <?php flash();?>
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

                if(senha == '' || senha.length <=5){
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
    </script>
    <script>
        // document.addEventListener('trix-attachment-add',function(){
        //     const attachment = event.attachment;

        //     if(!attachment.file){
        //         return
        //     } 

        //     const form = new FormData();
        //     form.append('file',attachment.file);

        //     $.ajax({
        //         url: '/admin/upload/image',
        //         method: 'post',
        //         data, form,
        //         contentType:false,
        //         processData: false,
        //     }).done(function(){
        //         console.log('deu certo');
        //     }).fail(function(){
        //         console.log('deu errado!');
        //     });
        // });
    </script>
    
</body>
</html>