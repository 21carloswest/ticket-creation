<?php


require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;
use \App\Entity\User;

if(isset($_POST["name"])){
    $user = new User ($_POST["teamId"], $_POST["name"], $_POST["email"], $_POST["ext"]);
    $user->createUser();

    header("location: /ticket-creation/index.php?status=success");

    exit;
}

$consultaTeams = Select::getTeamsAtivos();

$aftermathUsers = "";

foreach($consultaTeams as $team){
    $aftermathUsers .= "<option value='".$team->ID_EQUIPE."'>$team->NOME_EQUIPE</option>";
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/user/userForm.php";
include __DIR__."/../includes/footer.php";