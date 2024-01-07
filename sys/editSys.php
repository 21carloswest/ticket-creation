<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;
use App\Entity\Sys;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: /ticket-creation/?status=error');
    exit;
}

$obSys = Select::getOneSys('sistema', $_GET['id']);

if(!$obSys instanceof Select){
    header('location: /ticket-creation/?status=error');
}

if(isset($_POST["sysName"], $_POST["ativo"])){
    $obSys = new Sys($_POST["sysName"], $_POST["ativo"]);
    $obSys->atualizarSys($_GET["id"]);

    header("location: /ticket-creation/index.php?status=success");

    exit;
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/sys/editSysForm.php";
include __DIR__."/../includes/footer.php";