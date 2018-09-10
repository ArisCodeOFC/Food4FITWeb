<?php
    require_once("UploadModel.class.php");

    /*
    * Classe abstrata, ou seja, não pode ser inicializada, apenas extendida
    * Serve como base para classes modelo, com um método construtor que transforma um array em propriedades do objeto
    */
    abstract class Model extends UploadModel {
        /*
        * Método construtor
        * @param $classe Classe modelo que o json será descarregado (__CLASS no escopo de uma classe modelo)
        * @param $dados Array de dados para serem descarregados na classe
        */
        public function __construct($classe, $array = null) {
            // Verifica se o array não é nulo
            if ($array) {
                // Faz um loop em todas as propriedades do array
                foreach ($array as $propriedade => $valor) {
                    // Verifica se o mesmo nome da propriedade do array existe na classe modelo
                    if (property_exists($classe, $propriedade)) {
                        // Define a propriedade na classe, recebendo como valor o que veio do array
                        $this->{$propriedade} = $valor;
                    }
                }
            }
        }
    }
?>
