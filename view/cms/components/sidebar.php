<div id="sidebar">
    <div id="sidebar-header">
        <h1>FOOD 4FIT<br>CMS</h1>
        <a href="#" id="sidebar-collapse">
            <img src="../assets/images/icons/menu-lateral.svg" alt="Menu Lateral">
        </a>
    </div>
    <div class="separator"></div>
    <div id="perfil">
        <div id="avatar" data-siglas="<?= $funcionario->getIniciaisNome(); ?>"></div>
        <div id="informacoes">
            <div id="informacoes-content">
                <span id="nome"><?= $funcionario->nome ?></span>
                <span id="email"><?= $funcionario->email ?></span>
                <a href="#" id="dropdown"></a>
            </div>
        </div>
    </div>
    <div class="separator"></div>
    <nav>
        <a href="#" data-page-load="dashboard">
            <span class="image"><img src="../assets/images/cms/icons/pagina-inicial.svg" alt="Dashboard"></span>
            <span class="label">Dashboard</span>
        </a>
        <a href="#">
            <span class="image"><img src="../assets/images/cms/icons/estatisticas.svg" alt="Estatísticas"></span>
            <span class="label">Estatísticas</span>
        </a>
        <a href="#">
            <span class="image"><img src="../assets/images/cms/icons/pratos.svg" alt="Pratos"></span>
            <span class="label">Pratos</span>
        </a>
        <a href="#">
            <span class="image"><img src="../assets/images/cms/icons/ingredientes.svg" alt="Ingredientes"></span>
            <span class="label">Ingredientes</span>
        </a>
        <a href="#" data-page-load="sobre">
            <span class="image"><img src="../assets/images/cms/icons/publicacoes.svg" alt="Publicações"></span>
            <span class="label">Publicações</span>
        </a>
        <a href="#">
            <span class="image"><img src="../assets/images/cms/icons/armario.svg" alt="Armário"></span>
            <span class="label">Armário</span>
        </a>
        <a href="#">
            <span class="image"><img src="../assets/images/cms/icons/clientes.svg" alt="Clientes"></span>
            <span class="label">Clientes</span>
        </a>
        <a href="#">
            <span class="image"><img src="../assets/images/cms/icons/niveis-de-acesso.svg" alt="Níveis de Acesso"></span>
            <span class="label">Níveis de Acesso</span>
        </a>
        <a href="#">
            <span class="image"><img src="../assets/images/cms/icons/pedidos.svg" alt="Pedidos"></span>
            <span class="label">Pedidos<span class="badge">12</span></span>
        </a>
        <a href="sobre.php">
            <span class="image"><img src="../assets/images/cms/icons/pagina-inicial.svg" alt="Sobre a Empresa"></span>
            <span class="label">Sobre a Empresa</span>
        </a>
        <a href="#">
            <span class="image"><img src="../assets/images/cms/icons/parceiros.svg" alt="Parceiros"></span>
            <span class="label">Parceiros</span>
        </a>
    </nav>
    <div class="separator"></div>
    <nav>
        <a href="#">
            <span class="image"><img src="../assets/images/cms/icons/meu-perfil.svg" alt="Meu perfil"></span>
            <span class="label">Meu perfil</span>
        </a>
        <a href="#">
            <span class="image"><img src="../assets/images/cms/icons/fale-conosco.svg" alt="Fale Conosco"></span>
            <span class="label">Fale Conosco<span class="badge">12</span></span>
        </a>
        <a href="#">
            <span class="image"><img src="../assets/images/cms/icons/a-fazer.svg" alt="A fazer"></span>
            <span class="label">A fazer<span class="badge">9</span></span>
        </a>
        <a href="#">
            <span class="image"><img src="../assets/images/cms/icons/outras-funcoes.svg" alt="Outras Funções"></span>
            <span class="label">Outras Funções</span>
        </a>
        <a href="#">
            <span class="image"><img src="../assets/images/cms/icons/ajuda.svg" alt="Ajuda"></span>
            <span class="label">Ajuda</span>
        </a>
        <a href="#" class="btn-logout">
            <span class="image"><img src="../assets/images/cms/icons/sair.svg" alt="Sair"></span>
            <span class="label">Sair</span>
        </a>
    </nav>
    <div id="tooltip"></div>
</div>
