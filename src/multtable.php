<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//http://localhost/Content/multtable.php?min-multiplicand=5&max-multiplicand=10&min-multiplier=15&max-multiplier=20
//Check to see that all 4 parameters exist.
$fail = false;
if (isset($_GET['min-multiplicand'])) {
    $minMultiplicand = $_GET['min-multiplicand'];    
}
else {
    echo "Missing parameter min-multiplicand.<br>";
    $fail = true;
} 
if (isset($_GET['max-multiplicand'])) {
    $maxMultiplicand = $_GET['max-multiplicand'];
}
else {
    echo "Missing parameter max-multiplicand.<br>";
    $fail = true;
}
if (isset($_GET['min-multiplier'])) {
    $minMultiplier = $_GET['min-multiplier'];
}
else {
    echo "Missing parameter min-multiplier.<br>";
    $fail = true;
}
if (isset($_GET['max-multiplier'])) {
    $maxMultiplier = $_GET['max-multiplier'];
}
else {
    echo "Missing parameter max-multiplier.<br>";
    $fail = true;
}

//Check to see that parameters are within the correct range
if (isset($_GET['min-multiplicand']) 
    && isset($_GET['max-multiplicand'])
    && $maxMultiplicand < $minMultiplicand
    && preg_match('/^[0-9]+$/', $maxMultiplicand) 
    && preg_match('/^[0-9]+$/', $minMultiplicand))  {
    echo "Minimum multiplicand is larger than maximum.<br>";
    $fail = true;
}
if (isset($_GET['min-multiplier'])
    && isset($_GET['max-multiplier'])
    && $maxMultiplier < $minMultiplier
    && preg_match('/^[0-9]+$/', $maxMultiplier) 
    && preg_match('/^[0-9]+$/', $minMultiplier))  {
    echo "Minimum multiplier is larger than maximum.<br>";
    $fail = true;
}

//Check to see that the parameters are integers
foreach($_GET as $key => $value) {
    if (!preg_match('/^[0-9]+$/', $value)) {
        switch ($key) {
            case 'min-multiplicand':
                echo $key . " must be an integer.<br>";
                $fail = true;
                break;
            case 'max-multiplicand':
                echo $key . " must be an integer.<br>";
                $fail = true;
                break;
            case 'min-multiplier':
                echo $key . " must be an integer.<br>";
                $fail = true;
                break;
            case 'max-multiplier':
                echo $key . " must be an integer.<br>";
                $fail = true;
                break;
        }
    }
}

if ($fail == true) {
    echo "<br>Incorrect input. The program is aborting...<br>";
}
else {
    echo '<p><h1>Multiplication Table</h1></p>
    <table border="1">
    <tr><td>';
    for ($line1 = $minMultiplier; $line1 <= $maxMultiplier; $line1++) {
        echo '<td>' . $line1;    
    }
    for ($i = $minMultiplicand; $i <= $maxMultiplicand; $i++) {
        echo '<tr><td>' . $i;
        for ($j = $minMultiplier; $j <= $maxMultiplier; $j++) {
            echo '<td>' . ($j * $i);    
        }
    }
    echo '</table>';
}
?>