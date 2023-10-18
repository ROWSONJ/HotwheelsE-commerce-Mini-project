<?php
$mysqli = new mysqli("localhost","root","","student");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql = "SELECT slastname, sname FROM studentbio ORDER BY slastname";
$result = $mysqli -> query($sql);

// Numeric array
if ($result = $mysqli -> query($sql)) {
    while ($obj = $result -> fetch_object()) {
      printf("%s (%s)\n", $obj->slastname, $obj->sname);
    }
    $result -> free_result();
  }

$mysqli -> close();
?>