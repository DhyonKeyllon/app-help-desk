<?php require_once "validador_acesso.php" ?>
<?php

  //chamados
  $chamados = [];

  //abrir arquivo.hd
  $arquivo = fopen('../../app_help_desk/arquivo.hd','r'); //r para ler o arquivo

  // enquanto houver registros (linhas) a serem recuperados
  while(!feof($arquivo)) { //testa pelo fim de um arquivo - retorna true se achar o fim
    $registro = fgets($arquivo);// recupera o que estiver na linha, com base no cursor do propio php 

    $registro_detalhe = explode("#", $registro);

    //(perfil id = 2) só vamos exibir o chamado, se ele foi criado pelo usuário
    if($_SESSION['perfil_id'] == 2) {
      //se usuário autenticado não for o usuário de abertura do chamado então não faz nada
      if ($_SESSION['id'] != $registro_detalhe[0]) {
        continue;// nao faz nada
      } else {
        //atribui registro em uma nova indice
        $chamados[] = $registro;
      }
    } else {
      //atribui registro em uma nova indice
      $chamados[] = $registro;
    }
  }

  //fechar o arquivo aberto para que o php nao leia mais
  fclose($arquivo);

?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div> 
            <div class="card-body">
              <? foreach($chamados as $chamado) { ?>
              <?php
                $chamado_dados = explode("#", $chamado); /*retorna um array e o divisor é o primeiro parametro, que a partir dele ele cria um novo array */

                // verificar se as indices do array é menos que 3, se for, é porque chegou ao final dos dados, assim, não imprimindo na tela
                if(count($chamado_dados) < 3) {
                  continue;
                }
              ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?=$chamado_dados[1]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?=$chamado_dados[2]?></h6>
                  <p class="card-text"><?=$chamado_dados[3]?></p>

                </div>
              </div>
              <? } ?>
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>