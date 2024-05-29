<?php
$reponse['statut'] = "ok";
$reponse['erreur'] = false;
$reponse['donnee'] = $login;
//http response = 200
echo json_encode($reponse);
?>