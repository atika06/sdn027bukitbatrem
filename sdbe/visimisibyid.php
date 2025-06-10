<?php

include "env.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Gunakan prepared statement untuk mencegah SQL injection
    $sql = "SELECT visimisi.*, visi.visi, visi.id as visi_id FROM visimisi 
            JOIN visi ON visimisi.visi = visi.id 
            WHERE visimisi.id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode(array("status" => "success", "data" => $data));
    } else {
        echo json_encode(array("status" => "error", "message" => "Category not found"));
    }

    $stmt->close();
} else {
    echo json_encode(array("status" => "error", "message" => "id parameter not provided"));
}

$koneksi->close();
?>
