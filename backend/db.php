<?php

try{
$db = new PDO('mysql:host=localhost;dbname=corona_19','root','');
}
	catch(Exception $e) {
		die ('Error: ' . $e->getMessage());
	}
?>