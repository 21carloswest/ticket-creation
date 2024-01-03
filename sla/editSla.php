<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;
use App\Entity\SLA;

$obSla = Select::getSLA('SLA', $_GET['id']);

if(isset($_POST["SLA_DESC"], $_POST["ativo"])){
    $obSla = new SLA($_POST["SLA_DESC"], $_POST["ativo"]);
    $obSla->atualizarSLA($_GET["id"]);

    header("location: /ticket-creation/index.php?status=success");

    exit;
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/sla/editSlaForm.php";
include __DIR__."/../includes/footer.php";