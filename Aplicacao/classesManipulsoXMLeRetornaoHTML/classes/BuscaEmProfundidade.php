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
    
    function buscaRecursivaRetornandoHtml($array)
    {
        foreach($array as $key => $valor)
        {
            if(is_array($valor))
            {
                
                if($key == "atributo"){
                    for($i = 0;$i < count($valor);$i++){
                        $tipo = $valor[$i]['@attributes']['tipo'];
                        $nome = $valor[$i]['@attributes']['nome'];
                        $conteudo = $valor[$i]['valor'];
                        
                        echo "<div class='tipo'>".$tipo."</div><div class='nome' >".$nome."</div><div class='valor' >".$conteudo.'</div>';
                    }
                }if($key == "funcao"){
                    echo "---------------------------------------------";
                    //print_r($valor);
                    $retorno = $valor['@attributes']['retorno'];
                    $nome = $valor['@attributes']['nome'];
                    $parametro1 = $valor['funcao__parametros']['valor'][0];
                    $parametro2 = $valor['funcao__parametros']['valor'][1];
                    $conteudo = $valor['funcao_bd'];
                    
                    $html = "<div class='funcao' ><div class='retorno' >".$retorno."</div>";
                    $html .= "<div class='retorno' >".$nome."</div>";
                    $html .= "<div class='parenteses' >(</div>";
                    $html .= "<div class='valor'>".$parametro1."</div>";
                    $html .= "<div class='valor'>".$parametro2."</div>";
                    $html .= "<div class='parenteses' >)</div>";
                    $html .= "<div class='estrutura' >{</div>";
                    $html .= "<div class='conteudo' >".$conteudo."</div>";
                    $html .= "<div class='estrutura' >}</div>";
                    
                    echo $html;
                    //$this->buscaRecursivaRetornandoHtml($conteudo);
                }
            }
            else
            {
                return $conteudo;
            }   
        }
    }
} 
?> 