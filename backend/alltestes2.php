<?php
echo "SELECT * FROM wp_db7_forms";
$tout = $db->query("SELECT * FROM wp_db7_forms"); 
while ($data = $tout->fetch()) {

	echo $data["form_value"]."<br><br>";
	}
  ?>	
	