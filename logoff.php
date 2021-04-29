<?php 

    session_start(); // <- sempre que for trabalhar com a sessão, sempre é nessecario executar essa função para ter acesso a essa superglobal

    /*
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    //remover indices do array de sessao
    //unset <- função para destruir um indice de um array
    unset($_SESSION['x']); // remove indice apenas se existir, sem erro

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    //destruir a variavel de sessão
    //session_destroy() -< remove todos os indices da variavel global SESSION

    session_destroy(); // sera destruida,
    // forçar um redirecionamento

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    */

    session_destroy();
    header('Location: index.php');

?>