<?php include_once('template/__header.php'); ?>

  <header class="flex-column">
    <h1>Cadastro de entrada de Veículos</h1>
    <p><a href="index.php" class="text-decoration-none">Voltar</a></p>
  </header>
  <?php
    require 'vendor/autoload.php';
    $controller = new App\Mvc\Controller();

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRIPPED);
    $documento = filter_input(INPUT_POST, 'documento', FILTER_SANITIZE_STRIPPED);
    $placa = filter_input(INPUT_POST, 'placa', FILTER_SANITIZE_STRIPPED);
    $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRIPPED);

    $cadastro = [
      "nome" => $nome,
      "documento" => $documento,
      "placa" => $placa,
      "data" => $data
    ];
  ?>

  <div class="container">
    <form action="" method="post" id="cadastrarEntradaVeiculos">
      <div class="row">
        <label for="">Nome</label>
        <input type="text" name="nome" id="nome" value="Moisés Fausto">
      </div>
      <div class="row">
        <label for="">Documento</label>
        <input type="text" name="documento" id="documento" value="99988877758">
      </div>
      <div class="row">
        <label for="">Placa do veículo</label>
        <input type="text" name="placa" id="placa" value="C9KK33">
      </div>
      <div class="row">
        <label for="">Data/Hora da entrada</label>
        <input type="datetime-local" name="data" id="data" value="2021-09-12T03:07">
      </div>
      <div class="row justify-center">
        <button type="submit" id="cadastrar" class="button-primary">Cadastrar</button>
      </div>
    </form>
  </div>

