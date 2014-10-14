<?php
require_once('Classes/Core/Autoloader.php');
spl_autoload_register('Autoloader::autoload');


$sample1 = new sample1();
echo '<br>';
$sample2 = new sample2();
echo '<br>';
$sample3 = new sample3();
echo '<br>';

$html = new Classes\html\html();
 

?>
