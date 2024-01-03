<?php


require __DIR__."/../vendor/autoload.php";

use \App\Entity\SLA;

if(isset($_POST["SLA_DESC"])){
    $sla = new Sla ($_POST["SLA_DESC"]);
    $sla->createSLA();

    header("location: /ticket-creation/index.php?status=success");

    exit;
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/sla/slaForm.php";
include __DIR__."/../includes/footer.php";