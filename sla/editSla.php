<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;
use App\Entity\SLA;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: /ticket-creation/?status=error');
    exit;
}

$obSla = Select::getSLA('SLA', $_GET['id']);

if(!$obSla instanceof Select){
    header('location: /ticket-creation/?status=error');
}

if(isset($_POST["SLA_DESC"], $_POST["ativo"])){
    $obSla = new SLA($_POST["SLA_DESC"], $_POST["ativo"]);
    $obSla->atualizarSLA($_GET["id"]);

    header("location: /ticket-creation/index.php?status=success");

    exit;
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/sla/editSlaForm.php";
include __DIR__."/../includes/footer.php";