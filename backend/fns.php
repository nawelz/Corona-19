<?php
function diff_age($age){
  $date_ancienne = new DateTime($age);
  $date_du_jour = new DateTime("now");
  $difference = $date_ancienne->diff($date_du_jour);
  $jours =  $difference->format('%y');
  return $jours;
}
function get_score($temperature,$respiratoire,$voiyage,$contactvirus,$diarrhe,$maltete,$gorge,$toux,$fatigue,$corbature,$epidemie){
$init = 0;
if ($temperature == "Oui"){$init++;}
if ($respiratoire == "Oui"){$init = $init+2;}
if ($voiyage == "Oui"){$init = $init+3;}
if ($contactvirus == "Oui"){$init = $init+3;}
if ($diarrhe == "Oui"){$init = $init+1;}
if ($maltete == "Oui"){$init = $init+1;}
if ($gorge == "Oui"){$init = $init+1;}
if ($toux == "Oui"){$init = $init+1;}
if ($fatigue == "Oui"){$init = $init+2;}
if ($corbature == "Oui"){$init = $init+2;}
if ($epidemie == "Oui"){$init = $init+3;}
return $init;
}
function get_resultat($score)
{
  $res = "";
  if ($score<=2)
  {
    $res = "Non";
  }
  if (($score>2)&&($score <6)) {
  $res = "Normale";
}
  if (($score>7)&&($score <11)) {
  $res = "Grave";
}
 if ($score>12)
  {
    $res = "TresGrave";
  }
  return $res;
}
function get_resultat_button($score)
{
  $res = "";
  if ($score== "Non")
  {
    $res = '<span class="label label-success">R.S</span>';
  }
  if ($score == "Normale") {

  $res = '<span class="label label-info">A Suivre</span>';
}
  if ($score == "Grave") {
  $res = '<span class="label label-warning">Grave</span>';
}
 if ($score == "TresGrave")
  {
    $res = '<span class="label label-danger">Trés Grave</span>';
  }
  return $res;
}
?>