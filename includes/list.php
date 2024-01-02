<?php
use \App\Entity\Ticket;
$consTicket = Ticket::getTickets();
$resultado = '';

foreach($consTicket as $ticket){
  $resultado .= "<tr onclick="."window.location='viewTicket.php?id="."$ticket->id'".">
                    <td>$ticket->id</td>
                    <td>$ticket->titulo</td>
                    <td>$ticket->idStatus</td>
                    <td>$ticket->idResponsavel</td>
                  </tr>";
}

?>

<a href = "create.php">
    <button class="btn btn-success">Novo</button>
</a>

<a>
    <button class="btn btn-light">Buscar ticket</button>
</a>

<section>

    <table class="table bg-light mt-3">

        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Status</th>
                <th>Responsável</th>
            </tr>
        </thead>

        <tbody>
            <?= $resultado;?>

        </tbody>
    </table>

</section>
