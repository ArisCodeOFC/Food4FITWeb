<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Food 4fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/stylesheet.css">
	<link rel="stylesheet" href="assets/css/mobile-stylesheet.css">
	<link rel="stylesheet" href="assets/css/font-style.css">
	<link rel="stylesheet" href="assets/css/sobre-style.css">
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.html") ?>
    <section class="main">
        <header id="header-flat">
            <span id="page-title" class="animate fadeInUp">SOBRE A FOOD 4FIT</span><!-- TÍTULO DA PÁGINA -->
            <article id="about-us-block" class="margin-top-15px margin-bottom-60px">
                <div id="about-us-content" class="animate fadeInUp">
                    <div id="text-about-us" class="margin-bottom-15px">
                        <h1 class="padding-left-60px margin-bottom-15px">Sobre Nós</h1><!-- TÍTULO DA SESSÃO -->
                        <p class="padding-left-60px padding-right-60px">
                            A confeccionista fitness FOOD 4FIT nasceu em 2015 com louvor no ramo de comida saudável. Com ideais simples mas diretos, a
                            FOOD 4FIT atua no mercado de manufaturação de pratos saudáveis para dietas controladas. A FOOD 4FIT tem como principal
                            objetivo, entregar um produto de qualidade para os seus clientes de forma ágil e com alto nível de atenção aos detalhes. Atualmente
                            é a rede varejista que mais vende refeições fitness no estado de São Paulo, e a cada dia, tem o sonho acrescido de se tornar a maior
                            loja online brasileira que disponibiliza um sistema modular, intuitivo e minimalista de vendas de pratos fitness.
                        </p>
                    </div>
                    <figure>
                        <img src="assets/images/sobre-nos1.jpeg">
                    </figure>
                </div>
            </article>
            <section id="physical-structure-block" class="margin-bottom-60px">
                <div id="physical-structure-content" class="animate fadeInUp">
                    <div id="text-physical-structure" class="margin-bottom-15px">
                        <h1 class="padding-left-60px margin-bottom-15px">Estrutura Física</h1><!-- TÍTULO DA SESSÃO -->
                        <p class="padding-left-60px padding-right-60px">
                            A FOOD 4FIT não atua com balcão físico, mas possui dezenas de cozinhas preparadas por todo o estado de São Paulo. No ano de
                            2017, foram adquiridos três galpões com o objetivo de suprir as inúmeras vendas diárias por encomenda. A FOOD 4FIT investe em
                            todos os departamentos necessários, para manter um rigoroso padrão de qualidade no controle contra a má experiência com os
                            seus clientes.
                            Com parcerias afirmadas de ótima procedência, a FOOD 4FIT mantém excelente relacionamento com a industria alimentícia, sempre
                            contando com fornecedores de alto nível. A matéria prima é cuidadosamente coletada, separada, transportada e preparada.
                        </p>
                    </div>
                    <figure>
                        <img src="assets/images/sobre-nos1.jpeg">
                    </figure>
                </div>
            </section>
            <section id="online-service-block" class="margin-bottom-60px">
                <div id="online-service-content" class="animate fadeInUp">
                    <div id="text-online-service" class="margin-bottom-15px">
                        <h1 class="padding-left-60px margin-bottom-15px">Serviço Online</h1><!-- TÍTULO DA SESSÃO -->
                        <p class="padding-left-60px padding-right-60px">
                            Nesse mesmo ano, 2018, a FOOD 4FIT investiu muito na infraestrutura virtual. Agora atuando tanto na web com vendas, quanto em
                            dispositivos mobile para gerenciamento da saúde individual, a FOOD 4FIT busca manter o melhor relacionamento entre empresa x
                            cliente possível, com a maior qualidade que puder em seus produtos.
                            Somente no ano de 2017, a FOOD 4FIT obteve seu lucro líquido acrescido em 20% em relação ao ano anterior. Com o investimento
                            em atuação na internet, a empresa almeja subir ainda mais este lucro, tendo em vista que o e-commerce é, atualmente, um dos
                            maiores meios de comércio no mundo, se não o maior.

                        </p>
                    </div>
                    <figure>
                        <img src="assets/images/sobre-nos1.jpeg">
                    </figure>
                </div>
            </section>
        </header>
	</section>
	<?php require_once("components/sidebar-left.html"); ?><!-- MENU LATERAL ESQUERDO VIA PHP -->
	<?php require_once("components/sidebar-right.html"); ?><!-- MENU LATERAL DIREITO VIA PHP -->

	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
