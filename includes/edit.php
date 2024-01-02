<?php
use \App\Entity\Ticket;

use \App\Entity\Description;



if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

$obticket = Ticket::getTicket($_GET['id']);
?>


<div class="ml-auto">

</div>
