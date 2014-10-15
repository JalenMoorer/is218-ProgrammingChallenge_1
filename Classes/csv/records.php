<?php
namespace Classes\csv;

class records implements recordsInterface
{

	public static function set_record_titles($record, $dictionary)
	{
		$j = 0;
		foreach($record as $key => $value)
		{	
			$key = $dictionary[$j]['varTitle'];
			$j++;
		}

		return $record;
	}
}