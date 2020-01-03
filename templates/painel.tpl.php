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
    <title>Painel - SGA</title>
</head>
<body id="page-top">   
    
    <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <div class="sidebar-heading">
                    <a href="/painel">
                        <img src="/img/logo.png" style="padding-bottom:1rem;"height="auto" width="130px"alt="Logo"> 
                    </a>   
                </div>

                <div class="list-group list-group-flush">
                    <a href="/painel" class="list-group-item"><i class="fas fa-home"></i> Início</a>
                    <div class="dropdown">
                        <a href="#" aria-haspopup="true" aria-expanded="false" role="button" class="list-group-item dropdown-toggle" data-toggle="dropdown"><i id="dropdownMenuLink" class="fas fa-hand-holding-usd"></i> Inventário</a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">
                            <a href="/painel/pages/materiais" class="dropdown-item list-group-item"><i class="fas fa-notes-medical"></i> Cadastro de Ativos</a>
                            <a href="/painel/pages/historico" class="dropdown-item list-group-item"><i class="fas fa-history"></i> Histórico</a>   
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
                            <a href="" target="" class="nav-link ghost text-gray-600"><i class="fas fa-book-open"></i>&nbsp;Manual SGA</a>
                        </li>
                        <!-- Nav Item - Messages -->
                        <div class="topbar-divider d-none d-sm-block"></div>
                        
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="/auth/logout" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php $admin = 'Vinicius'; echo "Olá, " . $admin ?></span>
                                <img class="img-profile rounded-circle" src="/img/me.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/admin/pages/1/ver-perfil">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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
    </script>
    
    
</body>
</html>