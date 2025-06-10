<?php
include 'env.php';

$response = [
    'status' => '',
    'msg' => '',
    'body' => [
        'data' => [
            'coverfile' =>''
        ]
    ]
];

if (!$koneksi) {

    $response['status'] = 400;
    $response['msg'] = "data gagal diperbarui";
} else {
    $id = $_POST['id'];
    // cek apakah user pilih coverfile baru atau tidak
if ($_FILES["coverfile"]["name"] != "") {
    // ambil nama coverfile lama
    $result = mysqli_query($koneksi, "SELECT coverfile FROM cover WHERE id = '$id'");
    $data = mysqli_fetch_assoc($result);
    $coverfile = $data['coverfile'];

    // hapus coverfile lama
    unlink('img/cover/' . $coverfile);

    // gunakan nama file baru yang diterima dari pengguna
    $temp = explode(".", $_FILES["coverfile"]["name"]);
    $namacoverfileBaru = md5(date('dmy h:i:s')) . '.' . end($temp);
    $target_file = "img/cover/" . $namacoverfileBaru;
    move_uploaded_file($_FILES["coverfile"]["tmp_name"], $target_file);

    $response['body']['data']['coverfile'] = 'img/cover/' . $namacoverfileBaru;
    mysqli_query($koneksi, "UPDATE cover SET coverfile = '$namacoverfileBaru' WHERE id = '$id'");
}

$response['status'] = 200;
$response['msg'] = 'data berhasil diperbarui';
$response['body']['data']['id'] = $id;

mysqli_query($koneksi, "UPDATE cover SET id = '$id' WHERE id = '$id'");

}

echo json_encode($response);