<?php
include 'env.php';

$response = [
    'status' => '',
    'msg' => '',
    'body' => [
        'data' => [
            'strukfile' =>''
        ]
    ]
];

if (!$koneksi) {

    $response['status'] = 400;
    $response['msg'] = "data gagal diperbarui";
} else {
    $id = $_POST['id'];
    // cek apakah user pilih strukfile baru atau tidak
if ($_FILES["strukfile"]["name"] != "") {
    // ambil nama strukfile lama
    $result = mysqli_query($koneksi, "SELECT strukfile FROM struktur WHERE id = '$id'");
    $data = mysqli_fetch_assoc($result);
    $strukfile = $data['strukfile'];

    // hapus strukfile lama
    unlink('img/struktur/' . $strukfile);

    // gunakan nama file baru yang diterima dari pengguna
    $temp = explode(".", $_FILES["strukfile"]["name"]);
    $namastrukfileBaru = md5(date('dmy h:i:s')) . '.' . end($temp);
    $target_file = "img/struktur/" . $namastrukfileBaru;
    move_uploaded_file($_FILES["strukfile"]["tmp_name"], $target_file);

    $response['body']['data']['strukfile'] = 'img/struktur/' . $namastrukfileBaru;
    mysqli_query($koneksi, "UPDATE struktur SET strukfile = '$namastrukfileBaru' WHERE id = '$id'");
}

$response['status'] = 200;
$response['msg'] = 'data berhasil diperbarui';
$response['body']['data']['id'] = $id;

mysqli_query($koneksi, "UPDATE struktur SET id = '$id' WHERE id = '$id'");

}

echo json_encode($response);