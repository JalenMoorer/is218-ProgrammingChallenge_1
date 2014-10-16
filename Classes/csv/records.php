<?php
namespace Classes\csv;

class records implements recordsInterface
{

	public static function set_record_titles($record, $dictionary) 
	{	
		$j = 0;
		foreach($record as $key => $value)
		{	
			$newkey = $dictionary[$j]['varTitle'];
			$record[$newkey] = $value; //overwrites the record array and replaces it with values from the dictionary array and unsets the old values
			unset($record[$key]);
			$j++;
		}
		return $record;
	}
}