<?php

require __DIR__."/vendor/autoload.php";

use \App\Db\Select;


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

    //$ticket = new Ticket($_POST["title"], $_POST['description'], $_POST['status'], $_POST['sys'], $_POST['SLA'], $_POST["GCM"], $_POST["author"], $_POST["costumer"], $_POST["tag"]);
    //$ticket->createTicket();

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


$aftermathTag = "";

$consultaTag = Select::getTagsAtivas();

foreach($consultaTag as $consulta) {
    $aftermathTag .= "<option value='".$consulta->ID_TAG."'>$consulta->NOME_TAG</option>";
}


include __DIR__."/includes/header.php";
include __DIR__."/includes/edit.php";
include __DIR__."/js/viewSavedTicket.php";
include __DIR__."/includes/footer.php";

