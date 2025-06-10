<?php 

if (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) {
    // Check if 'page' is a valid and expected value (add more conditions if needed)
    $validPages = array('home', 'visi-misi', 'fasilitas', 'ekstrakurikuler', 'galeri', 'kontak', 'sejarah', 'struktur',); // Add valid pages
    if (!in_array($_REQUEST['page'], $validPages)) {
        // Invalid 'page' value, redirect to home
        header("location:?page=home");
        exit();
    }
} else {
    // 'page' parameter not set or empty, redirect to home
    header("location:?page=home");
    exit();
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="img/logo-sd.png" type="image/x-icon">
    <script src="env.js"></script>
    <title><?= $_REQUEST['page'] ?>
  </title>
    <style>
    #cat-galeri .konten1,
#cat-fasilitas .col-box {
    opacity: 0;
    transform: translateY(-20px);
    transition: opacity 0.8s ease-in-out, transform 0.8s ease-in-out;
}

#cat-galeri .konten1.visible,
#cat-fasilitas .col-box.visible {
    opacity: 1;
    transform: translateY(0);
}

/* Tambahkan penundaan untuk animasi elemen-elemen */
#cat-galeri .konten1:nth-child(1),
#cat-fasilitas .col-box:nth-child(1) {
    transition-delay: 0.6s;
}

#cat-galeri .konten1:nth-child(2),
#cat-fasilitas .col-box:nth-child(2) {
    transition-delay: 0.7s;
}

#cat-galeri .konten1:nth-child(3),
#cat-fasilitas .col-box:nth-child(3) {
    transition-delay: 0.8s;
}
    </style>
    <script>
     document.addEventListener('scroll', function() {
    const galleryItems = document.querySelectorAll('#cat-galeri .konten1');
    const facilityItems = document.querySelectorAll('#cat-fasilitas .col-box');
    const windowHeight = window.innerHeight;

    galleryItems.forEach(item => {
        const itemTop = item.getBoundingClientRect().top;
        if (itemTop < windowHeight) {
            item.classList.add('visible');
        } else {
            item.classList.remove('visible');
        }
    });

    facilityItems.forEach(item => {
        const itemTop = item.getBoundingClientRect().top;
        if (itemTop < windowHeight) {
            item.classList.add('visible');
        } else {
            item.classList.remove('visible');
        }
    });
});
    </script>
  </head>
  <body>
    <?php 
    include "component/menu.php";
    include "modul/".$_REQUEST['page'].".php";
    ?>
<div class="navbar" style="background: #5c0a0a; margin-top: 20px;">
          <div class="row" style="color: white;" id="kontak">
          <!-- API -->
          </div>
        <footer style="color: white; margin-top: 50px; margin-right: 480px;">
           © 2024 SDN 027 BUKIT BATREM 
        </footer>
      </div>
      
    
    
   
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="script/<?= $_REQUEST['page'] ?>.js"></script>
    <script src="kt.js"></script>
  </body>
</html>