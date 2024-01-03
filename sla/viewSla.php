<?php

require __DIR__."/../vendor/autoload.php";

use \App\Entity\Sla;
use \App\Db\Select;

$aftermath = "";

$consultaSla = Select::getSLAs();

foreach($consultaSla as $sla){
    $aftermath .= "<tr>
                    <td>$sla->DESCRIÇAO_SLA</td>
                    <td>".($sla->ATIVO_SLA == 1 ? 'Ativo' : 'Inativo')."</td>
                    <td><i class='bi bi-pencil'  style='cursor: pointer;' onclick="."window.location='editSla.php?id=$sla->ID_SLA'"."></i></td>
                  </tr>";
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/sla/slaList.php";
include __DIR__."/../includes/footer.php";