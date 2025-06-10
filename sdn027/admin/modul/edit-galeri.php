<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Galeri</h1>
        
      </div>

    <!-- form -->
      <form action="" id="edit-galeri">
      <div class="form-group">
          <label for="exampleFormControlTextarea1">ID</label>
          <input class="form-control" id="id" name="id" readonly rows="3"></input>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Nama</label>
          <input class="form-control" id="nama" name="nama" rows="3"></input>
        </div>
        <div class="form-group">
          <label for="exampleFormControlFile1">Photo 1</label>
          <input type="file" class="form-control-file" name="img1" id="img1">
        </div>
        <div class="form-group">
          <label for="exampleFormControlFile1">Photo 2</label>
          <input type="file" class="form-control-file" name="img2" id="img2">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Deskripsi Singkat</label>
          <textarea class="form-control" id="desk" rows="3" name="desk"></textarea>
        </div>
        <div class="form-group float-right">
        <button type="submit" class="btn btn-secondary">Edit</button>
        </div> 
      </form>