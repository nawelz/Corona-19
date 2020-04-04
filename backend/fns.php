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

function get_stat_now($cond) {
  include "db.php";
 $resultat = array();
 $resultat["Non"] = 0;
 $resultat["Normale"] = 0;
 $resultat["Grave"] = 0;
 $resultat["TresGrave"] = 0;
  $resultat["NonP"] = 0;
 $resultat["NormaleP"] = 0;
 $resultat["GraveP"] = 0;
 $resultat["TresGraveP"] = 0;
  $resultat["Total"] = 0;
 //echo "SELECT * FROM wp_db7_forms while 'form_date' like ('$cond')";
  $tout = $db->query("SELECT * FROM wp_db7_forms where form_date like ('$cond')"); 
while ($data2 = $tout->fetch()) {
  $tab = array();

  $form_data = unserialize($data2["form_value"]);
  foreach ($form_data as $key => $data){

                            $matches = array();

                            if ( $key == 'cfdb7_status' )  continue;
                      
                            if( ! empty($matches[0]) ) continue;

                                     if ( is_array($data) ) {

                                    $key_val = str_replace('your-', '', $key);
                                    $key_val = ucfirst( $key_val );
                                    $arr_str_data =  implode(', ',$data);
                                  
                                  //echo '<p><b>'.$key_val.'</b>: '. nl2br($arr_str_data) .'</p>';
                  if (trim($key_val) == "Id:name")
                           {
                           
                            $tab["name"] = $data;
                        
                           }
                            if (trim($key_val) == "Id:tel")
                         {
                         
                          $tab["tel"] = $data;
                         

                         }
                             if (trim($key_val) == "Ville")
                         {
                         
                          $tab["ville"] = $data;
                          }
                            if (trim($key_val) == "Naissance")
                         {
                          $tab["age"] = $data;
                         }
                             if (trim($key_val) == "Remperature")
                         {
                          $tab["tmp"] = $data;
                        
                         }

                        if (trim($key_val) == "Respiratoire")
                         {$tab["resp"] = $data;}
                       if (trim($key_val) == "Voyage")
                         {$tab["voi"] = $data;}
                       if (trim($key_val) == "Contactcorona")
                         {$tab["cm"] = $data;}
                      if (trim($key_val) == "Dairrhe")
                         {$tab["drh"] = $data;}
                     if (trim($key_val) == "Genre")
                         {$tab["genre"] = $data[0];}
                        if (trim($key_val) == "Tete")
                         {$tab["tete"] = $data;}
                          if (trim($key_val) == "Gorge")
                         {$tab["gorge"] = $data;}
                      if (trim($key_val) == "Fatigue")
                         {$tab["fatigue"] = $data;}
                      if (trim($key_val) == "Toux")
                         {$tab["toux"] = $data;}
                       if (trim($key_val) == "Courbature")
                         {$tab["corbature"] = $data;}
                      if (trim($key_val) == "Contact")
                         {$tab["epidemie"] = $data;}
                     
                                }else{

                                    $key_val = str_replace('your-', '', $key);
                                    $key_val = ucfirst( $key_val );
                              
                                    //echo '<p><b>'.$key_val.'</b>: '.nl2br($data).'</p>';
                                      if (trim($key_val) == "Id:name")
                           {
                           
                            $tab["name"] = $data;
                          
                           }
                            if (trim($key_val) == "Id:tel")
                         {
                         
                          $tab["tel"] = $data;
                         

                         }
                             if (trim($key_val) == "Ville")
                         {
                         
                          $tab["ville"] = $data;
                         


                         }
                             if (trim($key_val) == "Naissance")
                         {
                         
                          $tab["age"] = $data;
                         

                         }
                              if (trim($key_val) == "Remperature")
                         {$tab["tmp"] = $data;}
                        if (trim($key_val) == "Respiratoire")
                         {$tab["resp"] = $data;}
                       if (trim($key_val) == "Voyage")
                         {$tab["voi"] = $data;}
                       if (trim($key_val) == "Contactcorona")
                         {$tab["cm"] = $data;}
                        if (trim($key_val) == "Genre")
                         {$tab["genre"] = $data[0];}
                     if (trim($key_val) == "Dairrhe")
                         {$tab["drh"] = $data;}
                      if (trim($key_val) == "Tete")
                         {$tab["tete"] = $data;}

                      if (trim($key_val) == "Gorge")
                         {$tab["gorge"] = $data;}

                      if (trim($key_val) == "Toux")
                         {$tab["toux"] = $data;}
                      if (trim($key_val) == "Fatigue")
                         {$tab["fatigue"] = $data;}
                     if (trim($key_val) == "Courbature")
                         {$tab["corbature"] = $data;}
                      if (trim($key_val) == "Contact")
                         {$tab["epidemie"] = $data;}
                                }
                         
                     //  - - - - - - 

                       }

 $score = get_score($tab["tmp"][0],$tab["resp"][0],$tab["voi"][0],$tab["cm"][0],$tab["drh"][0],$tab["tete"][0],$tab["gorge"][0],$tab["toux"][0],$tab["fatigue"][0],$tab["corbature"][0],$tab["epidemie"][0]);
$score_res = get_resultat($score);
if ($score_res == "Non")
{
  $resultat["Non"]++;
}
if ($score_res == "Normale")
{
  $resultat["Normale"]++;
}
if ($score_res == "Grave")
{
  $resultat["Grave"]++;
}
if ($score_res == "TresGrave")
{
  $resultat["TresGrave"]++;
}

}
$resultat["Total"] = $resultat["Normale"]+$resultat["Grave"]+$resultat["Non"]+$resultat["TresGrave"];
$resultat["NonP"] = ($resultat["Non"] / $resultat["Total"]) * 100;
$resultat["GraveP"] = ($resultat["Grave"] / $resultat["Total"]) * 100;
$resultat["NormaleP"] = ($resultat["Normale"] / $resultat["Total"]) * 100;
$resultat["TresGraveP"] = ($resultat["TresGrave"] / $resultat["Total"]) * 100;
return $resultat;
  
  }

  function get_nbr_test($cond) {
include "db.php";
  $tout = $db->query("SELECT * FROM wp_db7_forms where form_date like ('$cond')"); 
  return $tout->rowCount();

  }
  function mettre_en_quarantaine($id) {
include "db.php";
$thisd = date("Y")."-".date("m")."-".date("d"); 
$req = "Update wp_db7_forms SET quarantaine = 'Oui' , date_quarantaine = '$thisd' where form_id = '$id'";
  $tout = $db->query($req); 
  }
?>