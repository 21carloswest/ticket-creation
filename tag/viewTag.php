<?php

require __DIR__."/../vendor/autoload.php";

use \App\Db\Select;
use \App\Entity\Tag;

$aftermath = "";

$consultaTag = Select::getTags();


foreach($consultaTag as $tag){
    $aftermath .= "<tr>
                    <td>$tag->NOME_TAG</td>
                    <td>".($tag->ATIVO_TAG == 1 ? 'Ativo' : 'Inativo')."</td>
                    <td><i class='bi bi-pencil'  style='cursor: pointer;' onclick="."window.location='editTag.php?id=$tag->ID_TAG'"."></i></td>
                  </tr>";
}
if(isset($_POST["TAG_DESC"])){
  $tag = new Tag ($_POST["TAG_DESC"]);
  $tag->createTag();

  header("location: /ticket-creation/tag/viewTag.php?status=success");

  exit;
}

include __DIR__."/../includes/header.php";
include __DIR__."/../includes/tag/tagList.php";
include __DIR__."/../includes/footer.php";