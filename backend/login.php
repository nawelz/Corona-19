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
                $database = "corona_19";
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
        <title><?php echo $nom_site; ?> | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
 <script src="https://www.google.com/recaptcha/api.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src = "https://www.waoo-digital.com/wp-content/uploads/2017/05/logo.gif" />
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  <?php echo $message; ?>

    <form action="#" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="pseudo" class="form-control" placeholder="Utilisateur" >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="pass" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	  
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Se Connecter</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   
    <!-- /.social-auth-links -->


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
