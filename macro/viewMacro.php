<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;

$aftermath = "";

$consultaMacro = Select::getMacros();

foreach($consultaMacro as $macro){
    $aftermath .= "<tr>
                    <td>$macro->TITULO_MACRO</td>
                    <td>".($macro->ATIVO == 1 ? 'Ativo' : 'Inativo')."</td>
                    <td><i class='bi bi-pencil'  style='cursor: pointer;' onclick="."window.location='editMacro.php?id=$macro->ID_MACRO'"."></i></td>
                  </tr>";
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/macro/macroList.php";
include __DIR__."/../includes/footer.php";