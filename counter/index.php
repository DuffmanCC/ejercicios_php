<?php 

/* First way
function set_counter($file_name = 'counter.txt'){
	if ( file_exists($file_name)) {
		// read de value
		$handle = fopen($file_name, 'r');

		// increment it by one
		$count = (int) fread($handle, 20) + 1;

		// write the new value
		$handle = fopen($file_name, 'w');
		fwrite($handle, $count);

		// close
		fclose($handle);
		
	} else {
		// create it
		$handle = fopen($file_name, 'w+');
		$count = 1;

		// set a default value of 1
		fwrite($handle, 1);
		fclose($handle);
	}

	return $count;
}
*/

// Better way
function set_counter($file_name = 'counter.txt'){
	if ( file_exists($file_name)) {
		// read de value
		$count = (int) file_get_contents($file_name) + 1;
		file_put_contents($file_name, $count);
		
	} else {
		// create it
		$handle = fopen($file_name, 'w+');
		$count = 1;
		
		// set a default value of 1
		fwrite($handle, 1);
		fclose($handle);
	}

	return $count;
}

$count = set_counter();

include('index.tmpl.php');

 




