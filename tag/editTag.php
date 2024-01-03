<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;
use App\Entity\Tag;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: /ticket-creation/?status=error');
    exit;
}

$obTag = Select::getTag('tag', $_GET['id']);

if(!$obTag instanceof Select){
    header('location: /ticket-creation/?status=error');
}

if(isset($_POST["TAG_DESC"], $_POST["ativo"])){
    $obTag = new Tag($_POST["TAG_DESC"], $_POST["ativo"]);
    $obTag->atualizarTag($_GET["id"]);

    header("location: /ticket-creation/index.php?status=success");

    exit;
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/tag/editTagForm.php";
include __DIR__."/../includes/footer.php";