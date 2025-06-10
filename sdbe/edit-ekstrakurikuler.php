<?php
include 'env.php';

$response = [
    'status' => '',
    'msg' => '',
    'body' => [
        'data' => [
        ]
    ]
];

if (!$koneksi) {

    $response['status'] = 400;
    $response['msg'] = "data gagal diperbarui";
} else {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    // cek apakah user pilih img1 baru atau tidak
if ($_FILES["img1"]["name"] != "") {
    // ambil nama img1 lama
    $result = mysqli_query($koneksi, "SELECT img1 FROM ekstrakurikuler WHERE id = '$id'");
    $data = mysqli_fetch_assoc($result);
    $img1 = $data['img1'];

    // hapus img lama
    unlink('img/ekstrakurikuler/' . $img1);

    // gunakan nama file baru yang diterima dari pengguna
    $temp = explode(".", $_FILES["img1"]["name"]);
    $namaimg1Baru = md5(date('dmy h:i:s')) . '.' . end($temp);
    $target_file = "img/ekstrakurikuler/" . $namaimg1Baru;
    move_uploaded_file($_FILES["img1"]["tmp_name"], $target_file);

    $response['body']['data']['img1'] = 'img/ekstrakurikuler/' . $namaimg1Baru;
    mysqli_query($koneksi, "UPDATE ekstrakurikuler SET img1 = '$namaimg1Baru' WHERE id = '$id'");
}

$response['status'] = 200;
$response['msg'] = 'data berhasil diperbarui';
$response['body']['data']['id'] = $id;

mysqli_query($koneksi, "UPDATE ekstrakurikuler SET id = '$id', nama = '$nama', deskripsi = '$deskripsi' WHERE id = '$id'");

}

echo json_encode($response);