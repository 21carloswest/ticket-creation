<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;
use \App\Entity\Sys;

$aftermath = "";

$consultaSys = Select::getSys();


foreach($consultaSys as $sys){
    $aftermath .= "<tr>
                    <td>$sys->NOME_SISTEMA</td>
                    <td>".($sys->ATIVO_SISTEMA == 1 ? 'Ativo' : 'Inativo')."</td>
                    <td><i class='bi bi-pencil'  style='cursor: pointer;' onclick="."window.location='editSys.php?id=$sys->ID_SISTEMA'"."></i></td>
                  </tr>";
}

if(isset($_POST["sysName"])){
  $sys = new Sys ($_POST["sysName"]);
  $sys->createSys();

  header("location: /ticket-creation/sys/viewSys.php?status=success");

  exit;
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/sys/sysList.php";
include __DIR__."/../includes/footer.php";