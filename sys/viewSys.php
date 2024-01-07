<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;

$aftermath = "";

$consultaSys = Select::getSys();


foreach($consultaSys as $sys){
    $aftermath .= "<tr>
                    <td>$sys->NOME_SISTEMA</td>
                    <td>".($sys->ATIVO_SISTEMA == 1 ? 'Ativo' : 'Inativo')."</td>
                    <td><i class='bi bi-pencil'  style='cursor: pointer;' onclick="."window.location='editSys.php?id=$sys->ID_SISTEMA'"."></i></td>
                  </tr>";
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/sys/sysList.php";
include __DIR__."/../includes/footer.php";