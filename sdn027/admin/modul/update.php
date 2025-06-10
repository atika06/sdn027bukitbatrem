<?php
include "env.php";
$sql=mysqli_query($koneksi,"UPDATE visi set id='$_POST[id]',visi='$_POST[visi]' where id='$_POST[id]'");
header("location: ?page=profil");