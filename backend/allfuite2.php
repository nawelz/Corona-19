<div class="col-md-12">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Liste des Fuites de Quarantaine</h3>

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
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending">Sexe</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending">Nom Declareur</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending"> Téléphone D</th>
				  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending">Ville</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending">Nom Patient</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending">Téléhone Patient</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending">Date</th>
				  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending">Statut</th>
				 
				 
				  
                </tr>
                 </thead>
          <tbody>
<?php
$tout = $db->query("SELECT * FROM wp_db7_forms where mort = '' and form_post_id = '169'"); 
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
                                  
                                 // echo '<p><b>'.$key_val.'</b>: '. nl2br($arr_str_data) .'</p>';
									if (trim($key_val) == "Id:name")
									         {
									         
									         	$tab["name"] = $data;
									      
									         }
									          if (trim($key_val) == "Id:tel")
								         {
								         
								         	$tab["tel"] = $data;
								         

								         }
								         if (trim($key_val) == "Id:nameF")
									         {
									         
									         	$tab["nameF"] = $data;
									      
									         }
									          if (trim($key_val) == "Id:telp")
								         {
								         
								         	$tab["telF"] = $data;
								         

								         }
								             if (trim($key_val) == "Ville")
								         {
								         
								         	$tab["ville"] = $data;
								          }
								         
								     if (trim($key_val) == "Genre")
								         {$tab["genre"] = $data[0];}
								        								     
                                }else{

                                    $key_val = str_replace('your-', '', $key);
                                    $key_val = ucfirst( $key_val );
                              
                                   // echo '<p><b>'.$key_val.'</b>: '.nl2br($data).'</p>';
                                    	if (trim($key_val) == "Id:name")
									         {
									         
									         	$tab["name"] = $data;
									      
									         }
									          if (trim($key_val) == "Id:tel")
								         {
								         
								         	$tab["tel"] = $data;
								         

								         }
								         if (trim($key_val) == "Id:nameF")
									         {
									         
									         	$tab["nameF"] = $data;
									      
									         }
									          if (trim($key_val) == "Id:telp")
								         {
								         
								         	$tab["telF"] = $data;
								         

								         }
								             if (trim($key_val) == "Ville")
								         {
								         
								         	$tab["ville"] = $data;
								          }
								         
								     if (trim($key_val) == "Genre")
								         {$tab["genre"] = $data[0];}
                                }
                         
                     //  - - - - - - 

                       }
	?>
	<tr>
		<?php
		

		$id = $data2["form_id"];
		if ($tab["genre"] == "Masculin"){$gnr = "man.png";}else {$gnr = "woman.png";}
		$img = "bower_components/".$gnr;
		?>
		<td>
			<img src = "<?php echo $img; ?>" /></td>
		<td><?php echo $tab["name"];?></td>
		<td><?php echo $tab["tel"];?></td>
			<td><?php echo $tab["ville"];?></td>
		<td><?php echo $tab["nameF"];?></td>
		<td><?php echo $tab["telF"];?></td>

<td><?php echo substr($data2["form_date"],0,10);?></td>


<td>
	<?php 
	if ($data2["trouve"] == "Oui")
	{
					?>
			<strong><span style = "color:green">Arrété</span></strong>
			<?php
		
		
	}
	else
		 {
		 	$nme = $tab["name"];
		 	$mis = "arreter('','".$id."','".$nme."')";
		 	?>
		 	<button type="button" class="btn btn-block btn-danger" onclick="<?php echo $mis; ?>"> <i class= "fa fa-calendar-minus-o"></i> Arréter le Patient</button>
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
                $resultat = get_stat_declarer_genre($now); 
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
                  <div style="display:inline;width:90px;height:90px;"><input type="text" class="knob" value="<?php echo $resultat["FemininP"]; ?>" data-min="0" data-max="100" data-width="90" data-height="90" data-fgcolor="red" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; font: bold 18px Arial; text-align: center; color: rgb(0, 166, 90); padding: 0px; -moz-appearance: none;"></div>

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

              <h3 class="box-title">Tous Les Déclarations</h3>

              <div class="box-tools pull-right">
                <?php 
                $now = "";
                $resultat = get_stat_declaration($now); 
              
                ?>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
               
            <!-- ./col -->
            <div class="col-md-6 text-center">
                  <div style="display:inline;width:90px;height:90px;"><input type="text" class="knob" value="<?php echo $resultat["VieP"]; ?>" data-min="0" data-max="100" data-width="90" data-height="90" data-fgcolor="red" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; font: bold 18px Arial; text-align: center; color: rgb(0, 166, 90); padding: 0px; -moz-appearance: none;"></div>

                  <div class="knob-label">En Fuite(<?php echo $resultat["Vie"]; ?>)</div>
                </div>
                <div class="col-md-6 text-center">
                  <div style="display:inline;width:90px;height:90px;"><input type="text" class="knob" value="<?php echo $resultat["MortP"]; ?>" data-min="0" data-max="100" data-width="90" data-height="90" data-fgcolor="#00a65a" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; font: bold 18px Arial; text-align: center; color: rgb(0, 166, 90); padding: 0px; -moz-appearance: none;"></div>

                  <div class="knob-label">Arrétées(<?php echo $resultat["Mort"]; ?>)</div>
                </div>
            
              </div>
              <!-- /.row -->

            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>


        </div>





 


	