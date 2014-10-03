<?php
/*
@author Jalen Moorer
IS218 - Programming Challenge #1
October 3rd, 2014
*/

class csv
{
	public $colleges;
	public $full_titles;

	public function __construct(){
		echo "<body style='margin: 0; padding:0;'>";
		echo "<h3>Integrated Post Secondary Educational Data System</h3>";	
	}

	public static function csv_print_college($records, $dictionary)
	{
		//Split column values from both arrays and stored them into new arrays to use
		$colleges = array_column($records, 'INSTNM', 'UNITID');
		$full_titles = array_column($dictionary, 'varTitle', 'varnumber');


		$i = 0;
		if(empty($_GET)){
		foreach($colleges as $key => $value){
			$i++;
			$college_number = $i - 1;
			csv::create_link($college_number, $value); //call the function to print out each college record and the hyperlink for each
			$college_name = $value;
		}
	  }

		$record = $records[$_GET['record']]; 
		$full_title = $full_titles[$_GET['record']];
		$college_title = $college_name[$_GET['record']];

		csv::csv_print_records($record, $full_title, $full_titles, $college_title, $colleges); //call the function to print out the _GET values from both arrays
	}

	public static function csv_print_records($record, $full_title, $full_titles, $college_title, $colleges)
	{
		$table_head = TRUE;
		$j = 0;
		foreach($full_titles as $key => $value){
			if($table_head == TRUE) 
			{	//prints out all records in HTML Table format
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

	public static function create_link($college_number, $value)
	{
		//creates a link in html format containing the index value of needed to print out the dictionary and college records in detail
		echo '<a href=' . '"http://web.njit.edu/~jmm77/is218-fall2014/csv1.php?record='. $college_number . '"' . '>' . $value . '</a><br>'; 
		echo '</p>';
	}

	public static function csv_read($csvfile)
	{	
		//reads from a csv file
		$firstrow = TRUE;
		ini_set('auto_detect_line_endings', TRUE);
		if (( $handle = fopen($csvfile, "r")) !== FALSE) {
			while (($row = fgetcsv($handle, 1000, ",")) !== FALSE){
			if($firstrow == TRUE ){
			$column_heading = $row;
			$firstrow = FALSE;	
			}else{
			$record = array_combine($column_heading, $row); //turns the first column into keys and the rest of the values uner it as values
			$records[] = $record;				
			}
				
		 	}
			fclose($handle);
		}
		return $records;
	}
}

$csv_object = new csv; //instantiated an object to invoke the constructor 

$csvfile1 = "hd2013.csv";   
$csvfile2 = "dictionary.csv";

$records = csv::csv_read($csvfile1); //store the contents of both files into seperate 
$dictionary = csv::csv_read($csvfile2);//arrays that will be used for printing

csv::csv_print_college($records, $dictionary); // call the print function to print contents from both arrays


?>