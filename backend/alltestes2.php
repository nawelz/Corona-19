<div class="col-md-12">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Liste des sites a referencer</h3>

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
				 
				  <th style="width: 10%">Supprimer</th>
				  
                </tr>
                 </thead>
          <tbody>
<?php
$tout = $db->query("SELECT * FROM wp_db7_forms"); 
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
								     if (trim($key_val) == "Genre")
								         {$tab["genre"] = $data[0];}
								     
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
                                }
                         
                     //  - - - - - - 

                       }
	?>
	<tr>
		<?php
		$id = $data2["form_id"];
		if ($tab["genre"] == "Masculin"){$gnr = "man.png";}else {$gnr = "woman.png";}
		$img = "bower_components/".$gnr;
		if ($tab["tmp"] == "Oui") {$tempe = '<span class="label label-danger">Oui</span>';}
		else {$tempe = '<span class="label label-success">Non</span>';}
		if ($tab["resp"] == "Oui") {$respe = '<span class="label label-danger">Oui</span>';}
		else {$respe = '<span class="label label-success">Non</span>';}
		if ($tab["voi"] == "Oui") {$voi = '<span class="label label-danger">Oui</span>';}
		else {$voi = '<span class="label label-success">Non</span>';}
		if ($tab["cm"] == "Oui") {$cm = '<span class="label label-danger">Oui</span>';}
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








 


	