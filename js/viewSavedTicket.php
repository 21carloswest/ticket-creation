<script>
    document.getElementById('status').value="<?=$obTicket->idStatus ?>";
    document.getElementById("sys").value="<?=$obTicket->idSistema?>";
    document.getElementById("SLA").value="<?=$obTicket->SLA?>";
    document.getElementById("GCM").value="<?=$obTicket->GCM?>";
    document.getElementById("author").value="<?=$obTicket->idResponsavel?>";
    document.getElementById("costumer").value="<?=$obTicket->idCliente?>";
    document.getElementById("tag").value="<?=$obTicket->idTag?>";
    document.getElementById("title").value="<?=$obTicket->titulo?>";
</script>