<?php
include "env.php";
$sql=mysqli_query($koneksi,"DELETE FROM visi where id='$_GET[id]'");
header("location: ?page=profil");