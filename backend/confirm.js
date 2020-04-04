
function validerajoutersiteareferencer()
{
if (confirm('Êtes vous dajuoter ce site \n \n La demarche est définitive et ne peut être inversée.'))
{
	alert (document.getElementById('formaddsite').nom.value);
document.getElementById('formaddsite').submit();
}
else
{
	return false;
	}
}

function sleep(seconds){
    var waitUntil = new Date().getTime() + seconds*1000;
    while(new Date().getTime() < waitUntil) true;
}

function deletebynameandid(name,id,message)
{

if (confirm('Êtes vous sure de supprimer ce site écarté'+message+' \n \n La demarche est définitive et ne peut être inversée.'))
{
	var namefile = 'http://e-reputation.seo-professionnel.fr/'+name+'.php?id='+id;
	// Création d'une requête HTTP
var req = new XMLHttpRequest();
// Requête HTTP GET synchrone vers le fichier langages.txt publié localement
req.open("GET", namefile, false);
// Envoi de la requête
req.send(null);
sleep(1);
alert(name+' est supprimé avec succée');
location.reload();
}
else
{
	return false;
	}
}

function fixsession() {
 var idsite = document.getElementById("session").value;
var traitement = "traitement.php?fc="+idsite;
var settraitement = document.getElementById("trait").setAttribute("href",traitement);
var comment = "commentaire.php?FC=ALL&new=0&site="+idsite;
var setcomment = document.getElementById("comment").setAttribute("href",comment);
var keyw = "allkw.php?fc="+idsite;
var setcomment = document.getElementById("allkw").setAttribute("href",keyw);
}