<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;
use \App\Entity\Team;

$aftermath = "";

$consultaTeam = Select::getTeams();


foreach($consultaTeam as $team){
    $aftermath .= "<tr>
                    <td>$team->NOME_EQUIPE</td>
                    <td>".($team->ATIVO_EQUIPE == 1 ? 'Ativo' : 'Inativo')."</td>
                    <td><i class='bi bi-pencil'  style='cursor: pointer;' onclick="."window.location='editTeam.php?id=$team->ID_EQUIPE'"."></i></td>
                  </tr>";
}
if(isset($_POST["teamName"])){
  $team = new Team ($_POST["teamName"]);
  $team->createTeam();

  header("location: /ticket-creation/team/viewTeam.php?status=success");

  exit;
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/team/teamList.php";
include __DIR__."/../includes/footer.php";