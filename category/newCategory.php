<?php

require __DIR__."/../vendor/autoload.php";

use \App\Entity\Category;

if(isset($_POST["DESCRICAO_CATEGORIA"])){
    $category = new Category ($_POST["DESCRICAO_CATEGORIA"]);
    $category->createCategory();

    header("location: /ticket-creation/index.php?status=success");

    exit;
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/category/categoryForm.php";
include __DIR__."/../includes/footer.php";