<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;

$aftermath = "";

$consultaCategory = Select::getCategories();


foreach($consultaCategory as $category){
    $aftermath .= "<tr>
                    <td>$category->DESCRICAO_CATEGORIA</td>
                    <td>".($category->ATIVO_CATEGORIA == 1 ? 'Ativo' : 'Inativo')."</td>
                    <td><i class='bi bi-pencil'  style='cursor: pointer;' onclick="."window.location='editCategory.php?id=$category->ID_CATEGORIA'"."></i></td>
                  </tr>";
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/category/categoryList.php";
include __DIR__."/../includes/footer.php";