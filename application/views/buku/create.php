<section style="margin-top: 3%;" class="content">
    <div class="container">
    <div class="card">
        <div style="background: #000;height:60px;padding:20px;" class="card-header">
            <h4 style="color: white;"><?php echo $title ?></h4>
        </div>
        <div class="card-body">
        <?=form_open("buku/create/");?>

    <div class="form-group">
        <label for="txtIsbn" class="form-label mt-4">ISBN</label>
        <input type="text" class="form-control" name="isbn" id="txtIsbn" aria-describedby="isbnHelp" placeholder="Penerbit">
    </div>

    <div class="form-group">
        <label for="txtPengarang" class="form-label mt-4">Pengarang</label>
        <input type="text" class="form-control" name="pengarang" id="txtPengarang" aria-describedby="pengarangHelp" placeholder="Nama Pengarang">
    </div>

    <div class="form-group">
        <label for="txtJudul" class="form-label">Judul</label>
        <input type="text" class="form-control" name="judul" id="txtJudul" aria-describedby="judulHelp" placeholder="Judul">
    </div>

    <div class="form-group">
        <label for="dateTglTerbit" class="form-label mt-4">Tanggal Terbit</label>
        <input type="date" class="form-control" name="tglTerbit" id="dateTglTerbit" aria-describedby="tglTerbitHelp" placeholder="Tanggal Terbit">
    </div>

    <div class="form-group">
        <label for="txtPenerbit" class="form-label mt-4">Penerbit</label>
        <input type="text" class="form-control" name="penerbit" id="txtPenerbit" aria-describedby="penerbitHelp" placeholder="Penerbit">
    </div>

    <div class="form-group">
        <label for="txtPenerbit" class="form-label mt-4">User ID</label>
        <input type="text" class="form-control" name="userid" id="txtPenerbit" aria-describedby="penerbitHelp" placeholder="Penerbit">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Submit</button>
  <?=form_close();?>
        </div>
    </div>
    </div>
</section>