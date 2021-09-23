<section style="margin-top: 5%;" class="content">
    <div class="container">
    <div class="card">
        <div style="background: #000;height:60px;padding:20px;" class="card-header">
            <h4 style="color: white;"><?php echo $title ?></h4>
        </div>
        <div class="card-body">

        <?=form_open("sewa/edit/$sewa->id");?>

        <div class="form-group">
            <input type="hidden" name="id" value="<?php $sewa->id ?>">
        </div>

    <div class="form-group">
      <label for="">ISBN</label>
      <select style="height:50px;" class="form-control" name="isbn" id="">
        <option value="">-- Pilih Data Buku --</option>
        <?php foreach($buku as $data){ ?>
            <option <?php if($sewa->isbn == "$data->isbn"){ echo 'selected="selected"'; } ?> value="<?php echo $data->isbn ?>"><?=$data->isbn . " - " . $data->judul . " - " . $data->pengarang;?></option>
		<?php } ?>
      </select>
    </div>

    <div class="form-group">
      <label for="">Pelanggan</label>
      <select style="height:50px;" class="form-control" name="pelangganid" id="">
        <option value="">-- Pilih Data Pelanggan --</option>
        <?php foreach($pelanggan as $data){ ?>
            <option <?php if($sewa->pelangganid == "$data->id"){ echo 'selected="selected"'; } ?> value="<?php echo $data->id ?>"><?=$data->kodepel . " - " . $data->nama;?></option>
		<?php } ?>
      </select>
    </div>

    <div class="form-group">
        <label for="txtTanggalSewa" class="form-label mt-4">Tanggal Sewa</label>
        <input type="date" class="form-control" name="tglsewa" id="txtTglSewa" placeholder="Masukkan Tanggal" value="<?=$sewa->tglsewa;?>">
    </div>

    <div class="form-group">
        <label for="txtLamaSewa" class="form-label">Lama Sewa</label>
        <input type="text" class="form-control" name="lamasewa" id="txtLamaSewa" placeholder="Masukkan Lama Sewa" value="<?=$sewa->lamasewa;?>">
    </div>

    <div class="form-group">
        <label for="dateTglTerbit" class="form-label mt-4">Keterangan</label>
        <textarea name="keterangan" class="form-control" placeholder="Masukkan Keterangan" id="" cols="" rows="3"><?=$sewa->keterangan?></textarea>
    </div>

    <button type="submit" class="btn btn-primary btn-block">Submit</button>
  <?=form_close();?>
        </div>
    </div>
    </div>
</section>