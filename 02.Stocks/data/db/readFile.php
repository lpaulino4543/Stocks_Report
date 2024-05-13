<?php
function getDataFromFile($fileName){
    $myfile = fopen($fileName, "r") or die("Unable to open file!");
    //Output one line until the end-of-file
    $rows = [];

    while(!feof($myfile)){
        $row = fgets($myfile);
        $columns = explode(",", $row);
        $rows[] = $columns;
    }

    fclose($myfile);
    return $rows;

}
