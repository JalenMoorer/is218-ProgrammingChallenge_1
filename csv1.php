<?php

error_reporting(E_ERROR | E_PARSE); //Only disable warnings to view page clearly!

class csv
{

	public function __construct(){
		echo "<body style='margin: 0; padding:0;'>";
		echo "<h3>Integrated Post Secondary Educational Data System</h3>";	
	}

	public function csv_print()
	{
		$records = $this->csv_read("hd2013.csv");
		$dictionary = $this->csv_read("dictionary.csv");

		//$num = count($records);
		//echo $records[0]['CHFNM'];

		$colleges = array_column($records, 'INSTNM', 'UNITID');
		$full_titles = array_column($dictionary, 'varTitle', 'varnumber');

		//print_r($colleges);
		//print_r($full_title);

		$i = 0;
		if(empty($_GET)){
		foreach($colleges as $key => $value){
			$i++;
			$college_number = $i - 1;
			echo '<a href=' . '"http://localhost/php/csv1.php?record='. $college_number . '"' . '>' . $value . '</a><br>'; 
			echo '</p>';
			$college_name = $value;
		}
	  }

		$record = $records[$_GET['record']];
		$full_title = $full_titles[$_GET['record']];
		$college_title = $college_name[$_GET['record']];

		$table_head = TRUE;
		foreach($full_titles as $key => $value){
			if($table_head == TRUE)
			{	
				echo "<table style='text-align: center;' border=\"1\"><tr>"; $j++;
				$table_head = FALSE;
			}
			echo "<td>".$value."</td>";
		}
		echo "</tr>";
		foreach($record as $key => $value){
			echo "<td>".$value."</td>";
		}
		echo "</table>";

	}

	public function csv_read($csvfile)
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
		return $records;
	}
}


$csv_obj = new csv;
$csv_obj->csv_print();


?>