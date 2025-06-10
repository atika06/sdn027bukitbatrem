  <!-- content -->
  <div class="container mt-4 cont-bio">
      <div class="row justify-content-around">
        <div class="col-lg-12 d-flex justify-content-center sdn" id="sdn">
          <!-- <img src="img/upacara/sd.jpg" alt="" width="100%" height="280px"> -->
          </div>
      </div>
    </div>

<!-- Visi Misi -->
<div class="container mt-4 cont-cate">
      <div class="row">
          <div class="col subkat" style="text-align: center;">
            <h4><strong>Sekolah Dasar Negeri 027 Bukit Batrem</strong></h4>
          </div>
      </div>
      
     
        <div class="row" style="margin-top: 50px;">
          <div class="col visimisi">
            <i class="bi bi-flag-fill bi-visimisi"></i>
            
            <p>
              <b>VISI SEKOLAH:</b><br>
              <?php 
            include "admin/env.php";
             $query = mysqli_query($koneksi, "SELECT * FROM visi");
             while ($data=mysqli_fetch_array($query)) { ?>
              <?php echo $data["visi"]; ?>
            </p>
            <?php } ?>
          </div>
        </div>
        <div class="row">
          <div class="col visimisi">
            <i class="bi bi-book-half bi-visimisi"></i>
            <p>
              <b>MISI SEKOLAH :</b><br>
              
              <?php 
            include "admin/env.php";
            $no = 1;
             $query = mysqli_query($koneksi, "SELECT * FROM visimisi");
             while ($data=mysqli_fetch_array($query)) { ?>
             <?php echo $no++.". ";?>
             <?php echo $data["misi"]; ?><br>
              <?php } ?>
              </p>
          </div>
        </div>
        
    </div>