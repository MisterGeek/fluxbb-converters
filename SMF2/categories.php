<?php

// Fetch category info
$result = $fdb->query('SELECT * FROM '.$fdb->prefix.'categories') or myerror('Unable to fetch categories', __FILE__, __LINE__, $fdb->error());
while($ob = $fdb->fetch_assoc($result)){

	echo htmlspecialchars($ob['name']).' ('.$ob['id_cat'].")<br>\n"; flush();

	// Dataarray
	$todb = array(
		'id'					=>		$ob['id_cat'],
		'cat_name'			=>		$ob['name'],
		'disp_position'	=>		$ob['cat_order'],
	);

	// Save data
	insertdata('categories', $todb, __FILE__, __LINE__);
}
