<?php
session_start();
if(isset($_SESSION['login2']))
{
include 'header.php';
?>
 <!-- Right side column. Contains the navbar and content of the page -->
            <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Acceuil
        <small>Tableau de Bord</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="active">Tableau de Bord</li>
      </ol>
    </section>
                <!-- Main content -->
                <section class="content">
				      <div class="row">
				<?php
include 'index2.php';
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