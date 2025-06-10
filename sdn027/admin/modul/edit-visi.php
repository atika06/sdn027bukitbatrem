<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Visi</h1>
        
      </div>

    <!-- Visi Misi -->
      <h2>Visi</h2>
      <?php
        include "env.php";
        $qry = mysqli_query($koneksi, "SELECT * FROM visi where id='$_GET[id]'");
        $data= mysqli_fetch_array($qry);
        ?>
      <form action="?page=update" id="edit-visimisi" method="post">
      <div class="form-group">
          <label for="exampleFormControlTextarea1">ID</label>
          <input class="form-control" id="id" rows="3" name="id" value="<?php echo $data['id']?>" readonly></input>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Visi</label>
          <input type="text" class="form-control" id="id" rows="3" name="visi" value="<?php echo $data['visi']?>"></input>
        </div>
        <div class="form-group float-right">
        <button type="submit" class="btn btn-secondary">Edit</button>
        </div>

      </form>
     