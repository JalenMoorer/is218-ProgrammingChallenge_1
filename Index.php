<?php
require_once('Classes/Autoloader.php');
spl_autoload_register('Autoloader::autoload');



$read = new Classes\csv\read();

$hd2013 = $read->read_csv_file("hd2013.csv");
$dictionary = $read->read_csv_file("dictionary.csv");

$menu = new Classes\csv\menu();

$menu->menu_links($hd2013);
$new_hd2013 = $menu->$menu_records($hd2013);

//$html = new Classes\html\html();


/*$sample1 = new sample1();
echo '<br>';
$sample2 = new sample2();
echo '<br>';
$sample3 = new sample3();
echo '<br>';

$html = new Classes\html\html();
echo '<br>';
$core1 = new Classes\core\core1();
echo '<br>';
$core2 = new Classes\core\core2();
echo '<br>';
$core3 = new Classes\core\core3();
echo '<br>';
$supercore = new Classes\core\supercore\supercore();
*/


?>
