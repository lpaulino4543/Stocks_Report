<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, company_name FROM company_name order by 2 desc";
$result = $conn->query($sql);

$rows = []; 

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) { 
    $rows[] = $row;
  }
} else {
  echo "0 results";
}
$conn->close();

print_r($rows);
print_r($rows[0]["id"]);
echo " ";
print_r($rows[0]["company_name"]);


?>