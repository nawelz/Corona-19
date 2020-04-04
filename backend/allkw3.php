<form method = "GET" action = "#" enctype="multipart/form-data">
<div class="col-md-12">

<div class ="col-md-3"><strong>Filtre par sites : </strong></div>
<div class ="col-md-3">
<select data-placeholder="Choisir votre site web..." class="chosen-select form-control" tabindex="2" name = "fc">
<option value = "ALL">--- TOUS ---</option>
<?php 
$touter = $db->query("SELECT * FROM sites where iduser = '$iduser'");
													while ($datae = $touter->fetch()){
													$url = $datae['url'];
													$idd = $datae['ID'];
													?>
                    <option value = "<?php echo $idd; ?>"><?php echo get_domain_name($url); ?></option>
                    <?php 
													} 
													?>
                  </select>

</div>



<div class ="col-md-3"><button type="submit" class="btn btn-primary">Appliquer</button></div>
<div class ="col-md-3"></div>
</div>
</form>
<br><br>
<div class="col-md-12">



				  
				  
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Mots Cl&egrave;s</h3>

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
     <?php
	 $id_de_site = $_GET["fc"];
	 if ($id_de_site === "ALL")
	 {
		 $requette = "SELECT * FROM keyw where iduser='$iduser'";
	 }
 else
 {
	  $requette = "SELECT * FROM keyw where iduser='$iduser' AND sitew = '$id_de_site'";
 }
?>
	 

	  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
             <thead>
              <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 5%">#</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 30%">Site Web</th>
				  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 15px">Mots Cle</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 15%"> Date Ajout</th>
                  <th style="width: 15%"> Supprimer</th>
				 
                </tr>
                 </thead>
				  <tbody>
				
				<?php
                                           $tout = $db->query($requette); 
										   $i=0;
											while ($data = $tout->fetch()) {
											?>
                                            <tr>
                                                <td><?php $ide = $data['ID'];
												$ide2 = $data['sitew'];
												$i++;
												echo $i;?>.</td>
													<?php 
													$touter = $db->query("SELECT * FROM sites where id = '$ide2'");
													$datae = $touter->fetch();
													$url = $datae['url'];
											?>
												 <td><?php echo get_domain_name($url);?></td>
												
												 <td><span class="badge bg-green"><?php echo $data['cle'];?></span></td>

                                                <td><?php echo $data['date_ajout'];?></td>
												<td><a href = "deletekw.php?id=<?php echo $data['ID'];?>" onclick="return confirm('Voulez vous vraiment supprimer <?php echo $data['cle'];?> ?');">Supprimer</a></td></td>
										
												
                                               
											 </tr>
											<?php } ?>
                                         
                
              
              </tbody></table>
			  
			  
            </div> </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>