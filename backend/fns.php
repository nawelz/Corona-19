<?php
function diff_age($age){
  $date_ancienne = new DateTime($age);
  $date_du_jour = new DateTime("now");
  $difference = $date_ancienne->diff($date_du_jour);
  $jours =  $difference->format('%y');
  return $jours;
}
?>