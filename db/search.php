<?php
    $key=$_GET['key'];
    $array = array();
	
	//Database Configuration File
    include 'config.php';	
	
   //$query=mysql_query("select * from drags where drags_name LIKE '%{$key}%' OR generic_name LIKE '{$key}%'");
	//$query=mysql_query("SELECT drags.brand_name, generic_name.generic_name FROM drags INNER JOIN generic_name ON drags.generic_id = generic_name.generic_name_id WHERE drags.brand_name LIKE '%{$key}%' OR generic_name.generic_name LIKE '{$key}%'");
	
    $query=mysql_query("SELECT brand_strength_form_price.brand_name_fk, brand_strength_form_price.strength_name_fk, brand_strength_form_price.packsize_fk, brand_strength_form_price.form_name_fk, brand_strength_form_price.price FROM brand_strength_form_price WHERE brand_strength_form_price.brand_name_fk LIKE '%{$key}%'");	
	
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row;
    }
    echo json_encode($array);
?>


