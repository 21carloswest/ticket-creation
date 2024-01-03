<?php

require __DIR__."/../vendor/autoload.php";

use \App\Entity\Tag;

if(isset($_POST["TAG_DESC"])){
    $tag = new Tag ($_POST["TAG_DESC"]);
    $tag->createTag();

    header("location: /ticket-creation/index.php?status=success");

    exit;
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/tag/tagForm.php";
include __DIR__."/../includes/footer.php";