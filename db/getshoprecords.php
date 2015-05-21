<?php
/*
 * @author Shahrukh Khan
 * @website http://www.thesoftwareguy.in
 * @facebbok https://www.facebook.com/Thesoftwareguy7
 * @twitter https://twitter.com/thesoftwareguy7
 * @googleplus https://plus.google.com/+thesoftwareguyIn
 */
require_once("configshop.php");

$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 10;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;

$sql = "SELECT medicin_shop.shop_name,  medicin_shop.shop_address, medicin_shop.cell FROM medicin_shop WHERE 1 ORDER BY shop_name ASC LIMIT $limit OFFSET $offset";
	try {
	  $stmt = $DB->prepare($sql);
	  $stmt->execute();
	  $results = $stmt->fetchAll();
	} catch (Exception $ex) {
	  echo $ex->getMessage();
	}

	if (count($results) > 0) {
	  foreach ($results as $row) {
	  echo '<div class="row shop">';
		echo '<div class="col-md-9">';
			echo '<h5>' . $row["shop_name"] . '<span>(30)</span></h5>';
			echo '<p>Location: '. $row["shop_address"] . '<p>';	
			echo '<p>Phone: ' . $row["cell"] . '</p>';															
			echo '<p><span class="glyphicon glyphicon-home"></span><span class="glyphicon glyphicon-earphone"></span><span class="glyphicon glyphicon-print"></span>';
		 echo '</p>';
		echo '</div>';
		echo '<div class="col-md-3">';
			 
		echo '</div>';
	echo '</div>';
	  }
	}
?>