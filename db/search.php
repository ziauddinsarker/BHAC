<?php
    $key=$_GET['key'];
    $array = array();
	
	//Database Configuration File
    include 'config.php';	
	
   //$query=mysql_query("select * from drags where drags_name LIKE '%{$key}%' OR generic_name LIKE '{$key}%'");
	//$query=mysql_query("SELECT drags.brand_name, generic_name.generic_name FROM drags INNER JOIN generic_name ON drags.generic_id = generic_name.generic_name_id WHERE drags.brand_name LIKE '%{$key}%' OR generic_name.generic_name LIKE '{$key}%'");
	
    $query=mysql_query("SELECT  drags.brand_name, drug_form.drug_form_name, drug_strength.drug_strength_name FROM drug_strength_form_name INNER JOIN drags ON drug_strength_form_name.drug_name = drags.drag_id INNER JOIN drug_form ON drug_strength_form_name.form_name = drug_form.drug_form_id INNER JOIN drug_strength ON drug_strength_form_name.strentgh_name = drug_strength.drug_strength_id WHERE drags.brand_name LIKE '%{$key}%'");	
	
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row;
    }
    echo json_encode($array);
?>


