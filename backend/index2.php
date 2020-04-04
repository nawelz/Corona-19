<?php
include "getuser.php";
$now = date("Y")."-".date("m")."-".date("d")."%";
$resultat = get_stat_now($now);

$alltoday = get_nbr_test($now);

?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $alltoday; ?></h3>

              <p>Testes Aujourd'hui</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="alltestes.php" class="small-box-footer">Consulter <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
		 <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">

              <h3><?php echo $resultat["Grave"]+$resultat["TresGrave"]; ?><sup style="font-size: 20px"></sup></h3>

              <p>Cas Garves Aujourd'hui</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="traitement.php" class="small-box-footer">Consulter <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>0</h3>

              <p>Cas Graves Confirmé Aujourd'hui</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="allkw.php" class="small-box-footer">Consulter <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
				
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>0</h3>

              <p>Cas Déclaré</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="traitement.php" class="small-box-footer">Consulter <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

       





        <div class="col-md-6">
          <!-- jQuery Knob -->
          <div class="box box-solid">
            <div class="box-header">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Testes Aujourd'hui</h3>

              <div class="box-tools pull-right">
                <?php 
                $now = date("Y")."-".date("m")."-".date("d")."%";
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
        <!-- /.col -->
    
 <div class="col-md-6">
          <!-- jQuery Knob -->
          <div class="box box-solid">
            <div class="box-header">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Testes Ce Mois</h3>

              <div class="box-tools pull-right">
                <?php 
                $now = "_____".date("m")."%";
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



 <div class="col-md-6">
          <!-- jQuery Knob -->
          <div class="box box-solid">
            <div class="box-header">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Testes Cet Année</h3>

              <div class="box-tools pull-right">
                <?php 
                $now = date("Y")."%";
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 