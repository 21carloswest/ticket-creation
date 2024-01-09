<?php

require __DIR__."/vendor/autoload.php";

use \App\Db\Select;
use \App\Entity\Ticket;
use \App\Entity\Description;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

$obTicket = Select::getTicket("ticket", $_GET['id']);

if(!$obTicket instanceof Select){
    header('location: index.php?status=error');
}

$obDescricao = Select::getDescription('descricao', $_GET['id']);

if(isset($_POST["title"], /*$_POST['description'], $_POST['status'], $_POST['sys'], $_POST['SLA'], $_POST["author"], $_POST["costumer"], $_POST["tag"]*/)) {

    $ticket = new Ticket($_POST["title"], $_POST['description'], $_POST['status'], $_POST['sys'], $_POST['SLA'], $_POST["GCM"], $_POST["author"], $_POST["costumer"], $_POST["tag"]);
    //$ticket->atualizarTicket();

    //$obTicket->title= $_POST['title'];
    //$obTicket->= $_POST['descricao'];
    //$obTicket->= $_POST['ativo'];

    exit;
}

$aftermath="";

foreach($obDescricao as $desc){
    $aftermath .= "<div class='mb-3'>
                    <label class='form-label' readonly for='description$desc->id'>$desc->data</label>
                    <textarea class='form-control'
                              name='description$desc->id'
                              id='description$desc->id'
                              rows='20'>$desc->descricao
                    </textarea>
                 </div>";
}

$aftermathSla = "";

$consultaSla = Select::getSLAsAtiva();

foreach($consultaSla as $consulta) {
    $aftermathSla .= "<option value='".$consulta->ID_SLA."'>$consulta->DESCRIÇAO_SLA</option>";
}

//Loop que monta o HTML dos sistemas

$aftermathSys = "";

$consultaSys = Select::getSysAtivos();

foreach($consultaSys as $consulta) {
    $aftermathSys .= "<option value='".$consulta->ID_SISTEMA."'>$consulta->NOME_SISTEMA</option>";
}

//Loop que monta o HTML das tags

$aftermathTag = "";

$consultaTag = Select::getTagsAtivas();

foreach($consultaTag as $consulta) {
    $aftermathTag .= "<option value='".$consulta->ID_TAG."'>$consulta->NOME_TAG</option>";
}

//Loop que monta o HTML dos usuários

$aftermathUser = "";

$consultaUser = Select::getUsersAtivos();

foreach($consultaUser as $consulta) {
    $aftermathUser .= "<option value='".$consulta->ID_USUARIO."'>$consulta->NOME_USUARIO</option>";
}

//Loop que monta o HTML dos status

$aftermathStatus = "";

$consultaStatus = Select::getStatusAtivos();

foreach($consultaStatus as $consulta) {
    $aftermathStatus .= "<option value='".$consulta->ID_STATUS."'>$consulta->NOME_STATUS</option>";
}

//Loop que monta o HTML dos clientes

$aftermathCostumer = "";

$consultaCostumer = Select::getCostumersAtivos();

foreach($consultaCostumer as $consulta) {
    $aftermathCostumer .= "<option value='".$consulta->ID_CLIENTE."'>$consulta->EMPRESA</option>";
}

//Loop que monta o HTML das categorias

$aftermathCategory = "";

$consultaCategory = Select::getCategoriesAtivas();

foreach($consultaCategory as $consulta) {
    $aftermathCategory .= "<option value='".$consulta->ID_CATEGORIA	."'>$consulta->DESCRICAO_CATEGORIA</option>";
}

//Script responsável por editar a ultima descricao

if(isset($_POST["descEdit"])){
    $desc = new Description ($_POST["descEdit"], $_GET["id"]);
    $lastId = Select::getLastId($_GET["id"]);
    $desc->atualizarDesc($lastId->id);

    header("location: /ticket-creation/viewTicket.php?id=".$_GET['id']."&status=success");

    exit;
}

//Script responsável por criar uma descricao nova

if(isset($_POST["newDesc"])){

    $desc = new Description ($_POST["newDesc"], $_GET["id"]);
    $desc->createDescription();

    header("location: /ticket-creation/viewTicket.php?id=".$_GET['id']."&status=success");

    exit;
}


include __DIR__."/includes/header.php";
include __DIR__."/includes/edit.php";
include __DIR__."/js/viewSavedTicket.php";
include __DIR__."/includes/footer.php";

