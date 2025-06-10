<?php
include "env.php";

if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$sql = "SELECT * FROM cover";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $data = array();

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "success", "data" => array()));
} 

$koneksi->close();

?>