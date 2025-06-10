<?php 
session_start();

if(!isset($_SESSION['sudah_login'])){
    header('location:signin.php');
}

?>

<?php 

if (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) {
    // Check if 'page' is a valid and expected value (add more conditions if needed)
    $validPages = array('cover', 'profil', 'fasilitas', 'ekstrakurikuler', 'galeri', 'kontak', 'admin', 'edit-cover', 'edit-visimisi',
  'edit-fasilitas', 'edit-ekstrakurikuler', 'edit-galeri', 'edit-kontak', 'edit-admin', 'edit-struktur', 'simpan', 'hapus', 'edit-visi', 'update'); // Add valid pages
    if (!in_array($_REQUEST['page'], $validPages)) {
        // Invalid 'page' value, redirect to cover
        header("location:?page=cover");
        exit();
    }
} else {
    // 'page' parameter not set or empty, redirect to cover
    header("location:?page=cover");
    exit();
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title><?= $_REQUEST['page'] ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="../env.js"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../assets/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background: #5c0a0a;">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">SDN 027</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php">Sign out</a>
    </li>
  </ul>
</nav>

<?php include "../component/menu-admin.php" ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <?php include "modul/".$_REQUEST['page'].".php"; ?>
    </main>
 


        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <script src="script/<?= $_REQUEST['page'] ?>.js"></script>
  </body>
</html>
