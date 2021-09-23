<section style="margin-top: 5%;" class="content">
    <div class="container">
    <div class="card">
        <div style="background: #000;height:60px;padding:20px;" class="card-header">
            <h4 style="color: white;"><?php echo $title ?></h4>
        </div>
        <div class="card-body">
        <?=form_open("pelanggan/edit/$pelanggan->id");?>

        <?=form_hidden("id", $pelanggan->id);?>

    <div class="form-group">
        <label class="form-label mt-4">Kode pelanggan</label>
        <input type="text" class="form-control" name="kodepel" placeholder="Kode Pelanggan" value="<?=$pelanggan->kodepel; ?>">
    </div>

    <div class="form-group">
        <label class="form-label mt-4">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?=$pelanggan->nama; ?>">
    </div>

    <div class="form-group">
        <label for="dateTglTerbit" class="form-label mt-4">Alamat</label>
        <textarea name="alamat" class="form-control" placeholder="Alamat" rows="3"><?=$pelanggan->alamat ?></textarea>
    </div>

    <div class="form-group">
        <label class="form-label mt-4">Telephone</label>
        <input type="text" class="form-control" name="telp" placeholder="No Telephone" value="<?=$pelanggan->telp; ?>">
    </div>

    <div class="form-group">
      <label class="form-label mt-4" for="">Jenis Kelamin</label>
      <select style="height: 50px;" class="form-control" name="jk" >
        <option value="disabled"></option>
        <option value="L" <?php echo $pelanggan->jk=='L'?'selected':'' ?>> L </option>
        <option value="P" <?php echo $pelanggan->jk=='P'?'selected':'' ?>> P </option>
      </select>
    </div>

    <div class="form-group">
        <label class="form-label mt-4">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email" value="<?=$pelanggan->email; ?>">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Submit</button>
  <?=form_close();?>
        </div>
    </div>
    </div>
</section>