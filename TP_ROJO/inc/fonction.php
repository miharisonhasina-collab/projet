<?php
function affichierTitre($titre){
    echo "<h2>" . $titre . "</h2>";
}
function affichierMessage($message){
    echo "<p>" . $message . "</p>";
}
function affichierMenu(){
    include "menu.php";
}
?>