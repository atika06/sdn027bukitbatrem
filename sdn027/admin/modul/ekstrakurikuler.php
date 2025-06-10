<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Esktrakurikuler</h1>
        
      </div>

    <!-- form -->
      <form action="" id="form-ekstrakurikuler">
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Nama</label>
          <input class="form-control" id="exampleFormControlTextarea1" name="nama" rows="3"></input>
        </div>
        <div class="form-group">
          <label for="exampleFormControlFile1">Photo</label>
          <input type="file" class="form-control-file" name="img1" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Deskripsi</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"></textarea>
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
              <th>Nama</th>
              <th>Gambar</th>
              <th style="width: 700px;">Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="table-ekstrakurikuler">
           
          </tbody>
        </table>
      </div>
     