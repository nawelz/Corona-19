<?php 
// error_reporting(0);
include "db.php";
$nbro = 30;
$req = "SELECT Max(ID) as maximum FROM resultat";
$test = $db->query($req);
$data = $test->fetch();
$Max_val = $data["maximum"];

$req = "SELECT * FROM up_down";
$test = $db->query($req);
$data = $test->fetch();
$Now_val = $data["IDS"];

if ($Now_val == $Max_val)
{
echo "Is Updted To be INITIAL <br>"; 
$req = "SELECT Min(ID) as maximum FROM resultat";
$test = $db->query($req);
$data = $test->fetch();
$Min_val = $data["maximum"];
echo "Minimum est ".$Min_val."<br>";
$req = "UPDATE up_down SET IDS = '$Min_val'";
$test = $db->query($req);
$Now_val = $Min_val;
}


$jib = $db->query("SELECT * FROM resultat where ID > $Now_val LIMIT $nbro");
echo "SELECT * FROM resultat where ID > $Now_val LIMIT $nbro";

while ($dat = $jib->fetch()) {

	
$id = $dat['ID'];
$req = "UPDATE up_down SET IDS = '$id'";
$test = $db->query($req);
$url_bl = $dat['url_bl'];
$derniereStat = $dat['CC'];
$url = $dat['url'];
$identifiant = $id;
$iduser = $dat['iduser'];








$lien = trim($url);
$lienen = $lien; 
$lien = str_replace("https", "http", $lien);

$fichier=file_get_contents($lien);//lit la page à copier
$string = $fichier;
$string = strtoupper($string);
// $test1 = strpos($string, "FLUX DES COMMENTAIRES");
$texte = $string;

$marqueurDebutLien = '<FORM>'; 
$debutLien = strpos( $texte, $marqueurDebutLien ) + strlen( $marqueurDebutLien ); 
$marqueurFinLien = '</FROM>'; 
$finLien = strpos( $texte, $marqueurFinLien ); 
$leLien = substr( $texte, $debutLien, $finLien - $debutLien ); 



$ok = strpos($leLien, "COMMENTAIRE");
if ($ok === false)
{  
    $CommentYN = "N";
}
else
{
     $CommentYN = "O";
}

// echo  $CommentYN;
$link_to_moz = $url;
include "getmoz.php";
$date =  date('d').'-'.date('m').'-'.date('Y');
$req = "UPDATE resultat SET CommentYN = '$CommentYN' , PA = '$PA' , DA = '$DA',date_maj = '$date' WHERE ID = '$identifiant'";
$comments = $db->query($req);
// include "function_verif_bien.php";


$id_resultat = $identifiant;
include "function_verif_bien.php";
//$req = "UPDATE resultat SET CommentYN = '$CommentYN' WHERE ID = '$identifiant'";
}

// echo "<pre>";
// print_r($resultatfin); 
// echo "</pre>";

// header ("Refresh :1;url=http://link.seo-pac.fr/CHRON1.php");
// header("Location: http://link.seo-pac.fr/CHRON1.php");

?>
