<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;
use \App\Entity\Costumer;

$aftermath = "";

$consultaCostumer = Select::getCostumers();

foreach($consultaCostumer as $costumer){
    $aftermath .= "<tr>
                    <td>$costumer->NOME_CLIENTE</td>
                    <td>".($costumer->ATIVO_CLIENTE == 1 ? 'Ativo' : 'Inativo')."</td>
                    <td><i class='bi bi-pencil' style='cursor: pointer;' onclick="."window.location='editCostumer.php?id=$costumer->ID_CLIENTE'"."></i></td>
                  </tr>";
}

if(isset($_POST["name"])){
  $costumer = new Costumer ($_POST["sysId"], $_POST["name"], $_POST["company"], $_POST["email"], $_POST["cell"], $_POST["tel"], $_POST["link"], $_POST["CNPJ"], $_POST["cod"]);
  $costumer->createCostumer();

  header("location: /ticket-creation/costumer/viewCostumer.php?status=success");

  exit;
}

$aftermathSys = "";

$consultaSys = Select::getSysAtivos();

foreach($consultaSys as $consulta) {
    $aftermathSys .= "<option value='".$consulta->ID_SISTEMA."'>$consulta->NOME_SISTEMA</option>";
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/costumer/costumerList.php";
include __DIR__."/../includes/footer.php";