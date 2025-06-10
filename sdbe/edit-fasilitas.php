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
    $desk = $_POST['desk'];
    // cek apakah user pilih img1 baru atau tidak
if ($_FILES["img1"]["name"] != "") {
    // ambil nama img1 lama
    $result = mysqli_query($koneksi, "SELECT img1 FROM fasilitas WHERE id = '$id'");
    $data = mysqli_fetch_assoc($result);
    $img1 = $data['img1'];

    // hapus img lama
    unlink('img/fasilitas/' . $img1);

    // gunakan nama file baru yang diterima dari pengguna
    $temp1 = explode(".", $_FILES["img1"]["name"]);
    $namaimg1Baru = md5(date('dmy h:i:s')) . '.' . end($temp1);
    $target_file = "img/fasilitas/" . $namaimg1Baru;
    move_uploaded_file($_FILES["img1"]["tmp_name"], $target_file);

    $response['body']['data']['img1'] = 'img/fasilitas/' . $namaimg1Baru;
    mysqli_query($koneksi, "UPDATE fasilitas SET img1 = '$namaimg1Baru' WHERE id = '$id'");
}
// cek apakah user pilih img2 baru atau tidak
if ($_FILES["img2"]["name"] != "") {
    // ambil nama img2 lama
    $result = mysqli_query($koneksi, "SELECT img2 FROM fasilitas WHERE id = '$id'");
    $data = mysqli_fetch_assoc($result);
    $img2 = $data['img2'];

    // hapus img2 lama
    unlink('img/fasilitas/' . $img2);

    // gunakan nama file baru yang diterima dari pengguna
    $temp2 = explode(".", $_FILES["img2"]["name"]);
    $namaimg2Baru = md5(date('dmy h:i:s')) . '.' . end($temp2);
    $target_file = "img/fasilitas/" . $namaimg2Baru;
    move_uploaded_file($_FILES["img2"]["tmp_name"], $target_file);

    $response['body']['data']['img2'] = 'img/fasilitas/' . $namaimg2Baru;
    mysqli_query($koneksi, "UPDATE fasilitas SET img2 = '$namaimg2Baru' WHERE id = '$id'");
}

$response['status'] = 200;
$response['msg'] = 'data berhasil diperbarui';
$response['body']['data']['id'] = $id;

mysqli_query($koneksi, "UPDATE fasilitas SET id = '$id', nama = '$nama', desk = '$desk' WHERE id = '$id'");

}

echo json_encode($response);