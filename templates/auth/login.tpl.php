<form method="POST" class="box text-center">
    <!-- <h1 class="b__title">Login</h1>  -->
    <img src="/img/SGaeris.png" alt="Aeris" class="avatar img-fluid">
    <p>
        <!-- Olá, <?php echo $_SESSION['userHome']?>, seja bem-vindo! -->
        Olá, <?php echo $_SESSION['user']?>, seja bem-vindo!
    </p>
    <p>Clique em "ENTRAR" para acessar o sistema SGA</p>
    
    <!-- <div class="txtb">
        <input type="email" name="email" id="email">
        <span data-placeholder="Email"></span>
    </div>

    <div class="txtb">
        <input type="password" name="senha" id="senha">
        <span data-placeholder="Senha"></span>
    </div> -->

    <input type="submit" value="Entrar" class="btn__customized">
</form>

