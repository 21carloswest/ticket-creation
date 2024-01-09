<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;
use \App\Entity\Status;

$aftermath = "";

$consultaStatus = Select::getStatus();

foreach($consultaStatus as $status){
    $aftermath .= "<tr>
                    <td>$status->NOME_STATUS</td>
                    <td>".($status->ATIVO_STATUS == 1 ? 'Ativo' : 'Inativo')."</td>
                    <td><i class='bi bi-pencil'  style='cursor: pointer;' onclick="."window.location='editStatus.php?id=$status->ID_STATUS'"."></i></td>
                  </tr>";
}
if(isset($_POST["STATUS_DESC"])){
  $status = new Status ($_POST["STATUS_DESC"]);
  $status->createStatus();

  header("location: /ticket-creation/status/viewStatus.php?status=success");

  exit;
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/status/statusList.php";
include __DIR__."/../includes/footer.php";