<section style="margin-top: 3%;" class="content">
    <div class="container">
    <div class="card">
        <div style="background: #000;height:60px;padding:20px;" class="card-header">
            <h4 style="color: white;"><?php echo $title ?></h4>
        </div>
        <div class="card-body">
        <?=form_open("pelanggan/create/");?>

    <div class="form-group">
        <label class="form-label mt-4">Kode Palanggan</label>
        <input type="text" class="form-control" name="kodepel" placeholder="Kode Pelanggan">
    </div>

    <div class="form-group">
        <label class="form-label mt-4">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Nama">
    </div>

    <div class="form-group">
        <label for="dateTglTerbit" class="form-label mt-4">Alamat</label>
        <textarea name="alamat" class="form-control" placeholder="Alamat" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label class="form-label mt-4">Telephone</label>
        <input type="text" class="form-control" name="telp" placeholder="No Telephone">
    </div>

    <div class="form-group">
      <label class="form-label mt-4" for="">Jenis Kelamin</label>
      <select style="height:50px;" class="form-control" name="jk" >
        <option value="">-- Pilih Jenis Kelamin -- </option>
        <option value="L"> L </option>
        <option value="P"> P </option>
      </select>
    </div>

    <div class="form-group">
        <label class="form-label mt-4">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Submit</button>
  <?=form_close();?>
        </div>
    </div>
    </div>
</section>