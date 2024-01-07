<?php

require __DIR__."/../vendor/autoload.php";

use \App\Entity\Team;

if(isset($_POST["teamName"])){
    $team = new Team ($_POST["teamName"]);
    $team->createTeam();

    header("location: /ticket-creation/index.php?status=success");

    exit;
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/team/teamForm.php";
include __DIR__."/../includes/footer.php";