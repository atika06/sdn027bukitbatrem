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
      $coverfile = $_FILES["coverfile"]["name"];
      $gambar_tmp = $_FILES["coverfile"]["tmp_name"];
      $gambar_path = "img/cover/" . $coverfile;  // Sesuaikan dengan direktori upload Anda
      // Pindahkan file gambar ke direktori upload
      move_uploaded_file($gambar_tmp, $gambar_path);
      

      $q="INSERT INTO cover (coverfile) VALUES ('$coverfile')";
      
      
      $result=mysqli_query($koneksi,$q);
                                                                            
      if ($result) {
      
        $res['status'] = 200;
        $res['msg'] = "Data berhasil di insert";
        $res['body']['data'] =[
        'coverfile' => $coverfile
        ];
       
      } else {
        $res['status'] = 401;
        $res['msg'] = "Proses insert gagal";
        $res['body']['error'] = "Kesalahan validasi input";
      }
    


echo json_encode($res);
?>
