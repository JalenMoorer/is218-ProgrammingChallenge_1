<?php
/*
@author Jalen Moorer
IS218 - Programming Challenge #1
October 3rd, 2014
*/	

class csv
{
	//use git with file commands to remove things right in the repository 
	public $record;
	public $dictionary;

	public function __construct()
	{	//added html/css formatting to build the page when classed object is created
	
		$page_format = "<style> 
		body{
			margin: 0;
			padding: 0;
		}

		h3, h1{
			text-align: center;

		}

		table{
			width: 100%;
			border: 2px solid #fff;
		}

		</style>";

		echo $page_format;
		echo "<h3><u>Integrated Post Secondary Educational Data System</u></h3><hr>";	
	}

	public static function csv_print_college($records, $dictionary)
	{	
		$i = 0;
		if(empty($_GET)){
		foreach($records as $key => $value){
			$i++;
			$college_number = $i - 1;
			csv::create_link($college_number, $records, $i); //call the function to print out each college record and the hyperlink for each
		}
	  }

		$record = $records[$_GET['record']];

		csv::csv_print_records($record, $dictionary); //call the function to print out the _GET values from records
	}

	public static function csv_print_records($record, $dictionary)
	{
		$table_head = TRUE;
		$j = 0;
		echo "<h1>Record for: " . $record['INSTNM'] . "</h1>";
		foreach($record as $key => $value){	
			if($table_head == TRUE) 
			{	//prints out all records in HTML Table format
				echo "<table style='text-align: center;' border=\"1\"><tr>";
				$table_head = FALSE;
			}
			$key = $dictionary[$j]['varTitle']; //replaces the key value from records with the value of the varTitle key at that index
			echo "<th>".$key."</th>";
			$j++;
		}
		echo "</tr>";
		foreach($record as $key => $value){
			echo "<td>".$value."</td>";
		}
		echo "</table>";
	}

	public static function create_link($college_number, $records, $i)
	{
		//creates a link in html format containing the index value of needed to print out the dictionary and college records in detail
		echo $i . ': ' . '<a href=' . '"http://web.njit.edu/~jmm77/is218-fall2014/csv1.php?record='. $college_number . '"' . '>' . $records[$i-1]['INSTNM']. '</a><br>';
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