 //Em seguida após a class VIEW, vou para controller.js
//Interação com o usuario utilizando AJAX (OBRIGATORIO)
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
     //Aqui faz o AJAX

        $.ajax({
            type:"POST",
            //URL que eu coloquei no controller pegando a informacao do meio
            url:"../api/v1/loja/inserir",
            //data -> Dados do formulario
            //serializeObject - > Pega todo meu formulario
            //transformando em um objeto
            //da quals erá pego pelo PHP
            data:$elemento.find("#form-loja").serializeObject(),
            //dados -> resultado do AJAX
            success: function(dados){

                listar();
            }
        })
    });

        function listar(){
            $.get("lista-nossas-lojas.php", function(dados){
                $(".shops-view").replaceWith(dados);
            })
        }

});
