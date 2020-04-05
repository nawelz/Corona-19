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
      Tous Les Morts
       
      </h1>
     
    </section>
	    <section class="content">
      <div class="row">


				<?php
include 'allmorts2.php';
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