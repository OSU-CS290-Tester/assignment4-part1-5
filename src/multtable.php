<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-type: text/plain');
//http://localhost/Content/multtable.php?min-multiplicand=1&max-multiplicand=2&min-multiplier=3&max-multiplier=4
$minMultiplicand = $_GET['min-multiplicand'];
$maxMultiplicand = $_GET['max-multiplicand'];
$minMultiplier = $_GET['min-multiplier'];
$maxMultiplier = $_GET['max-multiplier'];

if (($maxMultiplicand < $minMultiplicand) && preg_match('/^[0-9]+$/', $maxMultiplicand) && preg_match('/^[0-9]+$/', $minMultiplicand))  {
    echo "Minimum multiplicand is larger than maximum.\n";
}
if (($maxMultiplier < $minMultiplier) && preg_match('/^[0-9]+$/', $maxMultiplier) && preg_match('/^[0-9]+$/', $minMultiplier))  {
    echo "Minimum multiplier is larger than maximum.\n";
}
foreach($_GET as $key => $value) {
    if (!preg_match('/^[0-9]+$/', $value)) {
        switch ($key) {
            case 'min-multiplicand':
                echo $key . " must be an integer.\n";
                break;
            case 'max-multiplicand':
                echo $key . " must be an integer.\n";
                break;
            case 'min-multiplier':
                echo $key . " must be an integer.\n";
                break;
            case 'max-multiplier':
                echo $key . " must be an integer.\n";
                break;
            default:
                break;
        }
    }
}



/*
echo '<p><h3>GET Variables</h3>
<p>
<table border="1">
<tr>
<td>Key
<td>Value';

foreach($_GET as $key => $value) {
    echo '<tr><td>' . $key . '<td>' . $value;
}
echo '</table>';
*/


?>