<?php
$test = $db->query("SELECT * FROM sites where iduser = '$iduser'");
if ($test->rowCount()== 0)
	{
?>
<div class="col-md-12">
<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                 
                                        <b>Alert!</b> Aucun Site Web n&#39;est Trouv&egrave;e! <a href = "addsites.php">Veuillez Ajouter un site web</a> 
                                    </div> </div>
<?php
	}
	else
		{
	$test = $db->query("SELECT * FROM keyw where iduser = '$iduser'");
	if ($test->rowCount()== 0)
			{
?>
<div class="col-md-12">
<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                 
                                        <b>Alert!</b> Aucun Mots Cl&egrave;s n&#39;est Trouv&egrave;e! <a href = "addkw.php">Veuillez Ajouter un mots cl&egrave;s</a> 
                                    </div> </div>
<?php
			}
			else
{
include 'allkw3.php';
}
		}


  ?>