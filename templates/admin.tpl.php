<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/dest/bootstrap.min.css">
    <link rel="stylesheet" href="/css/dest/style.css">
    <title>Admin</title>
</head>
<body>   
    
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
                    <a href="/admin/usuarios" class="list-group-item"><i class="fas fa-user"></i> Usuários</a>
                    
                    <div class="dropdown">
                        <a href="materiais.php" aria-haspopup="true" aria-expanded="false" role="button" class="list-group-item dropdown-toggle" data-toggle="dropdown"><i id="dropdownMenuLink" class="fas fa-hand-holding-usd"></i> Inventário</a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">
                            <a href="/admin/materiais" class="dropdown-item list-group-item">Cadastro de Ativos</a>
                            <a href="/admin/historico" class="dropdown-item list-group-item">Histórico</a>   
                        </div>
                    </div>
                </div>
                
            </div>

        <div id="page-content-wrapper">
            <header id="header">
                <nav class="navbar navbar-expand-lg navbar-light container-fluid">
                    
                    <span id="menu-toggle" class="h__toggle fas fa-chevron-circle-left"></span>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#menu" aria-expanded="false" aria-controls="true">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav ml-5">
                            <li class="nav-item">
                                <form class="search" action="" method="POST">
                                    <div class="input-group">
                                        <input type="text" name="pesquisa" class="form-control bg-light" placeholder="Pesquisar" aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" id="button" type="submit">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li class="nav-item right">
                                <div class="dropdown">
                                    <a href="#" class="nav-link active " data-toggle="dropdown" id="menu" aria-haspopup="true" aria-expanded="false" role="button">
                                        <span><i class="fas fa-user-circle"></i></span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <span class="dropdown-item h__text--admin"><?php echo 'Olá, Admin'?></span>
                                        <a class="dropdown-item h__text--admin" href="#">Perfil</a>    
                                        <a href="" class="dropdown-item h__text--admin"><i class="fas fa-sign-out-alt"></i>Sair</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </nav>
            </header>

            <div class="container-fluid">
                <?php include $content ?>
            </div>
            <footer id="footer">
                <p class="f__text">
                    &copy; Aeris energy 2010 - <?php echo date('Y')?> - Todos os direitos reservados
                </p>
            </footer>
        </div>      
        <!-- /#page-content-wrapper -->
    </div>
    
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/efect-toggle.js"></script>
</body>
</html>