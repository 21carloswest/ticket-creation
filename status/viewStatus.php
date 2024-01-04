<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;

$aftermath = "";

$consultaStatus = Select::getStatus();

foreach($consultaStatus as $status){
    $aftermath .= "<tr>
                    <td>$status->NOME_STATUS</td>
                    <td>".($status->ATIVO_STATUS == 1 ? 'Ativo' : 'Inativo')."</td>
                    <td><i class='bi bi-pencil'  style='cursor: pointer;' onclick="."window.location='editStatus.php?id=$status->ID_STATUS'"."></i></td>
                  </tr>";
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/status/statusList.php";
include __DIR__."/../includes/footer.php";