<?php
include "env.php";

$res = [
  "status" => 200,
  "msg" => "",
  "body" => [
      "data" => []
  ]
      ];

     
      // Mengambil informasi file img1
      $img1 = $_FILES["img1"]["name"];
      $gambar_tmp = $_FILES["img1"]["tmp_name"];
      $gambar_path = "img/galeri/" . $img1;
      move_uploaded_file($gambar_tmp, $gambar_path);
      // Mengambil informasi file img2
      $img2 = $_FILES["img2"]["name"];
      $gambar2_tmp = $_FILES["img2"]["tmp_name"];
      $gambar2_path = "img/galeri/" . $img2;
      move_uploaded_file($gambar2_tmp, $gambar2_path);
      
      $nama = $_POST['nama'];
      $desk = $_POST['desk'];
      $q="INSERT INTO galeri (nama, img1, img2, desk) VALUES ('$nama','$img1', '$img2', '$desk')";
      
      
      $result=mysqli_query($koneksi,$q);
                                                                            
      if ($result) {
      
        $res['status'] = 200;
        $res['msg'] = "Data berhasil di insert";
        $res['body']['data'] =[
        'nama' => $nama,
        'img1' => $img1,
        'img2' => $img2,
        'desk' => $desk
        ];
       
      } else {
        $res['status'] = 401;
        $res['msg'] = "Proses insert gagal";
        $res['body']['error'] = "Kesalahan validasi input";
      }
    


echo json_encode($res);
?>
