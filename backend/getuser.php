<?php
$user = $_SESSION['login2'];
$get = $db->query("SELECT * FROM espace where pseudo = '$user'");
$dat = $get->fetch();
$iduser = $dat['ID'];
?>