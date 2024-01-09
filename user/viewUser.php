<?php

require __DIR__."/../vendor/autoload.php";

use \App\Entity\User;
use \App\Db\Select;

$aftermath = "";

$consultaUser = Select::getUsers();

foreach($consultaUser as $user){
    $aftermath .= "<tr>
                    <td>$user->NOME_USUARIO</td>
                    <td>".($user->ATIVO_USUARIO == 1 ? 'Ativo' : 'Inativo')."</td>
                    <td><i class='bi bi-pencil'  style='cursor: pointer;' onclick="."window.location='editUser.php?id=$user->ID_USUARIO'"."></i></td>
                  </tr>";
}
if(isset($_POST["name"])){
  $user = new User ($_POST["teamId"], $_POST["name"], $_POST["email"], $_POST["ext"]);
  $user->createUser();

  header("location: /ticket-creation/user/viewUser.php?status=success");

  exit;
}

$consultaTeams = Select::getTeamsAtivos();

$aftermathUsers = "";

foreach($consultaTeams as $team){
    $aftermathUsers .= "<option value='".$team->ID_EQUIPE."'>$team->NOME_EQUIPE</option>";
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/user/userList.php";
include __DIR__."/../includes/footer.php";