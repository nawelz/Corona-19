<?php
$idcase = $_GET["id"];
$tout = $db->query("SELECT * FROM wp_db7_forms where form_id = '$idcase'"); 
$data2 = $tout->fetch();
	$tab = array();
	$i = 0;
	$form_data = unserialize($data2["form_value"]);
	foreach ($form_data as $key => $data){

                            $matches = array();

                            if ( $key == 'cfdb7_status' )  continue;
                      
                            if( ! empty($matches[0]) ) continue;

                                     if ( is_array($data) ) {

                                    $key_val = str_replace('your-', '', $key);
                                    $key_val = ucfirst( $key_val );
                                    $arr_str_data =  implode(', ',$data);
                                  
                                  //echo '<p><b>'.$key_val.'</b>: '. nl2br($arr_str_data) .'</p>';
									if (trim($key_val) == "Id:name")
									         {
									         
									         	$tab["name"] = $data;
									      
									         }
									          if (trim($key_val) == "Id:tel")
								         {
								         
								         	$tab["tel"] = $data;
								         

								         }
								             if (trim($key_val) == "Ville")
								         {
								         
								         	$tab["ville"] = $data;
								          }
								            if (trim($key_val) == "Naissance")
								         {
								        	$tab["age"] = $data;
								         }
								             if (trim($key_val) == "Remperature")
								         {
								         	$tab["tmp"] = $data;
								        
								         }

								        if (trim($key_val) == "Respiratoire")
								         {$tab["resp"] = $data;}
								       if (trim($key_val) == "Voyage")
								         {$tab["voi"] = $data;}
								       if (trim($key_val) == "Contactcorona")
								         {$tab["cm"] = $data;}
								      if (trim($key_val) == "Dairrhe")
								         {$tab["drh"] = $data;}
								     if (trim($key_val) == "Genre")
								         {$tab["genre"] = $data[0];}
								        if (trim($key_val) == "Tete")
								         {$tab["tete"] = $data;}
								          if (trim($key_val) == "Gorge")
								         {$tab["gorge"] = $data;}
								      if (trim($key_val) == "Fatigue")
								         {$tab["fatigue"] = $data;}
								      if (trim($key_val) == "Toux")
								         {$tab["toux"] = $data;}
								       if (trim($key_val) == "Courbature")
								         {$tab["corbature"] = $data;}
								      if (trim($key_val) == "Contact")
								         {$tab["epidemie"] = $data;}
								      if (trim($key_val) == "Id:email")
								         {$tab["mail"] = $data;}
								       if (trim($key_val) == "Id:poids")
								         {$tab["poids"] = $data;}
								      if (trim($key_val) == "Id:taille")
								         {$tab["taille"] = $data;}
								       if (trim($key_val) == "Id:sugg")
								         {$tab["note"] = $data;}
								     if (trim($key_val) == "Enceinte")
								         {$tab["Enceinte"] = $data;}
								     
                                }else{

                                    $key_val = str_replace('your-', '', $key);
                                    $key_val = ucfirst( $key_val );
                              
                                    //echo '<p><b>'.$key_val.'</b>: '.nl2br($data).'</p>';
                                    	if (trim($key_val) == "Id:name")
									         {
									         
									         	$tab["name"] = $data;
									        
									         }
									          if (trim($key_val) == "Id:tel")
								         {
								         
								         	$tab["tel"] = $data;
								         

								         }
								             if (trim($key_val) == "Ville")
								         {
								         
								         	$tab["ville"] = $data;
								         


								         }
								             if (trim($key_val) == "Naissance")
								         {
								         
								         	$tab["age"] = $data;
								         

								         }
								              if (trim($key_val) == "Remperature")
								         {$tab["tmp"] = $data;}
								      if (trim($key_val) == "Id:email")
								         {$tab["mail"] = $data;}
								        if (trim($key_val) == "Respiratoire")
								         {$tab["resp"] = $data;}
								       if (trim($key_val) == "Voyage")
								         {$tab["voi"] = $data;}
								       if (trim($key_val) == "Contactcorona")
								         {$tab["cm"] = $data;}
								        if (trim($key_val) == "Genre")
								         {$tab["genre"] = $data[0];}
								     if (trim($key_val) == "Dairrhe")
								         {$tab["drh"] = $data;}
								      if (trim($key_val) == "Tete")
								         {$tab["tete"] = $data;}

								      if (trim($key_val) == "Gorge")
								         {$tab["gorge"] = $data;}

								      if (trim($key_val) == "Toux")
								         {$tab["toux"] = $data;}
								      if (trim($key_val) == "Fatigue")
								         {$tab["fatigue"] = $data;}
								     if (trim($key_val) == "Courbature")
								         {$tab["corbature"] = $data;}
								      if (trim($key_val) == "Contact")
								         {$tab["epidemie"] = $data;}
								      if (trim($key_val) == "Id:poids")
								         {$tab["poids"] = $data;}
								      if (trim($key_val) == "Id:taille")
								         {$tab["taille"] = $data;}

								      if (trim($key_val) == "Id:sugg")
								         {$tab["note"] = $data;}

								      if (trim($key_val) == "Enceinte")
								         {$tab["Enceinte"] = $data;}
                                }
                         
                     //  - - - - - - 

                       }
	?>

		<?php
$date_add = $data2["form_date"];
$id = $data2["form_id"];
		if ($tab["Enceinte"][0] == "Oui") {$Enceinte = '<span class="label label-danger">Oui</span>';}
		else {$Enceinte = '<span class="label label-success">Non</span>';}
		if ($tab["toux"][0] == "Oui") {$toux = '<span class="label label-danger">Oui</span>';}
		else {$toux = '<span class="label label-success">Non</span>';}
		if ($tab["drh"][0] == "Oui") {$drh = '<span class="label label-danger">Oui</span>';}
		else {$drh = '<span class="label label-success">Non</span>';}
		if ($tab["tete"][0] == "Oui") {$tete = '<span class="label label-danger">Oui</span>';}
		else {$tete = '<span class="label label-success">Non</span>';}
		if ($tab["gorge"][0] == "Oui") {$gorge = '<span class="label label-danger">Oui</span>';}
		else {$gorge = '<span class="label label-success">Non</span>';}
		if ($tab["fatigue"][0] == "Oui") {$fatigue = '<span class="label label-danger">Oui</span>';}
		else {$fatigue = '<span class="label label-success">Non</span>';}
$score = get_score($tab["tmp"][0],$tab["resp"][0],$tab["voi"][0],$tab["cm"][0],$tab["drh"][0],$tab["tete"][0],$tab["gorge"][0],$tab["toux"][0],$tab["fatigue"][0],$tab["corbature"][0],$tab["epidemie"][0]);
$resultat = get_resultat($score);
$getbutton = get_resultat_button($resultat);
		
		if ($tab["genre"] == "Masculin"){$gnr = "manXL.png";}else {$gnr = "womanXL.png";}
		$img = "bower_components/".$gnr;
		if ($tab["corbature"][0] == "Oui") {$corbature = '<span class="label label-danger">Oui</span>';}
		else {$corbature = '<span class="label label-success">Non</span>';}
		if ($tab["tmp"][0] == "Oui") {$tempe = '<span class="label label-danger">Oui</span>';}
		else {$tempe = '<span class="label label-success">Non</span>';}
		if ($tab["resp"][0] == "Oui") {$respe = '<span class="label label-danger">Oui</span>';}
		else {$respe = '<span class="label label-success">Non</span>';}
		if ($tab["voi"][0] == "Oui") {$voi = '<span class="label label-danger">Oui</span>';}
		else {$voi = '<span class="label label-success">Non</span>';}
		if ($tab["cm"][0] == "Oui") {$cm = '<span class="label label-danger">Oui</span>';}
		else {$cm = '<span class="label label-success">Non</span>';}

		if ($tab["epidemie"][0] == "Oui") {$ep = '<span class="label label-danger">Oui</span>';}
		else {$ep = '<span class="label label-success">Non</span>';}
		
		?>

      

        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $img; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $tab["name"]; ?></h3>

              <p class="text-muted text-center"><?php echo $getbutton; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Age</b> <a class="pull-right"><?php echo diff_age($tab["age"]);?> Ans</a>
                </li>
                <li class="list-group-item">
                  <b>Poids</b> <a class="pull-right"><?php echo $tab["poids"];?> Kg</a>
                </li>
                <li class="list-group-item">
                  <b>Taille</b> <a class="pull-right"><?php echo $tab["taille"];?> Cm</a>
                </li>
              </ul>
              	<?php 
              	$nme = $tab["name"];
		 		

              	if ($data2["mort"] == "Oui")
              	{
              		?>
              		<span class="label label-danger">Mort</span>
              		<?php
              	}
              	else {
              		if  ($data2["hopitalisation"] == "")
              		{
              			$mis = "mettreahopital('','".$id."','".$nme."')";
              				?>
              				 <a href="#" class="btn btn-primary btn-block mettre" onclick="<?php echo $mis; ?>"><b>Mettre dans l'hopital</b></a>
              				 <?php

              		}
              		
              		else {
              			$mis = "sortiedehopital('','".$id."','".$nme."')";
              			?>
              				 <a href="#" class="btn btn-primary btn-block sortie" onclick="<?php echo $mis; ?>"><b>Sortie de  l'hopital</b></a>
              				 <?php
              		}
              			$mis = "mortlepatient('','".$id."','".$nme."')";
              			?>
              				 <a href="#" class="btn btn-primary btn-block mort" onclick="<?php echo $mis; ?>"><b>Déclaré Mort</b></a>
              				 <?php
              	}
             ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Cordonnées</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-mobile-phone margin-r-5"></i> Téléphone</strong>

              <p class="text-muted">
                <?php
                $tel = $tab["tel"];
                ?>
                <a href = "tel:<?php echo $tel; ?>"><?php echo $tel; ?></a>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo $tab["ville"]; ?>, Tunisie</p>

              <hr>

              <strong><i class="fa fa-envelope margin-r-5"></i> E-mail</strong>
  <p class="text-muted">
               <?php
                $mail = $tab["mail"];
                ?>
                <a href = "tel:<?php echo $mail; ?>"><?php echo $mail; ?></a>
</p>
              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>
<?php 
$note = $tab["note"];
if ($note == "") {
	echo "R.S";
}
else 
{
	echo $note;
}
?>
              </p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Symptômes</a></li>
              <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Activité</a></li>
                </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="activity">
                <!-- Post -->
                
                <!-- /.post -->

                <!-- Post -->
                <div class="post">
                <p><b>Température </b>: <?php echo $tempe; ?>
            	</p><p><b>Diffuclté Réspiratoire </b>: <?php echo $respe; ?></p>
            	<p><b>Toux</b>: <?php echo $toux; ?></p>
            	<p><b>Dairrhé</b>: <?php echo $drh; ?></p>
            	<p><b>Mal Au Téte</b>: <?php echo $tete; ?></p>
            	<p><b>Mal Au Gorge</b>: <?php echo $gorge; ?></p>
            	<p><b>Courbature</b>: <?php echo $corbature; ?></p>
            
            	<p><b>Fatigue</b>: <?php echo $fatigue; ?></p>
            	<p><b>Voyage a l'égtrangé</b>: <?php echo $voi; ?></p>
            	<p><b>Voyage a un pays touché par Covid</b>: <?php echo $ep; ?></p>
            	<p><b>Contact avec un malade de COVID</b>: <?php echo $cm; ?></p>
            	<?php 
if ($tab["genre"] == "Féminin")
{
?>
	<p><b>Enceinte</b>: <?php echo $Enceinte; ?></p>
<?php
}
?>
            	
            	
                  <!-- /.user-block -->
                  
                  <!-- /.row -->

             

                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                       
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
              

                 <!-- timeline item -->
               <?php 
               if ($data2["mort"] == "Oui")
               {

               	?>
               		 <li>
                    <div class="timeline-item">
                  

                      <h3 class="timeline-header no-border"><a href="#">Le Patient</a>est décédé 
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                   <li class="time-label">
                        <span class="bg-green">
                         <?php echo substr($data2["date_mort"],0,10);
                         ?>
                        </span>
                  </li>
                  <?php
                   }
                   	?>   




                   	 <?php 
               if ($data2["hopitalT"] == "Oui")
               {

               	?>
               		 <li>
                    <div class="timeline-item">
                  

                      <h3 class="timeline-header no-border"><a href="#">Le Patient</a>a finie son traitement a l'hopital
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                   <li class="time-label">
                        <span class="bg-green">
                         <?php echo substr($data2["date_sortie_hopital"],0,10);
                         ?>
                        </span>
                  </li>
                  <?php
                   }
                   	?>   



                   	 <?php 
               if ($data2["hopital"] == "Oui")
               {

               	?>
               		 <li>
                    <div class="timeline-item">
                  

                      <h3 class="timeline-header no-border"><a href="#">Le Patient</a>a commencé son traitement a l'hopital
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                   <li class="time-label">
                        <span class="bg-green">
                         <?php echo substr($data2["date_en_hopital"],0,10);
                         ?>
                        </span>
                  </li>
                  <?php
                   }
                   	?>   




               <?php 
               if (diff_day($data2["date_quarantaine"])> 15)
               {

               	?>
					 <li>	
                    <div class="timeline-item">
                  

                      <h3 class="timeline-header no-border"><a href="#">Le Patient</a>a Terminé son quarantaine
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                   <li class="time-label">
                        <span class="bg-green">

                         <?php 
                         	echo date($data2["date_quarantaine"], strtotime('+15 days')); 
                                                 ?>
                        </span>
                  </li>
                  <?php
                   } else 
                   {

               	?>
					 <li>	
                    <div class="timeline-item">
                  

                      <h3 class="timeline-header no-border"><a href="#">Rest dans son quarantaine</a>
                        <?php 
$reste =  15 - diff_day($data2["date_quarantaine"]); 
                        echo $reste; ?> Jours </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                   <li class="time-label">
                        <span class="bg-green">

                         <?php 
                         	echo date('Y-m-d'); 
                                                 ?>
                        </span>
                  </li>
                  <?php
                   }
                   	?>


                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
               <?php 
               if ($data2["quarantaine"] == "Oui")
               {

               	?>

                    <div class="timeline-item">
                  

                      <h3 class="timeline-header no-border"><a href="#">Le Patient</a>a commencé son quarantaine
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                   <li class="time-label">
                        <span class="bg-green">
                         <?php echo substr($data2["date_quarantaine"],0,10);
                         ?>
                        </span>
                  </li>
                  <?php
                   }
                   	?>
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                   

                      <h3 class="timeline-header"><a href="#">Le Patient</a>a fait le test en ligne</h3>

                      <div class="timeline-body">
                        Resultat  : <?php echo $getbutton; ?>
                      </div>
                     </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                         <?php echo substr($date_add,0,10);
                         ?>
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

            
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      