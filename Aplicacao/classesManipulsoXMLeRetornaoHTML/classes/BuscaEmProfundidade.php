<?php 
class BuscaEmProfundidade{ 
    public $palavraDeTeste = 'Palavra de Teste'; 
    
    function BuscaEmProfundidade() 
    { 
        //echo $this->palavraDeTeste; 
    } 
    
    function imprimirArray($array)
    {
        print_r($array);
    }
    
    function percorrerUmCamadasDoArray($array)
    {
        foreach($array as $key => $conteudo)
        {
            echo $key." ";
            print_r($conteudo);
        }
    }
    
    function percorrerDuasCamadasDoArray($array)
    {
        foreach($array as $key => $conteudo)
        {
            foreach($conteudo as $key => $conteudo)
            {
                echo $key." ";
                print_r($conteudo);
            }
        }
    }
    
    function percorrerTresCamadasDoArray($array)
    {
        foreach($array as $key => $conteudo)
        {
            foreach($conteudo as $key => $conteudo)
            {
                if(is_array($conteudo)){
                    foreach($conteudo as $key => $conteudo)
                    {
                        echo $key." ";
                        print_r($conteudo);
                    }
                }
            }
        }
    }
    
    function fatorial($numero){
        
        if($numero > 0) {
            return $numero * $this->fatorial($numero-1);
        } else {
            return 1;
        }
    }
    
    function buscaRecursiva($array)
    {
        if(is_array($array))
        {
            foreach($array as $key => $conteudo)
            {
                $this->buscaRecursiva($conteudo);
            }
        }else{
            echo $array." ";
        }
    }
    
    function buscaRecursivaRetornandoHtml2($array)
    {
        foreach($array as $key => $valor)
        {
            if(is_array($valor))
            { 
                if($key == "atributo"){
                    echo $this->converterArrayDo_Atributo_EmHtml($valor);
                }if($key == "funcao"){
                    $this->converterArrayDa_Funcao_EmHtml($valor);
                }
            }
            else
            {
                return $conteudo;
            }   
        }
    }
    
    private function converterArrayDo_Atributo_EmHtml($arrayDoAtributo)
    {
        if(array_key_exists(0,$arrayDoAtributo))
        {
            echo $this->converteMaisDeUmAtributo($arrayDoAtributo);
        }
        else
        {
            echo $this->converteUmAtributo($arrayDoAtributo);
        }
    }
    
    private function converterArrayDa_Funcao_EmHtml($arrayDaFucao)
    {    
        if(array_key_exists(0,$arrayDaFucao))
        {
            echo $this->converteMaisDeUmaFucao($arrayDaFucao);
        }
        else
        {
            echo $this->converteUmaFuncao($arrayDaFucao);
        }
    }
    
    private function converteMaisDeUmAtributo($arrayDoAtributo)
    {
        $html = '';
        
        for($i = 0;$i < count($arrayDoAtributo);$i++)
        {
            $tipo = $arrayDoAtributo[$i]['@attributes']['tipo'];
            $nome = $arrayDoAtributo[$i]['@attributes']['nome'];
            $conteudo = $arrayDoAtributo[$i]['valor'];

            $html .= " Varios atributo: ".$tipo." - ".$nome." - ".$conteudo;
        }
        
        return $html;
    }
    private function converteUmAtributo($arrayDoAtributo)
    {
        $tipo = $arrayDoAtributo['@attributes']['tipo'];
        $nome = $arrayDoAtributo['@attributes']['nome'];
        $conteudo = $arrayDoAtributo['valor'];

        return " So um atributo: ".$tipo." - ".$nome." - ".$conteudo; 
    }
    
    private function converteMaisDeUmaFucao($arrayDaFucao)
    {
        $html = '';
        
        for($i = 0;$i < count($arrayDaFucao);$i++)
        {
            $retorno = $arrayDaFucao[$i]['@attributes']['retorno'];
            $nome = $arrayDaFucao[$i]['@attributes']['nome'];
            $parametro1 = $arrayDaFucao[$i]['funcao__parametros']['valor'][0];
            $parametro2 = $arrayDaFucao[$i]['funcao__parametros']['valor'][1];
            $conteudo = $arrayDaFucao[$i]['funcao_bd'];
                    
            $html = "-------------------------------------<br/>";
            $html .= $retorno." --- ";
            $html .= $nome." --- ";
            $html .= $parametro1." --- ";
            $html .= $parametro2." --- ";
            $html .= $conteudo." --- ";
        }
        
        return $html;
    }
    
    private function converteUmaFuncao($arrayDaFucao)
    {
        $retorno = $arrayDaFucao['@attributes']['retorno'];
        $nome = $arrayDaFucao['@attributes']['nome'];
        $parametro1 = $arrayDaFucao['funcao__parametros']['valor'][0];
        $parametro2 = $arrayDaFucao['funcao__parametros']['valor'][1];
        $conteudo = $arrayDaFucao['funcao_bd'];
                    
        $html = $retorno." --- ";
        $html .= $nome." --- ";
        $html .= $parametro1." --- ";
        $html .= $parametro2." --- ";
        $html .= $conteudo." --- ";
                    
        return $html;
    }
} 
?> 