<?php

ini_set('display_errors',1);  error_reporting(E_ALL);
require_once('Classes/Autoloader.php');
spl_autoload_register('Autoloader::autoload');



$read = new Classes\csv\read();

$hd2013 = $read->read_csv_file("hd2013.csv");
$dictionary = $read->read_csv_file("dictionary.csv");

$menu = new Classes\csv\menu();

$menu->menu_links($hd2013);
$new_hd2013 = $menu->menu_records($hd2013);

$html_table = \Classes\html\table::print_html_table($new_hd2013);



?>
