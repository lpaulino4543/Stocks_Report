<?php

include "./utility/DBUtility.php";

$sql = new DBUtility();
$sqlstatement = "select * from investments limit 20";
$data = $sql->excute($sqlstatement);
print_r($data);








?>