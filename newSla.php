<?php

<<<<<<< Updated upstream

=======
require __DIR__."/vendor/autoload.php";

use \App\Entity\SLA;

if(isset($_POST["SLA_DESC"])){
    $sla = new Sla ($_POST["SLA_DESC"]);
    $sla->createSLA();

    header("location: index.php?status=success");

    exit;
}
>>>>>>> Stashed changes

include __DIR__."/includes/header.php";
include __DIR__."/includes/slaForm.php";
include __DIR__."/includes/footer.php";