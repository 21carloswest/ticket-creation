<?php

require __DIR__."/../vendor/autoload.php";

use \App\Entity\Macro;

if(isset($_POST["description"])){
    $macro = new Macro ($_POST["title"],$_POST["description"]);
    $macro->createMacro();

    header("location: /ticket-creation/index.php?status=success");

    exit;
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/macro/macroForm.php";
include __DIR__."/../includes/footer.php";