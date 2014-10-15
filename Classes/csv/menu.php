<?php

namespace Classes\csv;

class menu implements menuInterface
{
	public function menu_links($records)
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
	}

	public function menu_records($records)
	{
		$record = $records[$_GET['record']];
		$college_records = \Classes\csv\records::set_record_titles($record);

		return $college_records;
	}


}