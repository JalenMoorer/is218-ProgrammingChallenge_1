<?php

namespace Classes\html;

class htmltable implements htmltableInterface
{

	public static function print_html_table($array)
	{
		echo "<table border=\"1\" style=\"width:100%\";>";
		foreach($array as $key => $value)
		{	
			echo "<tr>" . "<th>". $key . "</th>" . "<td>" . $value . "</td>" . "</tr>"; 
		}
		echo "</table>";
	}
}