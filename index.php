<?php

require 'vendor/autoload.php';
$controller = new App\Mvc\Controller();
$cadastros = $controller->index();

$vagas = $controller->vagas();
$QuantidadeCarrosPorValores = $controller->valor();

?>

<?php include_once('template/__header.php'); ?>

<header>
  <h1>Relatorio</h1>
</header>

<div class="container">
  <div class="opcoes">
    <a href="cadastro.php" class="text-decoration-none">Cadastrar veículo</a>
  </div>
</div>

<div class="container">
  <div class="vagas">
    <?php foreach ($vagas as $vaga): ?>
    <span class="<?= $vaga->vagas_disponiveis <= 5 ? 'color-warning' : '' ?>">Vagas disponiveis: <?= $vaga->vagas_disponiveis ?></span>
    <span>Vagas indisponiveis: <?= $vaga->vagas_indisponiveis ?></span>
    <?php endforeach; ?>
  </div>
</div>

<div class="container">
  <div class="QuantidadeCarrosPorValores">
    <div class="periodo">
      <form action="" method="get">
        <select name="periodoInicial" id="periodoInicial">
          <?php foreach ($cadastros as $cadastro): ?>
          <option value="<?= date("Y-m-d", strtotime($cadastro->data_hora)) ?>"><?= date("d/m/Y", strtotime($cadastro->data_hora)) ?></option>
          <?php endforeach; ?>
        </select>
        <select name="periodoFinal" id="periodoFinal">
          <?php foreach ($cadastros as $cadastro): ?>
          <option value="<?= date("Y-m-d", strtotime($cadastro->data_hora)) ?>"><?= date("d/m/Y", strtotime($cadastro->data_hora)) ?></option>
          <?php endforeach; ?>
        </select>
        <button type="submit" id="buscar" class="">Buscar</button>
      </form>
    </div>
    <?php foreach ($QuantidadeCarrosPorValores as $CarroValor): ?>
    <span>Quantidade de carros: <?= $CarroValor->veiculos ?> no periodo</span>
    <span>Valor total no periodo: R$<?= number_format($CarroValor->total, 2, ',', '.') ?></span>
    <?php endforeach; ?>
  </div>
</div>

<div class="container">
  <table>
    <tr>
      <th>Nome</th>
      <th>Documento</th>
      <th>Placa Veículo</th>
      <th>Data/Hora</th>
      <th>Valor</th>
    </tr>
    <?php foreach ($cadastros as $cadastro): ?>
    <tr>
      <td><?= $cadastro->nome ?></td>
      <td><?= $cadastro->documento ?></td>
      <td><?= $cadastro->placa_veiculo ?></td>
      <td><?= date("d/m/Y H:i", strtotime($cadastro->data_hora)) ?></td>
      <td>R$<?= number_format($cadastro->valor, 2, ',', '.') ?></td>
    </tr>
    <?php endforeach ?>
  </table>
</div>

<?php include_once('template/__footer.php'); ?>

