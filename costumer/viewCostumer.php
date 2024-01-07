<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;

$aftermath = "";

$consultaCostumer = Select::getCostumers();

foreach($consultaCostumer as $costumer){
    $aftermath .= "<tr>
                    <td>$costumer->NOME_CLIENTE</td>
                    <td>".($costumer->ATIVO_CLIENTE == 1 ? 'Ativo' : 'Inativo')."</td>
                    <td><i class='bi bi-pencil' style='cursor: pointer;' onclick="."window.location='editCostumer.php?id=$costumer->ID_CLIENTE'"."></i></td>
                  </tr>";
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/costumer/costumerList.php";
include __DIR__."/../includes/footer.php";