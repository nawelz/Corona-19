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
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 30%">Site Web</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 15%"> Date Ajout</th>
				  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 15%">Date M.A.J *</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 10px">D.A</th>
				  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 10px">P.A</th>
				  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 10%">Lien Ext.</th>
				  <th style="width: 10%">Supprimer</th>
				  
                </tr>
                 </thead>
          <tbody>
				
				<?php
                                           $tout = $db->query("SELECT * FROM sites where iduser='$iduser'"); 
											while ($data = $tout->fetch()) {
											?>
                                            <tr>
                                                <td><?php echo $data['ID'];?>.</td>

											
												 <td><?php echo get_domain_name($data['url']);?></td>
												
												 

                                                <td><?php echo $data['date_ajout'];?></td>
												<td><?php echo $data['date_maj'];?></td>
												
                                                 <td><span class="badge bg-green"><?php echo $data['DA'];?></span></td>
												 <td><span class="badge bg-blue"><?php echo $data['PA'];?></span></td>
                                              <td><span class="badge bg-yellow"><?php echo $data['EL'];?></span></td>
											  <td><a href = "deletesite.php?id=<?php echo $data['ID'];?>" onclick="return confirm('Voulez vous vraiment supprimer ?');">Supprimer</a></td>
											 </tr>
											<?php } ?>
                                            </tbody>
											
               
                  
                
                
              
              </tbody></table>
			  
			  
            </div> </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>