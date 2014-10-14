<?php

/*class Autoloader {
    static public function loader($className) {
        $filename = "Classes/" . str_replace('\\', '/', $className) . ".php";
        if (file_exists($filename)) {
            include($filename);
            if (class_exists($className)) {
                return TRUE;
            }
        }
        return FALSE;
    }
}
spl_autoload_register('Autoloader::loader');
*/

class Autoloader
{
	public static function loader($class)
	    {
	        $filename = strtolower($class) . '.php';
	        $file ='Classes/' . $filename;
	        if (!file_exists($file))
	        {
	            return false;
	        }
	        include $file;
	    }
}




?>