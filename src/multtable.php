<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-type: text/plain');
//http://localhost/Content/multtable.php?min-multiplicand=1&max-multiplicand=2&min-multiplier=3&max-multiplier=4
//It should check that all 4 parameters exist for each missing parameter. It should print "Missing parameter [min-multiplicand ... max-multiplier]."

//Check to see that all 4 parameters exist.
if (isset($_GET['min-multiplicand'])) {
    $minMultiplicand = $_GET['min-multiplicand'];    
}
else {
    echo "Missing parameter min-multiplicand.\n";
} 
if (isset($_GET['max-multiplicand'])) {
    $maxMultiplicand = $_GET['max-multiplicand'];
}
else {
    echo "Missing parameter max-multiplicand.\n";
}
if (isset($_GET['min-multiplier'])) {
    $minMultiplier = $_GET['min-multiplier'];
}
else {
    echo "Missing parameter min-multiplier.\n";
}
if (isset($_GET['max-multiplier'])) {
    $maxMultiplier = $_GET['max-multiplier'];
}
else {
    echo "Missing parameter max-multiplier.\n";
}

//Check to see that parameters are within the correct range
if (isset($_GET['min-multiplicand']) 
    && isset($_GET['max-multiplicand'])
    && $maxMultiplicand < $minMultiplicand
    && preg_match('/^[0-9]+$/', $maxMultiplicand) 
    && preg_match('/^[0-9]+$/', $minMultiplicand))  {
    echo "Minimum multiplicand is larger than maximum.\n";
}
if (isset($_GET['min-multiplier'])
    && isset($_GET['max-multiplier'])
    && $maxMultiplier < $minMultiplier
    && preg_match('/^[0-9]+$/', $maxMultiplier) 
    && preg_match('/^[0-9]+$/', $minMultiplier))  {
    echo "Minimum multiplier is larger than maximum.\n";
}

//Check to see that the parameters are integers
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