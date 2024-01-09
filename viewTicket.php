<?php

require __DIR__."/vendor/autoload.php";

use \App\Db\Select;
use \App\Entity\Ticket;
use \App\Entity\Description;

//Validação do ID

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

//Consulta do ticket

$obTicket = Select::getTicket("ticket", $_GET['id']);

//Validação da consulta

if(!$obTicket instanceof Select){
    header('location: index.php?status=error');
}

if(isset($_GET['status'])){
    $msg="Ação concluída com sucesso";

}
//Consulta da descricao

$obDescricao = Select::getDescription('descricao', $_GET['id']);

//Método atualizador do ticket

/*if(isset($_POST["title"], $_POST['description'], $_POST['status'], $_POST['sys'], $_POST['SLA'], $_POST["author"], $_POST["costumer"], $_POST["tag"])) {

    //$ticket = new Ticket($_POST["title"], $_POST['description'], $_POST['status'], $_POST['sys'], $_POST['SLA'], $_POST["GCM"], $_POST["author"], $_POST["costumer"], $_POST["tag"]);
    //$ticket->atualizarTicket();

    //$obTicket->title= $_POST['title'];
    //$obTicket->= $_POST['descricao'];
    //$obTicket->= $_POST['ativo'];

    exit;
}*/

//Loop que monta o HTML das descricoes

$aftermath="";

foreach($obDescricao as $desc){
    $aftermath .= "<div class='mb-3'>
                    <label class='form-label' for='description$desc->id'>Data: ".date("d/m/Y à\s H:i", strtotime($desc->data))."</label>
                    <textarea class='form-control'
                              name='description$desc->id'
                              id='description$desc->id'
                              disabled
                              rows='20'>$desc->descricao</textarea>
                 </div>";
}

//Loop que monta o HTML das SLAs

$aftermathSla = "";

$consultaSla = Select::getSLAsAtiva();

foreach($consultaSla as $consulta) {
    $aftermathSla .= "<option value='.$consulta->ID_SLA.'>$consulta->DESCRIÇAO_SLA</option>";
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

if(isset($_POST["desc"])){
    $desc = new Description ($_POST["desc"], $_GET["id"]);
    $lastId = Select::getLastId($_GET["id"]);
    $desc->atualizarDesc($lastId->id);

    header("location: /ticket-creation/viewTicket.php?id=".$_GET['id']."&status=success");

    exit;
}

include __DIR__."/includes/header.php";
include __DIR__."/includes/edit.php";
include __DIR__."/js/viewSavedTicket.php";
include __DIR__."/includes/footer.php";