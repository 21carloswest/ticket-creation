<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;
use App\Entity\Costumer;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: /ticket-creation/?status=error');
    exit;
}

$obUser = Select::getCostumer('cliente', $_GET['id']);

if(!$obUser instanceof Select){
    header('location: /ticket-creation/?status=error');
}

if(isset($_POST["name"])){
    $costumer = new Costumer ($_POST["sysId"], $_POST["name"], $_POST["company"], $_POST["email"], $_POST["cell"], $_POST["tel"], $_POST["link"], $_POST["CNPJ"], $_POST["cod"]);
    $costumer->atualizarCostumer($_GET["id"]);

    header("location: /ticket-creation/index.php?status=success");

    exit;
}

$aftermathSys = "";

$consultaSys = Select::getSysAtivos();

foreach($consultaSys as $consulta) {
    $aftermathSys .= "<option value='".$consulta->ID_SISTEMA."'>$consulta->NOME_SISTEMA</option>";
}


$consultaCostumer = Select::getCostumer("cliente", $_GET["id"]);


include __DIR__."/../includes/header.php";
include __DIR__."/../includes/costumer/editCostumerForm.php";
include __DIR__."/../includes/footer.php";