
function sleep(seconds){
    var waitUntil = new Date().getTime() + seconds*1000;
    while(new Date().getTime() < waitUntil) true;
}



function mettreahopital(name,id,message)
{

if (confirm('Êtes vous sure de mettre a l hopital le patient '+message))
{
	var namefile = 'http://localhost/Corona-19/backend/mettreahopital.php?id='+id;
	// Création d'une requête HTTP
var req = new XMLHttpRequest();
// Requête HTTP GET synchrone vers le fichier langages.txt publié localement
req.open("GET", namefile, false);
// Envoi de la requête
req.send(null);
sleep(1);
alert(message+' est mis a hopital avec succée');
location.reload();
}
else
{
	return false;
	}
}

function sortiedehopital(name,id,message)
{

if (confirm('Êtes vous sure de sortir le patient '+message+' de l hopital'))
{
	var namefile = 'http://localhost/Corona-19/backend/sortiedehopital.php?id='+id;
	// Création d'une requête HTTP
var req = new XMLHttpRequest();
// Requête HTTP GET synchrone vers le fichier langages.txt publié localement
req.open("GET", namefile, false);
// Envoi de la requête
req.send(null);
sleep(1);
alert(message+' est sortie de l hopital avec succée');
location.reload();
}
else
{
	return false;
	}
}


function mortlepatient(name,id,message)
{

if (confirm('Êtes vous sure de declarer mort le patient '+message+''))
{
	var namefile = 'http://localhost/Corona-19/backend/mort.php?id='+id;
	console.log(namefile);
	// Création d'une requête HTTP
var req = new XMLHttpRequest();
// Requête HTTP GET synchrone vers le fichier langages.txt publié localement
req.open("GET", namefile, false);
// Envoi de la requête
req.send(null);
sleep(1);
alert(message+' est malheuresement mort');
location.reload();
}
else
{
	return false;
	}
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