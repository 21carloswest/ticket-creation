<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;
use App\Entity\Category;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: /ticket-creation/?status=error');
    exit;
}

$obCategory = Select::getCategory('categoria', $_GET['id']);

if(!$obCategory instanceof Select){
    header('location: /ticket-creation/?status=error');
}

if(isset($_POST["DESCRICAO_CATEGORIA"], $_POST["ATIVO_CATEGORIA"])){
    $obCategory = new Category($_POST["DESCRICAO_CATEGORIA"], $_POST["ATIVO_CATEGORIA"]);
    $obCategory->atualizarCategory($_GET["id"]);

    header("location: /ticket-creation/index.php?status=success");

    exit;
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/category/editCategoryForm.php";
include __DIR__."/../includes/footer.php";