<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;
use App\Entity\Status;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: /ticket-creation/?status=error');
    exit;
}

$obStatus = Select::getOneStatus('status', $_GET['id']);

if(!$obStatus instanceof Select){
    header('location: /ticket-creation/?status=error');
}

if(isset($_POST["STATUS_DESC"], $_POST["ativo"])){
    $obStatus = new Status($_POST["STATUS_DESC"], $_POST["ativo"]);
    $obStatus->atualizarStatus($_GET["id"]);

    header("location: /ticket-creation/index.php?status=success");

    exit;
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/status/editStatusForm.php";
include __DIR__."/../includes/footer.php";