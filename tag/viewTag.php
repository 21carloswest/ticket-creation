<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;

$aftermath = "";

$consultaTag = Select::getTags();


foreach($consultaTag as $tag){
    $aftermath .= "<tr>
                    <td>$tag->NOME_TAG</td>
                    <td>".($tag->ATIVO_TAG == 1 ? 'Ativo' : 'Inativo')."</td>
                    <td><i class='bi bi-pencil'  style='cursor: pointer;' onclick="."window.location='editTag.php?id=$tag->ID_TAG'"."></i></td>
                  </tr>";
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/tag/tagList.php";
include __DIR__."/../includes/footer.php";