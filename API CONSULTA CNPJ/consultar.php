<?php

    require 'app/webservices/Speedio.php';
    use app\webservices\Speedio;

    $obSpeedio=new Speedio;

    $cnpj='04601165000501'; //CNPJ a ser consultado

    $resultado = $obSpeedio->consultarCNPJ($cnpj);

    if(empty($resultado)){

        die('Erro ao consulta do CNPJ!');
    }

    if(isset($resultado['error'])){
        
        die($resultado['error']);
    }

    echo "CNPJ:".$cnpj;
    echo "RAZÃO SOCIAL:".$resultado['RAZAO SOCIAL'];
    echo "NOME FANTASIA:".$resultado['NOME FANTASIA'];

?>