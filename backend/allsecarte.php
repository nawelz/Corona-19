<?php
session_start();
if(isset($_SESSION['login2']))
{
include 'header.php';
include 'getuser.php';
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
Sites Ecart&egrave;es
        <small>Tous les Sites Ecart&egrave;es</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">Sites Ecart&egrave;es</a></li>
        <li class="active">Tous Les Sites Ecart&egrave;es</li>
      </ol>
    </section>
	    <section class="content">
      <div class="row">


				<?php
include 'allsecarte2.php';
?>
 </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  
<?php
include 'footer.php';
}
else
header("Location: login.php");
?>