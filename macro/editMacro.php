<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;
use App\Entity\Macro;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: /ticket-creation/?status=error');
    exit;
}

$obMacro = Select::getMacro('macro', $_GET['id']);

if(!$obMacro instanceof Select){
    header('location: /ticket-creation/?status=error');
}

if(isset($_POST["title"], $_POST["description"])){
    $obMacro = new Macro($_POST["title"], $_POST["description"], $_POST["ativo"]);
    $obMacro->atualizarMacro($_GET["id"]);

    header("location: /ticket-creation/index.php?status=success");

    exit;
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/macro/editMacroForm.php";
include __DIR__."/../includes/footer.php";