<div class="col-md-12">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Liste des Testes</h3>

              <div class="box-tools pull-right">
                            </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
          <div class="box-body">
               <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
           <div class="row">
                  <div class="col-sm-6">
                    <div class="dataTables_length" id="example1_length">
                     </div></div></div>
                        <div class="row"><div class="col-sm-12">
     
     
	 
	 
  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
             <thead>
              <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending">#</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending">Nom Patient</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending"> Téléphone</th>
				  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending">Ville</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending">Age</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending">Tmp</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending">Resp</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending">Ext.</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending">C.M</th>
				  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending">Date</th>
				  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending">Statut</th>
				 
				  <th style="width: 10%">Quarantaine</th>
				  
                </tr>
                 </thead>
          <tbody>
<?php
$tout = $db->query("SELECT * FROM wp_db7_forms where mort = ''"); 
while ($data2 = $tout->fetch()) {
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
                                }
                         
                     //  - - - - - - 

                       }
	?>
	<tr>
		<?php
		
$score = get_score($tab["tmp"][0],$tab["resp"][0],$tab["voi"][0],$tab["cm"][0],$tab["drh"][0],$tab["tete"][0],$tab["gorge"][0],$tab["toux"][0],$tab["fatigue"][0],$tab["corbature"][0],$tab["epidemie"][0]);
$resultat = get_resultat($score);
$getbutton = get_resultat_button($resultat);
		$id = $data2["form_id"];
		if ($tab["genre"] == "Masculin"){$gnr = "man.png";}else {$gnr = "woman.png";}
		$img = "bower_components/".$gnr;
		if ($tab["tmp"][0] == "Oui") {$tempe = '<span class="label label-danger">Oui</span>';}
		else {$tempe = '<span class="label label-success">Non</span>';}
		if ($tab["resp"][0] == "Oui") {$respe = '<span class="label label-danger">Oui</span>';}
		else {$respe = '<span class="label label-success">Non</span>';}
		if ($tab["voi"][0] == "Oui") {$voi = '<span class="label label-danger">Oui</span>';}
		else {$voi = '<span class="label label-success">Non</span>';}
		if ($tab["cm"][0] == "Oui") {$cm = '<span class="label label-danger">Oui</span>';}
		else {$cm = '<span class="label label-success">Non</span>';}
		?>
		<td>
			<a href = "viewcase.php?id=<?php echo $id;?>"><img src = "<?php echo $img; ?>" /></a></td>
		<td><?php echo $tab["name"];?></td>
		<td><?php echo $tab["tel"];?></td>
			<td><?php echo $tab["ville"];?></td>
	<td><?php echo diff_age($tab["age"]);?></td>
	<td><?php echo $tempe;?></td>
	<td><?php echo $respe;?></td>
	<td><?php echo $voi;?></td>
	<td><?php echo $cm;?></td>
<td><?php echo "Vide Mnt";?></td>
<td><?php echo $getbutton;?></td>

<td>
	<?php 
	if ($data2["quarantaine"] == "Oui")
	{
		if (diff_day($data2["date_quarantaine"])> 15)
		{
			?>
			<strong><span style = "color:green">Sortie</span></strong>
			<?php
		}
		
		else {
			?>
			<strong><span style = "color:orange">Reste <?php echo 15 -diff_day($data2["date_quarantaine"]);?> Jours</span></strong>
			<?php
	}
	}
	else
		 {
		 	$nme = $tab["name"];
		 	$mis = "mettre_en_quarantaine('','".$id."','".$nme."')";
		 	?>
		 	<button type="button" class="btn btn-block btn-danger" onclick="<?php echo $mis; ?>"> <i class= "fa fa-calendar-minus-o"></i> Mettre Danger</button>
		 	<?php
		 }
	?>

</td>
	</tr>

	<?php


}
?>

              </tbody></table>
			  
			  
            </div> </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->




        </div>


<br>


 <div class="row">
    
 <div class="col-md-6">
          <!-- jQuery Knob -->
          <div class="box box-solid">
           

 <div class="box-header with-border">
              <h3 class="box-title">Statistiques Par Genres</h3>

              <div class="box-tools pull-right">
                            </div>
              <!-- /.box-tools -->
            </div>



             <?php 
                $now = "";
                $resultat = get_stat_genre($now); 
                             ?>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
               
            <!-- ./col -->
            <div class="col-md-6 text-center">
                  <div style="display:inline;width:90px;height:90px;"><input type="text" class="knob" value="<?php echo $resultat["MasculainP"]; ?>" data-min="0" data-max="100" data-width="90" data-height="90" data-fgcolor="#00a65a" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; font: bold 18px Arial; text-align: center; color: rgb(0, 166, 90); padding: 0px; -moz-appearance: none;"></div>

                  <div class="knob-label">Masculains(<?php echo $resultat["Masculain"]; ?>)</div>
                </div>
                <div class="col-md-6 text-center">
                  <div style="display:inline;width:90px;height:90px;"><input type="text" class="knob" value="<?php echo $resultat["FemininP"]; ?>" data-min="0" data-max="100" data-width="90" data-height="90" data-fgcolor="#00a65a" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; font: bold 18px Arial; text-align: center; color: rgb(0, 166, 90); padding: 0px; -moz-appearance: none;"></div>

                  <div class="knob-label">Féminin(<?php echo $resultat["Feminin"]; ?>)</div>
                </div>
                <!-- ./col -->
               
                <!-- ./col -->
              </div>
              <!-- /.row -->

            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
 <div class="col-md-6">
          <!-- jQuery Knob -->
          <div class="box box-solid">
            <div class="box-header">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Tous Les Testes</h3>

              <div class="box-tools pull-right">
                <?php 
                $now = "%";
                $resultat = get_stat_now($now); 
              
                ?>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
               
            <!-- ./col -->
            <div class="col-md-3 text-center">
                  <div style="display:inline;width:90px;height:90px;"><input type="text" class="knob" value="<?php echo $resultat["NonP"]; ?>" data-min="0" data-max="100" data-width="90" data-height="90" data-fgcolor="#00a65a" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; font: bold 18px Arial; text-align: center; color: rgb(0, 166, 90); padding: 0px; -moz-appearance: none;"></div>

                  <div class="knob-label">Cas Normales(<?php echo $resultat["Non"]; ?>)</div>
                </div>
                <div class="col-md-3 text-center">
                  <div style="display:inline;width:90px;height:90px;"><input type="text" class="knob" value="<?php echo $resultat["NormaleP"]; ?>" data-min="0" data-max="100" data-width="90" data-height="90" data-fgcolor="#00a65a" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; font: bold 18px Arial; text-align: center; color: rgb(0, 166, 90); padding: 0px; -moz-appearance: none;"></div>

                  <div class="knob-label">Cas a Suivre(<?php echo $resultat["Normale"]; ?>)</div>
                </div>
                <!-- ./col -->
                <div class="col-md-3 text-center">
                  <div style="display:inline;width:90px;height:90px;"><input type="text" class="knob" value="<?php echo $resultat["GraveP"]; ?>" data-width="90" data-height="90" data-fgcolor="orange" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; font: bold 18px Arial; text-align: center; color: orange; padding: 0px; -moz-appearance: none;"></div>

                  <div class="knob-label">Cas Graves (<?php echo $resultat["Grave"]; ?>)</div>
                </div>

                <div class="col-md-3 text-center">
                  <div style="display:inline;width:90px;height:90px;"><input type="text" class="knob" value="<?php echo $resultat["TresGraveP"]; ?>" data-width="90" data-height="90" data-fgcolor="red" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; font: bold 18px Arial; text-align: center; color: red; padding: 0px; -moz-appearance: none;"></div>

                  <div class="knob-label">Cas Trés Graves(<?php echo $resultat["TresGrave"]; ?>)</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->

            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>


        </div>





 


	