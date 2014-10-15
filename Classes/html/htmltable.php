<?php

namespace Classes\html;

class table implements htmltableInterface
{

	public static function print_html_table($array)
	{
		foreach($array as $key => $value)
		{	
			echo "<tr>" . "<th>". $key . "</th>" . "<td>" . $value . <"/td"> . "</tr">; 
		}

	}
}