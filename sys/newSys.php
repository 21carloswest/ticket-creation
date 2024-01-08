<?php

require __DIR__."/../vendor/autoload.php";

use \App\Entity\Sys;

if(isset($_POST["sysName"])){
    $sys = new Sys ($_POST["sysName"]);
    $sys->createSys();

    header("location: /ticket-creation/index.php?status=success");

    exit;
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/sys/sysForm.php";
include __DIR__."/../includes/footer.php";