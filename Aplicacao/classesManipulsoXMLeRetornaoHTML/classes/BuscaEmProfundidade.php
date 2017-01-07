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
        //echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>";
        //echo key($array);
        //print_r($array);
        
        $html = '';
        
        foreach($array as $key => $valor)
        {
            if(is_array($valor))
            { 
                $html .= $this->converterArrayDaCategoriaCorrespondenteEmHtml($key,$valor);
            }
            else
            {
                $html .= $valor;
            }   
        }
        
        return $html;
    }
    
    private function converterArrayDaCategoriaCorrespondenteEmHtml($chave,$arrayDaCategoria)
    {
        if($chave == "atributo")
            return $this->converterArrayDo_Atributo_EmHtml($arrayDaCategoria);
        if($chave == "funcao")
            return $this->converterArrayDa_Funcao_EmHtml($arrayDaCategoria);
    }
    
    private function converterArrayDo_Atributo_EmHtml($arrayDoAtributo)
    {
        $html = '';
        
        if(array_key_exists(0,$arrayDoAtributo))
            for($i = 0;$i < count($arrayDoAtributo);$i++)
                $html .= $this->converteArrayNoHtmlDoAtributo($arrayDoAtributo[$i]);
        else
            $html .= $this->converteArrayNoHtmlDoAtributo($arrayDoAtributo);
        
        return $html;
    }
    
    private function converterArrayDa_Funcao_EmHtml($arrayDaFucao)
    {    
        $html = '';
        
        if(array_key_exists(0,$arrayDaFucao))
            for($i = 0;$i < count($arrayDaFucao);$i++)
                $html .= $this->converteArrayNoHtmlDaFuncao($arrayDaFucao[$i]);
        else
            $html .= $this->converteArrayNoHtmlDaFuncao($arrayDaFucao);
        
        return $html;
    }
    
    private function converteArrayNoHtmlDoAtributo($arrayDoAtributo)
    {
        $tipo = $arrayDoAtributo['@attributes']['tipo'];
        $nome = $arrayDoAtributo['@attributes']['nome'];
        $conteudo = $arrayDoAtributo['valor'];
            
        $html = "<br/>";
        $html .= " Varios atributo: ".$tipo." - ".$nome." - ".$conteudo;
        return $html;
    }
    
    private function converteArrayNoHtmlDaFuncao($arrayDaFucao)
    {
        $retorno = $arrayDaFucao['@attributes']['retorno'];
        $nome = $arrayDaFucao['@attributes']['nome'];
        $parametro1 = $arrayDaFucao['funcao__parametros']['valor'][0];
        $parametro2 = $arrayDaFucao['funcao__parametros']['valor'][1];
        $conteudo = $arrayDaFucao['funcao_bd'];
                    
        $html = "-------------------------------------<br/>";
        $html .= $retorno." --- ";
        $html .= $nome." --- ";
        $html .= $parametro1." --- ";
        $html .= $parametro2." --- ";
        if(is_array($conteudo))
            $html .= $this->buscaRecursivaRetornandoHtml2($conteudo);
        else
            $html .= $conteudo;
        $html .= "-------------------------------------<br/>";
        //print_r($conteudo);
                    
        return $html;
    }
} 
?> 