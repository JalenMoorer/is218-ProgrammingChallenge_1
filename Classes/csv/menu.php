<?php

namespace Classes\csv;

class menu implements menuInterface
{
	public $record;
	public $new_record;

	public function menu_links($records, $dictionary) //gathers each record row and calls the html link function from htmlmenu class
	{
		$i = 0;
		if(empty($_GET)){
			foreach($records as $key => $value)
			{
				$i++;
				$college_number = $i - 1;
				\Classes\html\htmlmenu::print_html_links($records, $college_number, $i); 
			}
		}

		$record = $records[$_GET['record']];

		$new_record = \Classes\csv\records::set_record_titles($record, $dictionary); // takes the value of _GET and passes it to a function that returns an array with new keys

		\Classes\html\htmltable::print_html_table($new_record); //outputs the keys in html-table format
	}
}