<?php
include "env.php";
$sql=mysqli_query($koneksi,"INSERT INTO visi(visi) VALUES ('$_POST[visi]')");
header("location: ?page=profil");