<?php
include "env.php";

$res = [
  "status" => 200,
  "msg" => "",
  "body" => [
    "data" => [
      "visi" => "",
      "misi" => ""
    ]
  ]
];

if (isset($_GET['id']) && isset($_POST['visi_id']) && isset($_POST['misi'])) {
    $id = $_GET['id'];
    $visi_id = $_POST['visi_id'];
    $misi = $_POST['misi'];

    // Gunakan prepared statements untuk mencegah SQL injection
    $stmt = $koneksi->prepare("UPDATE visimisi SET visi = ?, misi = ? WHERE id = ?");
    $stmt->bind_param("ssi", $visi_id, $misi, $id);

    if ($stmt->execute()) {
        $res['msg'] = "Data berhasil diupdate";
        $res['body']['data']['visi'] = $visi_id;
        $res['body']['data']['misi'] = $misi;
    } else {
        $res['status'] = 400;
        $res['msg'] = "Gagal mengupdate visimisi";
        $res['body']['error'] = "Kesalahan validasi input";
    }

    $stmt->close();
} else {
    $res['status'] = 400;
    $res['msg'] = "Parameter tidak lengkap";
    $res['body']['error'] = "Parameter id, visi_id, dan misi harus disertakan";
}

$koneksi->close();

echo json_encode($res);
?>
