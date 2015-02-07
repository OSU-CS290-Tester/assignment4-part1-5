<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (empty($_GET)) {
        $stringTemp = "{'Type':'GET', 'parameters':null}";
    }
    else {
        $stringTemp = "{'Type':'GET','parameters':{";
        foreach($_GET as $key => $value) {
            $stringTemp = $stringTemp . "'" . $key . "':'" . $value . "',";
        }
        $stringTemp = substr($stringTemp, 0, (strlen($stringTemp) - 1));
        $stringTemp = $stringTemp . "}}";
    }
    $returnJSONObj = json_encode($stringTemp);
    echo $returnJSONObj;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST)) {
        $stringTemp = "{'Type':'POST', 'parameters':null}";
    }
    else {
        $stringTemp = "{'Type':'POST','parameters':{";
        foreach($_POST as $key => $value) {
            $stringTemp = $stringTemp . "'" . $key . "':'" . $value . "',";
        }
        $stringTemp = substr($stringTemp, 0, (strlen($stringTemp) - 1));
        $stringTemp = $stringTemp . "}}";
    }
    $returnJSONObj = json_encode($stringTemp);
    echo $returnJSONObj;
}
?>