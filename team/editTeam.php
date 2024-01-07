<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;
use App\Entity\Team;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: /ticket-creation/?status=error');
    exit;
}

$obTeam = Select::getTeam('equipe', $_GET['id']);

if(!$obTeam instanceof Select){
    header('location: /ticket-creation/?status=error');
}

if(isset($_POST["teamName"], $_POST["ativo"])){
    $obTeam = new Team($_POST["teamName"], $_POST["ativo"]);
    $obTeam->atualizarTeam($_GET["id"]);

    header("location: /ticket-creation/index.php?status=success");

    exit;
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/team/editTeamForm.php";
include __DIR__."/../includes/footer.php";