<div class="col-md-12">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Historique des cas réels</h3>

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
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 30%">Site Web</th>
				  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 15px">R&egrave;dacteur</th>
				  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 15px">Occurances</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 15%"> Date Ajout</th>
                  <th style="width: 15%"> Supprimer</th>
				 
                </tr>
				  </thead>
          <tbody>
				
				
                                           
              
              </tbody></table>
			  
			  
            </div> </div>
            <!-- /.box-body -->
          </div>
          <?php

// Read JSON file
$readjson = file_get_contents('https://pomber.github.io/covid19/timeseries.json') ;

//Decode JSON
$data = json_decode($readjson, true);

echo "<br/><br/> Employee names are: <br/>";

//Parse the employee name
foreach ($data as $emp) {

  echo $emp->Tunisia."<br/> --------- <br/>";
}
?>

          <!-- /.box -->
        </div>