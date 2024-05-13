<?php

include('../Stocks.php');

$rank = 1;
$symbol = "V1";
$companyName = "V2";
$quant = "V3";
$saAuthors = "V4";
$wallStreet = "V5";
$marketCap = "V6";
$marketCapInBillion = "V7";

$aStock = new Stock($rank, $symbol, $companyName, $quant, $saAuthors, $wallStreet, $marketCap, $marketCapInBillion);
print_r($aStock);

?>