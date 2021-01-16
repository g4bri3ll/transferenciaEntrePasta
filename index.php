<?php

//Fuso horário
date_default_timezone_set('America/Sao_Paulo');

//data de hoje
$data = date('Y-m-d H:i:s');

//Pasta de origem
$pathOrigem = dir('C:\Users\gabrielborges\Documents\move camera');

//Pasta de destino
$pathDestino = dir('C:\Users\gabrielborges\Pictures\receber_arquivos');

/**
 * Receber os diretorios para lista tudo dentro deles
 * @param $path
 */
function listaPorDiretorios($pathOrigem, $pathDestino){

    //Todos os diretorio que conterem esse nome, não vão ser removidos
    $listaNomeQuePodeHaverNoDiretorio = "/[\sa-zA-Z0-9]+?$/i";

    //Lista arquivos por arquivos
    while($arquivo = $pathOrigem->read()){

        //Receber o caminho do arquivo concatenado com o nome do arquivo
        $arquivoPathCompleto = $pathOrigem->path . "\\" . $arquivo;

        //Pega toda a informação sobre o arquivo
        $arquivoCaminhoCompleto = pathinfo($arquivoPathCompleto);

        //Verifico se e um arquivo ou diretorio
        if (preg_match($listaNomeQuePodeHaverNoDiretorio, $arquivoCaminhoCompleto['filename'])) {

            //Pegar a data que foi inserida na pasta de origem
            $dataModificacaoArquivo = date("d/m/Y H:i:s", filectime($arquivoPathCompleto));

            /**
             * Verificando se a dataModificada do arquivo e maior que dois anos
             * modificando por dia = "+ 2 days"
             * modificando por mes = "+ 2 month"
             * modificando por ano = "+ 2 year"
             */
            if ($dataModificacaoArquivo < date("d/m/Y H:i:s", strtotime(' - 2 year', strtotime($GLOBALS['data'])))) {

            }

//            echo $arquivoCaminhoCompleto['dirname'] . "\\" . $arquivo . " - " . date("d/m/Y H:i:s", filemtime($arquivoPathCompleto)) . "\n";

            //Se for um diretorio chama a função novamente, passando o novo path
            if (empty($arquivoCaminhoCompleto['extension'])){

                //Pegar o novo diretorio
                $pathOrigem = dir($arquivoCaminhoCompleto['dirname'] ."\\". $arquivo);

                //Verificar se e um diretorio válido
                if (is_dir($pathOrigem->path)) {

                    //Acrescenta o novo diretorio no diretorio de destino
                    $pathDestino->path = $pathDestino->path . "\\" . $arquivo;

                    //Verificar se não existe o diretorio no path de destino, então ele cria
                    if (!file_exists($pathDestino->path)){
                        //Criar o diretorio
                        $pathDestino->path = mkdir($pathDestino->path);
                        echo "Criado novo path: " . $pathDestino->path;
                    }

                    listaPorDiretorios($pathOrigem, $pathDestino);

                }

            }

            echo " - Arquivo movido foi: " . $arquivo . " - Novo path: " . $pathOrigem->path . "\n";
            //Move o diretorio
            //move_uploaded_file($arquivo, $pathOrigem);

        }

    }

}

listaPorDiretorios($pathOrigem, $pathDestino);


////Lista arquivos por arquivos
//while($arquivo = $pathOrigem->read()){
//
//    //Receber o caminho do arquivo concatenado com o nome do arquivo
//    $arquivoPathCompleto = $pathOrigem->path . "\\" . $arquivo;
//
//    //Pega toda a informação sobre o arquivo
//    $arquivoCaminhoCompleto = pathinfo($arquivoPathCompleto);
//
//
//    //Verifico se e um arquivo ou diretorio
//    if (preg_match($listaNomeQuePodeHaverNoDiretorio, $arquivoCaminhoCompleto['filename'])) {
//
//        echo $arquivo;
//
//        //Pegar a data que foi inserida na pasta de origem
//        $dataModificacaoArquivo = date("d/m/Y H:i:s", filectime($arquivoPathCompleto));
//
//        //Pega o nome do arquivo
//        //echo $arquivoCaminhoCompleto['filename'];
//
//        /**
//         * Verificando se a dataModificada do arquivo e maior que dois anos
//         * modificando por dia = "+ 2 days"
//         * modificando por mes = "+ 2 month"
//         * modificando por ano = "+ 2 year"
//         */
//        if ($dataModificacaoArquivo < date("d/m/Y H:i:s", strtotime(' - 2 year', strtotime($data)))) {
//
//
//            //Movendo o arquivo para outro diretorio
//            //move_uploaded_file($arquivo, $pathDestino->path);
//
//
//        }
//
//    }

//}

//$pathOrigem->close();