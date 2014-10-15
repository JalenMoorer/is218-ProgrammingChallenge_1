<?php

namespace Classes\csv;

class menu implements menuInterface
{
	public $record;

	public function menu_links($records, $dictionary)
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

		$updated_record = \Classes\csv\records::set_record_titles($record, $dictionary);

		\Classes\html\htmltable::print_html_table($updated_record);
	}

	/*public function menu_records($records, $dictionary)
	{
		$record = $records[$_GET['record']];
		$college_records = \Classes\csv\records::set_record_titles($record, $dictionary);
		return $college_records;
	}*/
}