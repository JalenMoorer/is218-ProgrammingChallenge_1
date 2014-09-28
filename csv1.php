<?php

class csv
{

	public function __construct($csvfile){
		echo "<h3>Reading from csvfile</h3>";	
	}

	public function read_file($csvfile)
	{	
		$firstrow = TRUE;
		ini_set('auto_detect_line_endings', TRUE);
		if (( $handle = fopen($csvfile, "r")) !== FALSE) {
			while (($row = fgetcsv($handle, 1000, ",")) !== FALSE){
			if($firstrow == TRUE ){
			$column_heading = $row;
			$firstrow = FALSE;	
			}else{
			$record = array_combine($column_heading, $row);
			$records[] = $record;				
			}
				
		 	}
			fclose($handle);
		}
		foreach($records as $record){
			foreach($record as $key => $value) {
				echo "<b>$key</b>". ': ' . $value .  "</br> \n";
				//format web key?
			}echo '<hr>';
		}
	}
	
	
	public function __destruct(){
		echo "<h3>Done reading from csvfile</h3>";
	}
}


$csv_obj = new csv;
$csv_obj->read_file("test.csv");

//$csv_obj2 = new csv;
//$csv_obj2->read_file("countrylist.csv");





?>