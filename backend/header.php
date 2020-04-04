<?php 
//error_reporting(0);
include 'db.php';
include "functions.php";
include "function_lib.php";
include "getuser.php";
if(isset($_SESSION['SiteSelect']))
{
$nothing = "ALL";
 $session_en_cours = $_SESSION['SiteSelect'];
}
else 
{
$_SESSION['SiteSelect'] = "ALL";
}
 ?>
<!DOCTYPE html>
<html>
<head>
<?php
$tout = $db->query("SELECT * FROM config where id = '1'"); 
$data = $tout->fetch();
$nom_site = $data['nom_site'];
$touta = $db->query("SELECT * FROM espace where id = '$iduser'"); 
$dataa = $touta->fetch();
$date_enregistrement = $dataa['date_enregistrement'];
$nom = $dataa['nom'];

?>
<?php
$nomi = $_SERVER['PHP_SELF'];

if ($nomi === "/search.php")
{
$idt = $_GET["traite"];
$TP = $_GET["TP"];
$idtraitement = $idt;

$test = $db->query("SELECT * FROM resultat where idtraitement = '$idtraitement' AND CommentYN = ''");

$nbr_all = $test->rowCount();
	if ($nbr_all > 0 ){
?>
<meta http-equiv="refresh" content="2" >
<?php
}
}
?>

   <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $nom_site; ?> | Tableau de bord</title>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script>
$(document).ready(function () {
$('#dtHorizontalExample').DataTable({
"scrollX": true
});
$('.dataTables_length').addClass('bs-select');
});
</script>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/yes.css">
  <link rel="stylesheet" href="bower_components/space.css">
  <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <script src = "confirm.js"></script>
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="styleform.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="bower_components/table.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


  <link rel="stylesheet" href="bower_components/chosen.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  
  
  
  
  
 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


</head>
 	   

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 <?php 
		$nomi = $_SERVER['PHP_SELF'];
		// echo $nomi;

if (($nomi != "/voirancre.php") && ($nomi != "/commenter.php"))
{
  
  
  ?>
  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>EO</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo $nom_site; ?></b>Board</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
       <?php 
	   // include "notif.php";
	   // include "notif.php";
	   ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $nom; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                <?php echo $nom; ?>
                  <small>Membre Du  <?php echo $date_enregistrement; ?></small>
                </p>
              </li>
              <!-- Menu Body -->
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="editpass.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">D&egrave;connexion</a>
                </div>
              </li>
            </ul>
          </li>
     
        </ul>
      </div>
    </nav>
	
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $nom; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> En Ligne</a>
        </div>
      </div>
	  
      <!-- search form -->
    
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
<?php
		include 'menu.php';
?>
 </section>
    <!-- /.sidebar -->
  </aside>
  <?php
		}		?>
		
		