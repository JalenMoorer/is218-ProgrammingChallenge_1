<?php

namespace Classes\html;

class htmlmenu
{
	public static function print_html_links($records, $college_number, $i)
	{

	echo $i . ': ' . '<a href=' . '"http://web.njit.edu/~jmm77/is218-fall2014/csv1.php?record='. $college_number . '"' . '>' . $records[$i-1]['INSTNM']. '</a><br>';
	
	}

}