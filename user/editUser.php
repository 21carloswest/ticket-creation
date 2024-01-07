<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;
use App\Entity\User;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: /ticket-creation/?status=error');
    exit;
}

$obUser = Select::getUser('usuario', $_GET['id']);

if(!$obUser instanceof Select){
    header('location: /ticket-creation/?status=error');
}

if(isset($_POST["name"], $_POST["ativo"])){
    $user = new User ($_POST["teamId"], $_POST["name"], $_POST["email"], $_POST["ext"]);
    $user->atualizarUser($_GET["id"]);

    header("location: /ticket-creation/index.php?status=success");

    exit;
}

$consultaTeams = Select::getTeamsAtivos();

$aftermathUsers = "";

foreach($consultaTeams as $team){
    $aftermathUsers .= "<option value='".$team->ID_EQUIPE."'>$team->NOME_EQUIPE</option>";
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/user/editUserForm.php";
include __DIR__."/../includes/footer.php";