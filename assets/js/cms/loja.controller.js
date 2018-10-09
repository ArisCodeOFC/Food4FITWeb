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

        //replaceWith -> ''substituir por''
        function listar(){
            $.get("lista-nossas-lojas.php", function(dados){
                $(".shops-view").replaceWith(dados);
            })
        }

    $elemento.find("#estado").change(function(evento){
             var id = $(this).val();
        $.get("../api/v1/cidade/select/"+id,
            function(lista){
            //Limpar o select, antes de selecionar algum item
            //Pegar o select com jquery, pegando o ID da cidade
            //com empty
            $("#cidade").empty();
            //Percorrendo a lista, fazendo um contador
            for(var contador = 0; contador < lista.length; contador++){
                //Criando uma variavel, para pegar a cidade no indice que ela tiver, seguindo o contador
                //cidade -> é um objeto, tem atributos mas não tem métodos
                var cidade = lista[contador];
                //append -> pega um item e adiciona em algum lugar
                //parenteses no final significa para chamar uma função
                //Estou adicionando no HTML
                $("#cidade").append("<option value='"+cidade.id+"'>"+cidade.cidade+"</option>");
            }
        });

    });
    //Criando a função do botão excluir, pegando o id
    //find -> procura dentro
    //closet -> procura fora
    //$elemento.find(".deletar-loja").click(function(){
    //elemento -> representa a pagina inteira
    //on -> quando voce clicar em tal coisa, irá executar outra
    $elemento.on("click", ".deletar-loja", function(){
        //pegando primeiro a section para depois pegar o atributo da data que eu coloquei (data-id)
        var pegarId = $(this).closest(".shop-card").data("id");
        $.get("../api/v1/loja/excluir/"+pegarId, function(){
            listar();
        });
    });
});
