<?php

require __DIR__."/vendor/autoload.php";

use \App\Entity\Ticket;
use \App\Db\Select;
use App\Entity\Description;

if(isset($_POST["title"], /*$_POST['description'], $_POST['status'], $_POST['sys'], $_POST['SLA'], $_POST["author"], $_POST["costumer"], $_POST["tag"]*/)) {

    $ticket = new Ticket($_POST["title"], $_POST['status'], $_POST['sys'], $_POST['SLA'], $_POST["GCM"], $_POST["author"], $_POST["costumer"], $_POST["tag"], $_POST['category']);
    $ticket->createTicket();

    $desc = new Description($_POST['description']);
    $desc->setIdTicket($ticket->getID());
    $desc->createDescription();

    header("location: viewTicket.php?id=".$ticket->getID());

    exit;
}


$aftermathSla = "";

$consultaSla = Select::getSLAsAtiva();


foreach($consultaSla as $consulta) {
    $aftermathSla .= "<option value='".$consulta->ID_SLA."'>$consulta->DESCRIÇAO_SLA</option>";
}


$aftermathTag = "";

$consultaTag = Select::getTagsAtivas();

foreach($consultaTag as $consulta) {
    $aftermathTag .= "<option value='".$consulta->ID_TAG."'>$consulta->NOME_TAG</option>";
}


$aftermathStatus = "";

$consultaStatus = Select::getStatusAtivos();

foreach($consultaStatus as $consulta) {
    $aftermathStatus .= "<option value='".$consulta->ID_STATUS."'>$consulta->NOME_STATUS</option>";
}


$aftermathCategory = "";

$consultaCategory = Select::getCategoriesAtivas();

foreach($consultaCategory as $consulta) {
    $aftermathCategory .= "<option value='".$consulta->ID_CATEGORIA	."'>$consulta->DESCRICAO_CATEGORIA</option>";
}


$aftermathSys = "";

$consultaSys = Select::getSysAtivos();

foreach($consultaSys as $consulta) {
    $aftermathSys .= "<option value='".$consulta->ID_SISTEMA."'>$consulta->NOME_SISTEMA</option>";
}


$aftermathUser = "";

$consultaUser = Select::getUsersAtivos();

foreach($consultaUser as $consulta) {
    $aftermathUser .= "<option value='".$consulta->ID_USUARIO."'>$consulta->NOME_USUARIO</option>";
}

include __DIR__."/includes/header.php";
include __DIR__."/includes/form.php";
include __DIR__."/includes/footer.php";