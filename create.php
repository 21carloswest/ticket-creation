<?php

require __DIR__."/vendor/autoload.php";

use \App\Entity\Ticket;
use \App\Db\Select;
use App\Entity\Description;

if(isset($_POST["title"], /*$_POST['description'], $_POST['status'], $_POST['sys'], $_POST['SLA'], $_POST["author"], $_POST["costumer"], $_POST["tag"]*/)) {

    $ticket = new Ticket($_POST["title"], $_POST['status'], $_POST['sys'], $_POST['SLA'], $_POST["GCM"], $_POST["author"], $_POST["costumer"], $_POST["tag"]);
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




include __DIR__."/includes/header.php";
include __DIR__."/includes/form.php";
include __DIR__."/includes/footer.php";