<?php 

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    // tratar o texto para que não haja duplicidade de #, ja que vamos usar para separar no encapsulamento de dados
    $titulo = str_replace('#','-',$_POST['titulo']);
    $categoria = str_replace('#','-',$_POST['categoria']);
    $descricao = str_replace('#','-',$_POST['descricao']);
    // podemos usar o implode('#', $_POST) <- transforma uma array em uma unica string separada cada valor dos indice por # . Porém, não conseguimos fazer uma tratativa 
    

    // função para criar um arquivo de texto para armazenar as informações de texto
    //fopen('arquivo.hd','a'); // ('nome do arquivo' , 'a') 
            // 'a' -> Abre somente para escrita; coloca o ponteiro do arquivo no final do arquivo. Se o arquivo não existir, tenta criá-lo.

    // abrir um arquivo para armazenar o texto 
    $arquivo = fopen('arquivo.hd','a');

    // texto que vai ser armazenado dentro do nosso $arquivo 
    $texto = $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL; // EOL armazena o caractere de quebra de linha de acordo com o SO que o php ta rodando
    
    fwrite($arquivo, $texto); // escreve texto dentro do arquivo fwrite(nomeaqruivo, oQueVaiEsvreverNoArquivo)

    // apos escrever dentro do arquivo, é necessario fechar o arquivo, passando como parametro a referencia do arquivo que foi aberto 
    fclose($arquivo);


    // A SEQUENCIA DE CRIACAO DO ARQUIVO É IMPORTANTE

    //echo $texto;

    header("Location: abrir_chamado.php");
?>