            <?php
            include "fnmenu.php";
             $base_url = "/opt/lampp/htdocs/backlink-seo/";
             $app_dir = "/backlink-seo/";
            $current_link = str_replace($base_url, "" ,$_SERVER['REQUEST_URI']);
            $current_link = str_replace($app_dir, "" ,$current_link);
            $current_link = Delete_params($current_link);
            $tag_site_ref = "";
            $tag_site_c = "";
            $tag_redacteur = "";
             $tag_kw ="";
             $tag_trait = "";
              $tag_config = "";
            $tag_profile = "";
            $session_en_cours = $_SESSION['SiteSelect'];

            
            if (test_site_ref_is_actif($current_link) === true)
            {
             $tag_site_ref = "active";  
            }
              if (test_site_c_is_actif($current_link) === true)
            {
             $tag_site_c = "active";  
            }
            if (test_site_keyw_is_actif($current_link) === true)
            {
             $tag_kw = "active";  
            }
             if (test_redacteur_is_actif($current_link) === true)
            {
             $tag_redacteur = "active";  
            }
             if (test_traitement_is_actif($current_link) === true)
            {
             $tag_trait = "active";  
            }
               if (test_config_is_actif($current_link) === true)
            {
             $tag_config = "active";  
            }
             if (test_profile_is_actif($current_link) === true)
            {
             $tag_profile = "active";  
            }

        ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
		   <li>
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Tableau de bord</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      
           
        <li class="treeview <?php echo $tag_site_ref; ?>">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Sites a Referencer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addsites.php"><i class="fa fa-circle-o"></i>Ajouter un site web</a></li>
            <li><a href="allsites.php"><i class="fa fa-circle-o"></i>Consulter tous les sites</a></li>
          </ul>
        </li>
        <li class="treeview <?php echo $tag_kw; ?>">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Mots Cl&egrave;s</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addkw.php"><i class="fa fa-circle-o"></i> Ajouter Mots Cl&egrave;s</a></li>
            <li><a id = "allkw" href="allkw.php?fc=<?php echo $session_en_cours; ?>"><i class="fa fa-circle-o"></i>Consulter tous les Mots Cl&egrave;s</a></li>

          </ul>
        </li>
		<li class="treeview <?php echo $tag_site_c; ?>">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Sites Concurents</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addsitec.php"><i class="fa fa-circle-o"></i> Ajouter un site concurent</a></li>
            <li><a href="allsitec.php?fc=<?php echo $session_en_cours; ?>"><i class="fa fa-circle-o"></i>Consulter les sites concurents</a></li>

          </ul>
        </li>
		
		
		<li class="treeview <?php echo $tag_redacteur; ?>">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>R&egrave;dacteurs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addredact.php"><i class="fa fa-circle-o"></i> Ajouter un r&egrave;dacteur</a></li>
            <li><a href="allredact.php"><i class="fa fa-circle-o"></i>Consulter les r&egrave;dacteurs</a></li>

          </ul>
        </li>
		
		
		
		
        <li class="treeview <?php echo $tag_trait; ?>">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Traitement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             
            <li><a id = "trait" href="traitement.php?fc=<?php echo $session_en_cours; ?>"><i class="fa fa-circle-o"></i>Traitement</a></li>
           <?php
		   // <li><a href="traitementC.php"><i class="fa fa-circle-o"></i>Traitement Par Concurents</a></li>
		   ?>
            <li><a id = "comment" href="commentaire.php?FC=ALL&new=0&site=<?php echo $session_en_cours; ?>"><i class="fa fa-circle-o"></i> Commentaire</a></li>
         
          </ul>
        </li>
        <li class="treeview <?php echo $tag_config; ?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>Configuration</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="ne_pas_verifier.php"><i class="fa fa-circle-o"></i> Ajouter Une Contrainte</a></li>
            <li><a href="allnpv.php"><i class="fa fa-circle-o"></i>Consulter Tous Les Contrainte</a></li>
            <li><a href="allsecarte.php"><i class="fa fa-circle-o"></i>Sites Ecart&egrave;es</a></li>
           <?php
		   // <li><a href="OR.php"><i class="fa fa-circle-o"></i>Operateur de recherche</a></li>
		   ?>
          </ul>
        </li>
		<li class="treeview <?php echo $tag_profile; ?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="editpass.php"><i class="fa fa-circle-o"></i> Modifier Mot de passe</a></li>

          </ul>
        </li>
		
		 <li class="treeview">
		
          <a href="#">
            <i class="fa fa-table"></i> <span>Statistiques</span>
            <span class="pull-right-container">
			
              <i class="fa fa-angle-left pull-right"></i>
			 
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="viewsiteperkeyword.php"><i class="fa fa-circle-o"></i>Sites Par Mots Cl&egrave;s</a></li>
            <li><a href="viewkeywordpersite.php"><i class="fa fa-circle-o"></i>Mots Cl&egrave;s Par Sites</a></li>
  
          </ul>
        </li>
		
		
    <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Support Technique</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="newticket.php"><i class="fa fa-circle-o"></i> Nouvelle Ticket</a></li>
            <li><a href="allticket.php"><i class="fa fa-circle-o"></i>Tous les Tickets</a></li>
  
          </ul>
        </li>
		
		
		
		
        </ul>
   