
function sleep(seconds){
    var waitUntil = new Date().getTime() + seconds*1000;
    while(new Date().getTime() < waitUntil) true;
}

function mettre_en_quarantaine(name,id,message)
{

if (confirm('Êtes vous sure de mettre en carantaine le patient '+message))
{
	var namefile = 'http://localhost/Corona-19/backend/mettreenquarantaine.php?id='+id;
	// Création d'une requête HTTP
var req = new XMLHttpRequest();
// Requête HTTP GET synchrone vers le fichier langages.txt publié localement
req.open("GET", namefile, false);
// Envoi de la requête
req.send(null);
sleep(1);
alert(message+' est mis en quarantaine avec succée');
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