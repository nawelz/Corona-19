<?php
// error_reporting(0);
// require 'recaptchalib.php';
// $siteKey = '6LdWMr4UAAAAAG6CopBXLOaby8lqXBFfnnBTHUFy'; // votre clé publique
// $secret = '6LdWMr4UAAAAALd7j-EmtNJZ0qyTZA-ROED2jybg'; // votre clé privée

session_start();
if(isset($_SESSION['login2']))
{
header("Location: index.php");
                                exit();
}
$message = '';
header('Content-type: text/html; charset=UTF-8');

// Initialisation de la variable du message de réponse
$message = null;

// Récupération des variables issues du formulaire par la méthode post
$pseudo = filter_input(INPUT_POST, 'pseudo');
$pass = filter_input(INPUT_POST, 'pass');

// Si le formulaire est envoyé
if(isset($pseudo,$pass))
  {
	$a = 1;
        if($a == 1)
        {
			

   
    // $reCaptcha = new ReCaptcha($secret);
	
    // Teste que les valeurs ne sont pas vides ou composées uniquement d'espaces   
    $pseudo = trim($pseudo) != '' ? $pseudo : null;
    $pass = trim($pass) != '' ? $pass : null;
        
        
        // Si $pseudo et $pass différents de null
        if(isset($pseudo,$pass)) 
        {
                /* Connexion au serveur : dans cet exemple, en local sur le serveur d'évaluation
                A MODIFIER avec vos valeurs */
                $hostname = "localhost";
                $database = "ziedseo";
                $username = "root";
                $password = "";
                
                // Configuration des options de connexion
                
                // Désactive l'éumlateur de requêtes préparées (hautement recommandé)
                $pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;
                
                //      Active le mode exception
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                
                // Indique le charset 
                $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
                
                // Connexion
                try
                {
                        $connect = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password, $pdo_options);
                }
                catch (PDOException $e)
                {
                        exit('problème de connexion à la base');
                }    
                
                // Requête pour récupérer les enregistrements répondant à la clause : champ du pseudo et champ du mdp de la table = pseudo et mdp posté dans le formulaire
                $requete = "SELECT * FROM espace WHERE pseudo = :nom AND pass = :password";  
                
                try
                {
                        // Préparation de la requête
                        $req_prep = $connect->prepare($requete);
                        
                        // Exécution de la requête en passant les marqueurs et leur variables associées dans un tableau
                        $req_prep->execute(array(':nom'=>$pseudo,':password'=>$pass));
                        
                        // Création du tableau du résultat avec fetchAll qui récupère tout le tableau en une seule fois
                        $resultat = $req_prep->fetchAll(); 
                        
                        $nb_result = count($resultat);
                        
                        if ($nb_result == 1)
                        {
                                /* Démarre une session si aucune n'est déjà existante et enregistre le pseudo dans la variable de session $_SESSION['login'] qui donne au visiteur la possibilité de se connecter.  */
                                $_SESSION['login2'] = $pseudo;
                                                
                                // $message = 'Bonjour '.htmlspecialchars($_SESSION['login']).', vous êtes connecté';
                                //ou redirection vers une page en cas de succès ex : menu.php
include 'db.php';                               
							   $iduser = '0';
								include 'getip.php';
								$date = date('d').'-'.date('m').'-'.date('Y');
								$heure = date('h').':'.date('i').':'.date('s');
								$req = "INSERT INTO loguser(date,heure,ip,user) VALUES ('$date','$heure','$ip','$iduser')";
								$tout = $db->query($req); 

								header("Location: index.php");
                                exit();
                                
                                /*Si vous voulez récupérer les données elles se trouvent dans la première et unique ligne du tableau $resultat par exemple
                                $result = $resultat[0];
                                echo $result['pseudo'];
                                echo $result['date_enregistrement'];
                                */
                        }
                        else if ($nb_result > 1)
                        {
                                // Par sécurité si plusieurs réponses de la requête mais si la table est bien construite on ne devrait jamais rentrer dans cette condition
                                $message = 'Probl&egrave;me de d\'unicit&egrave; dans la table';
                        }
                        else
                        {   // Le pseudo ou le mot de passe sont incorrect
                                $message = 'Le pseudo ou le mot de passe sont incorrect';
                        }
                }
                catch (PDOException $e)
                {
                        $message = 'Probl&egrave;me dans la requ&egrave;te de s&egrave;lection';
                }       
        }
        else 
        {//au moins un des deux champs "pseudo" ou "mot de passe" n'a pas été rempli
                $message = 'Les champs Pseudo et Mot de passe doivent &egrave;tre remplis.';
        }
}
else {
	$message = 'Captcha INCORRECT !';
	}
	}
?>
<!DOCTYPE html>
<html>
<head>
<?php
include 'db.php';
$tout = $db->query("SELECT * FROM config where id = '1'"); 
$data = $tout->fetch();
$nom_site = $data['nom_site'];
?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Corona Solutions | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>



<body class="hold-transition login-page">
<div class="login-box">
  <?php echo $message; ?>
  <div class="login-logo">
    <a href="http://localhost/Corona-19"><b>Corona Solution</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="#" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name = "pseudo">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
         
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
