<?php

require_once '../classes/BuscaEmProfundidade.php';

$BEF = new BuscaEmProfundidade();

//if (file_exists("xmlParaTeste/carroSimples.xml")) {
        $xml = simplexml_load_file("xmlParaTeste/codigo2.xml");
        $xml = json_decode(json_encode($xml), TRUE);
    
        // Teste numero 1: Imprimir a arvore do array;
        //$BEF->imprimirArray($xml);
        // Teste numero 2: Percorrer uma camadas do array
        //$BEF->percorrerUmCamadasDoArray($xml);
        // Teste numero 3: Percorrer duas camadas do array
        //$BEF->percorrerDuasCamadasDoArray($xml);
        // Teste numero 4: Percorrer tres camadas do array
        //$BEF->percorrerTresCamadasDoArray($xml);
        // Teste numero 5: Busca recursiva 
        //$BEF->buscaRecursiva($xml);
        // Teste numero 5: Fatorial 
        //echo $BEF->fatorial(3);
        // Teste numero 6: lendo xml e retornando a arvore com o html
        //$xml = simplexml_load_file("xmlParaTeste/codigo2.xml");
        //$xml = json_decode(json_encode($xml), TRUE);
        //$BEF->buscaRecursivaRetornandoHtml($xml);

        //$xml = simplexml_load_file("xmlParaTeste/codigo1.xml");
        //$xml = json_decode(json_encode($xml), TRUE);
        //$BEF->buscaRecursivaRetornandoHtml2($xml);

        $xml = simplexml_load_file("xmlParaTeste/codigo3.xml");
        $xml = json_decode(json_encode($xml), TRUE);
        echo $BEF->buscaRecursivaRetornandoHtml2($xml);

   /* } else 
        exit('Falha ao abrir test.xml.'); */


?>

