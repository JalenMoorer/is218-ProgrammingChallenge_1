<?php

namespace Classes\csv;

class read implements readInterface 
{
	public function read_csv_file($csvfile) // reads from a csv file
	{	
		//reads from a csv file
		$firstrow = TRUE;
		$row = null;
		ini_set('auto_detect_line_endings', TRUE);
		if (( $handle = fopen($csvfile, "r")) !== FALSE) {
			while (($row = fgetcsv($handle, ",")) !== FALSE){
			if($firstrow == TRUE ){
			$column_heading = $row;
			$firstrow = FALSE;
			}else{
			$record = array_combine($column_heading, $row); //turns the first column into keys and the rest of the values uner it as values
			$records[] = $record;
			memory_get_peak_usage();
			}
			unset($row);unset($record);
		 	}

			fclose($handle);
		}

		return $records;
	}

}

?>