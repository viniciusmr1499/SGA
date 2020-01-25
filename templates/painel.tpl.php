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
    <link rel="stylesheet" href="/resources/select2/dist/css/select2.min.css">
    <title>Painel - SGA</title>
</head>
<body>   
    <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <div class="sidebar-heading">
                    <a href="/painel">
                        <img src="/img/SGaeris.png" style="padding-bottom:1rem;"height="auto" width="130px"alt="Logo"> 
                    </a>   
                </div>

                <div class="list-group list-group-flush">
                    <a href="/painel" class="list-group-item"><i class="fas fa-home"></i> Início</a>

                    <div class="dropdown">
                        <a href="materiais.php" aria-haspopup="true" aria-expanded="false" role="button" class="list-group-item dropdown-toggle" data-toggle="dropdown"><i id="dropdownMenuLink" class="fas fa-hand-holding-usd"></i> Materiais</a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">
                            <a href="/painel/pages/materiais" class="dropdown-item list-group-item"><i class="fas fa-notes-medical"></i> Estoque</a>
                            <a href="/painel/pages/deliberar-material" class="list-group-item" style="letter-spacing:1.2px;"><i class="fas fa-dolly"></i> Despache</a>
                        </div>
                        <a href="/painel/pages/historico" class="dropdown-item list-group-item"><i class="fas fa-history"></i> Histórico</a>   
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
                            <a href="" target="" class="nav-link ghost text-gray-600"><i class="fas fa-book-open"></i>&nbsp;Tutorial SGA</a>
                        </li>
                        <!-- Nav Item - Messages -->
                        <div class="topbar-divider d-none d-sm-block"></div>
                        
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo 'Olá, ' . $_SESSION['nome'];?></span>
                                <?php if(!empty($_SESSION['avatar'])) :?>
                                <img class="img-profile rounded-circle" src="/img/<?php echo $_SESSION['avatar'] ?>">
                                <?php else:?>
                                <i class="fas fa-user-circle rounded-circle" style="font-size:1.8rem"></i>
                                <?php endif;?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/painel/user/<?php echo $_SESSION['id_usuario'];?>/perfil">
                                    <i class="fas fa-address-card mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <hr>
                                <a class="dropdown-item" href="/auth/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </header>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Redefinição de Senha</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" name="formuser" action="/painel/user/<?php echo $_SESSION['id_usuario'] ?>/redefinir-senha">
                                <div class="form-group">
                                    <label for="senha" class="col-form-label">Senha:</label>
                                    <input type="password" name="senha" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="rep_senha" class="col-form-label">Confirmar Senha:</label>
                                    <input type="password" name="rep_senha" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn_register" onclick="return validar();">Salvar</button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- fim do modal  -->            

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
    <script><?php flash();?></script> 
    <script src="/js/alertas.js"></script>
    <script src="/resources/select2/dist/js/select2.min.js"></script>
    <script src="/resources/jquery-mask/dist/jquery.mask.min.js"></script>
    <script src="/js/script.js"></script>
    <script src="/js/ajax.js"></script>
</body>
</html>