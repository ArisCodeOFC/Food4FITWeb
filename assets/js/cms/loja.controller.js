//f4fApp -> Variavel que tem por padrão no CMS, representando o applicativo ao todo
//addController -> Instanciando a controller
//Função que representa a página que esou trabalhando
//Substituindo a Rota
//Elemento -> Parte do HTML que estou trabalhando(view)
//#form-loja - >I d do formulário
//addControler -> Passo o nome da controler que estou adicionando
//Submit -> Evento, representando quando eu SUBMTER o formulário (clicar no boão enviar)
//Evento -> Nativo da JS, usado para mosificar comportamento padrão, podendo ser um botão ou outras coisas relacionadas a EVENTOS
//preventDefault -> Pega o evento para, chamando um método que previne o comportamento padrão, sendo a ação assicrona no site
f4fApp.addController("LojaController", function($this, $elemento) {
    $elemento.find("#form-loja").submit(function(evento) {
        evento.preventDefault();
        // FAZER O AJAX
        //../api/v1/loja/inserir -> Irei estar chamando LojaController.class.php
    });
});
