<?php


error_reporting(E_ERROR | E_PARSE); //Only disable warnings to view page clearly!

class csv
{

	public function __construct(){
		echo "<h3>Integrated Post Secondary Educational Data System</h3>";	
	}

	public function csv_print()
	{
		$records = $this->csv_read("hd2013.csv");
		$num = count($records);

		$colleges = array_column($records, 'INSTNM', 'UNITID');
		//print_r($colleges);


		$i = 0;
		foreach($colleges as $key => $value){
			$i++;
			$college_number = $i - 1;
			echo $i . ' : ' , '<a href=' . '"csv1.php?college='. $college_number . '"' . '>' . $value . '</a><br>'; 

			echo '</p>';
		}

		/*if (is_array($records)){
			foreach($records as $record){
				foreach($record as $key => $value) {
					 echo "<b>$key</b>". ': ' . $value .  "</br> \n";
				}echo '<hr>';
			}
		}*/
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
		echo "<h3>End of file</h3>";
	}
}


$csv_obj = new csv;
$csv_obj->csv_print();


?>