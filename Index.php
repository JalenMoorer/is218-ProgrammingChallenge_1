<?php


require_once('Classes/Autoloader.php');
spl_autoload_register('Autoloader::autoload');

$read = new Classes\csv\read();

$hd2013 = $read->read_csv_file("hd2013.csv");
$dictionary = $read->read_csv_file("dictionary.csv");

$menu = new Classes\csv\menu();

$menu->menu_links($hd2013, $dictionary);




?>
