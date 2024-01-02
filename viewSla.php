<?php

require __DIR__."/vendor/autoload.php";

use \App\Entity\Sla;
use \App\Db\Select;

if(isset($_POST["SLA_DESC"])){
    $sla = new Sla ($_POST["SLA_DESC"]);
    $sla->createSLA();

    header("location: index.php?status=success");

    exit;
}

$aftermath = "";

$consultaSla = Select::getSLAs();


foreach($consultaSla as $sla){
    $aftermath .= "<tr>
                    <td>$sla->DESCRIÇAO_SLA</td>
                    <td>".($sla->ATIVO_SLA == 1 ? 'Ativo' : 'Inativo')."</td>
                    <td><i class='bi bi-pencil'  style='cursor: pointer;' onclick="."window.location='editSla.php'"."></i></td>
                  </tr>";
}


include __DIR__."/includes/header.php";
include __DIR__."/includes/slaList.php";
include __DIR__."/includes/footer.php";