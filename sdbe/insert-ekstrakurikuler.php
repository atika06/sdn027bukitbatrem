<?php
include "env.php";

$res = [
  "status" => 200,
  "msg" => "",
  "body" => [
      "data" => []
  ]
      ];

     
      // Mengambil informasi file gambar
      $img1 = $_FILES["img1"]["name"];
      $gambar_tmp = $_FILES["img1"]["tmp_name"];
      $gambar_path = "img/ekstrakurikuler/" . $img1;  // Sesuaikan dengan direktori upload Anda
      // Pindahkan file gambar ke direktori upload
      move_uploaded_file($gambar_tmp, $gambar_path);
      
      $nama = $_POST['nama'];
      $deskripsi = $_POST['deskripsi'];
      $q="INSERT INTO ekstrakurikuler (nama, img1, deskripsi) VALUES ('$nama','$img1', '$deskripsi')";
      
      
      $result=mysqli_query($koneksi,$q);
                                                                            
      if ($result) {
      
        $res['status'] = 200;
        $res['msg'] = "Data berhasil di insert";
        $res['body']['data'] =[
        'nama' => $nama,
        'img1' => $img1,
        'deskripsi' => $deskripsi
        ];
       
      } else {
        $res['status'] = 401;
        $res['msg'] = "Proses insert gagal";
        $res['body']['error'] = "Kesalahan validasi input";
      }
    


echo json_encode($res);
?>
