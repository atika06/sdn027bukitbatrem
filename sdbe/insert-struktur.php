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
      $strukfile = $_FILES["strukfile"]["name"];
      $gambar_tmp = $_FILES["strukfile"]["tmp_name"];
      $gambar_path = "img/struktur/" . $strukfile;  // Sesuaikan dengan direktori upload Anda
      // Pindahkan file gambar ke direktori upload
      move_uploaded_file($gambar_tmp, $gambar_path);
      

      $q="INSERT INTO struktur (strukfile) VALUES ('$strukfile')";
      
      
      $result=mysqli_query($koneksi,$q);
                                                                            
      if ($result) {
      
        $res['status'] = 200;
        $res['msg'] = "Data berhasil di insert";
        $res['body']['data'] =[
        'strukfile' => $strukfile
        ];
       
      } else {
        $res['status'] = 401;
        $res['msg'] = "Proses insert gagal";
        $res['body']['error'] = "Kesalahan validasi input";
      }
    


echo json_encode($res);
?>
