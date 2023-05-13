<?php

namespace app\webservices;

class Speedio{

    const url_base='https://api-publica.speedio.com.br'; //url base da api do Speedio

    public function consultarCNPJ($cnpj){
        
        $cnpj=preg_replace('/\D/','',$cnpj); //Substitui os caracteres "." e "-" do CNPJ
        return $this->get('/buscarcnpj?cnpj='.$cnpj);

    }

    public function get($resource){

        $endpoint=self::url_base.$resource;

        $curl=curl_init();

        curl_setopt_array($curl,[
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_CUSTOMREQUEST=>'GET'
        ]);

        $response=curl_exec($curl);

        curl_close($curl);

        $responseArray=json_decode($response,true);

        return is_array($responseArray)?$responseArray:[];

      
    }

}