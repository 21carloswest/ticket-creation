<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;

$aftermath = "";

$consultaTeam = Select::getTeams();


foreach($consultaTeam as $team){
    $aftermath .= "<tr>
                    <td>$team->NOME_EQUIPE</td>
                    <td>".($team->ATIVO_EQUIPE == 1 ? 'Ativo' : 'Inativo')."</td>
                    <td><i class='bi bi-pencil'  style='cursor: pointer;' onclick="."window.location='editTeam.php?id=$team->ID_EQUIPE'"."></i></td>
                  </tr>";
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/team/teamList.php";
include __DIR__."/../includes/footer.php";