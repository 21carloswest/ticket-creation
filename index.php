<?php

require __DIR__."/vendor/autoload.php";

use \App\Entity\Ticket;

$consTicket = Ticket::getTickets();
$resultado = '';

foreach($consTicket as $ticket){
  $resultado .= "<tr style='cursor: pointer;' onclick="."window.location='viewTicket.php?id="."$ticket->id'".">
                    <td>$ticket->id</td>
                    <td>$ticket->titulo</td>
                    <td>$ticket->idStatus</td>
                    <td>$ticket->idResponsavel</td>
                  </tr>";
}



include __DIR__."/includes/header.php";
include __DIR__."/includes/list.php";
include __DIR__."/includes/footer.php";