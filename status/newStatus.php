<?php

require __DIR__."/../vendor/autoload.php";

use \App\Entity\Status;

if(isset($_POST["STATUS_DESC"])){
    $status = new Status ($_POST["STATUS_DESC"]);
    $status->createStatus();

    header("location: /ticket-creation/index.php?status=success");

    exit;
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/status/statusForm.php";
include __DIR__."/../includes/footer.php";