<?php

class csv
{

	public function __construct(){
		echo "<h3>Reading from csvfile</h3>";	
	}

	public function csv_print()
	{
		$records = $this->csv_read("test.csv");

		foreach($records as $record){
			foreach($record as $key => $value) {
				echo "<b>$key</b>". ': ' . $value .  "</br> \n";
			}echo '<hr>';
		}
	}

	public function csv_read($csvfile)
	{	
		$firstrow = TRUE;
		ini_set('auto_detect_line_endings', TRUE);
		if (( $handle = fopen($csvfile, "r")) !== FALSE)
		/*fgetcsv($handle, 1000, ",");*/ {
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
		return $records;
	}
	
	public function __destruct(){
		echo "<h3>Done reading from csvfile</h3>";
	}
}


$csv_obj = new csv;
$csv_obj->csv_print();


?>