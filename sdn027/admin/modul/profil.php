<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profil SD</h1>
        
      </div>

    <!-- Visi Misi -->
    <h2>Visi</h2>
<div style="display: flex; justify-content: space-between;">
  <form action="?page=simpan" id="" style="width: 45%;" method="post">
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Visi</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="visi"></textarea>
    </div>
    <div class="form-group float-right">
      <button type="submit" class="btn btn-secondary">Submit</button>
    </div>
  </form>
  
  <div class="table-responsive" style="width: 45%;">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th style="width: 50px;">No</th>
          <th style="width: 450px;">Visi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $no = 1;
      $koneksi = mysqli_connect("localhost","root","","sdn027");
      $qry = mysqli_query($koneksi, "SELECT * FROM visi");
      foreach ($qry as $data)
      { ?>
        <tr>
          <td><?php echo $no++?></td>
          <td><?php echo $data['visi'] ?></td>
          <td>
            <a href="?page=edit-visi&&id=<?php echo $data['id']?>"><i class="bi bi-pencil-fill"></i></a>
            <a href="#" onclick="confirmDelete('<?php echo $data['id']; ?>')"><i class="bi bi-trash-fill" style="color: red;"></i></a>
          </td>
        </tr>
      <?php }?>
      </tbody>
    </table>
  </div>
</div>

      <h2>Visi Misi</h2>
      <form action="" id="form-visimisi">
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Visi</label>
          <?php
            include 'env.php';
            $qry = mysqli_query($koneksi, "SELECT * from visi");
            $data= mysqli_fetch_array($qry);
            ?>
          <select name="visi" id="">
            <option value="<?php echo $data['id'];?>"><?php echo $data['visi'];?></option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Misi</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="misi"></textarea>
        </div>
        <div class="form-group float-right">
        <button type="submit" class="btn btn-secondary">Submit</button>
        </div>

      </form>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th style="width: 50px;">No</th>
              <th style="width: 450px;">Visi</th>
              <th style="width: 450px;">Misi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="table-visimisi">
          <!-- API -->
          </tbody>
        </table>
      </div>

      <!-- Struktur Organisasi -->
      <h2>Struktur Organisasi</h2>
      <form action="" id="form-struktur">
        <div class="form-group">
          <label for="exampleFormControlFile1">File</label>
          <input type="file" class="form-control-file" name="strukfile" id="exampleFormControlFile1">
        </div>
        <div class="form-group float-right">
        <button type="submit" class="btn btn-secondary">Submit</button>
        </div>
      </form>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th style="width: 50px;">No</th>
              <th>File</th>
            </tr>
          </thead>
          <tbody id="table-struktur">
          <!-- API -->
          </tbody>
        </table>
      </div>



      <script>
function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        window.location.href = '?page=hapus&&id=' + id;
    }
}
</script>