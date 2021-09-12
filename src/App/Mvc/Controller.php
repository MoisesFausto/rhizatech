<?php

  namespace App\Mvc;

  class Controller
  {

    private $dataInicial;
    private $dataFinal;

    public function __construct()
    {
      $this->dataInicial = $_GET['periodoInicial'];
      $this->dataFinal = $_GET['periodoFinal'];
    }

    public function index()
    {
      $sql = "SELECT * FROM cadastro";
      $model = new Model;
      $cadastros = $model->select($sql);
      $view = new View;
      return $view->render($cadastros);
    }

    public function vagas()
    {
      $model = new Model;
      $sql = "SELECT * FROM vagas";
      $vagas = $model->select($sql);

      $view = new View;
      return $view->render($vagas);
    }

    public function valor()
    {
      $model = new Model;
      $sql = "SELECT
                count(DISTINCT placa_veiculo) AS veiculos,
                sum(valor) AS total
              FROM
                cadastro c
              WHERE
                data_hora >= '{$this->dataInicial}'
                AND data_hora < '{$this->dataFinal}';";
      
      $valorTotal = $model->select($sql);
      $view = new View;
      return $view->render($valorTotal);
    }

    public function store(array $request)
    {
      $sql = "INSERT
              INTO
              cadastro (
                nome,
                documento,
                placa_veiculo,
                data_hora,
                valor
              )
            VALUES (
              '{$request['nome']}',
              '{$request['documento']}',
              '{$request['placa']}',
              '{$request['data']}',
              30.00
            )";
      $model = new Model;
      $storeCadastro = $model->query($sql);

      if ($storeCadastro) {

        $sql = "UPDATE vagas
        SET
          vagas_disponiveis = (
            SELECT sum(vagas_disponiveis - 1)
          ),
          vagas_indisponiveis = (
            SELECT sum(vagas_indisponiveis + 1)
          )
        WHERE id = 1;";

        $updateVagas = $model->update($sql);

        return [
          $updateVagas,
          $storeCadastro
        ];
      }

    }

  }
