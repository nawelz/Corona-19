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
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 5%">#</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 30%">Nom Patient</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 15%"> Téléphone</th>
				  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 15%">Ville</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 10px">Age</th>
				  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 10px">Date</th>
				  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 10%">Statut</th>
				  <th style="width: 10%">Supprimer</th>
				  
                </tr>
                 </thead>
          <tbody>
<?php
$tout = $db->query("SELECT * FROM wp_db7_forms"); 
while ($data = $tout->fetch()) {
	$tab = array();
	$i = 0;
	$form_data = unserialize($data["form_value"]);
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
									         
									         	$tab[$i] = $data;
									         	$i++;
									         }
									          if (trim($key_val) == "Id:tel")
								         {
								         
								         	$tab[$i] = $data;
								         	$i++;

								         }
                                }else{

                                    $key_val = str_replace('your-', '', $key);
                                    $key_val = ucfirst( $key_val );
                              
                                    //echo '<p><b>'.$key_val.'</b>: '.nl2br($data).'</p>';
                                    if (trim($key_val) == "Id:name")
								         {
								        
								         	$tab[$i] = $data;
								         	$i++;

								         }

								          if (trim($key_val) == "Id:tel")
								         {
								         
								         	$tab[$i] = $data;
								         	$i++;

								         }
                                }
                         
                     //  - - - - - - 

                       }
	?>
	<tr>
		<td><?php echo $tab[1];?><td>
		<td><?php echo $tab[0];?><td>
		<td><?php echo $tab[1];?><td>
			<td><?php echo $tab[0];?><td>
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








 


	