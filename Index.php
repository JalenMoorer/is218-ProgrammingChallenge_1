<!doctype html>
<html>
    <head>


    </head>

<body>


<?php

include 'Classes/Core/Autoloader.php';
spl_autoload_register('Autoloader::loader');

$sample1 = new sample1();
echo '<br>';
$sample2 = new sample2();

?>

</body>
</html>