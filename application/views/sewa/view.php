<section style="margin-top: 5%;" class="content">
    <div class="container">
    <a class="btn btn-warning" href="<?=site_url();?>sewa">Kembali</a><br><br>
    <div class="card">
        <div style="background: #000;height:60px;padding:20px;" class="card-header">
            <h4 style="color: white;"><?php echo $title ?></h4>
        </div>
        <div style="text-align: center;" class="card-body">
        <ul class="list-group list-group-flush">
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Kode Pelanggan:</em>          <span><strong><?=$sewa->kodepel?></strong></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Nama:</em>                    <span><strong><?=$sewa->nama?></strong></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Judul Buku:</em>                    <span><strong><?=$sewa->judul?></strong></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>ISBN:</em>                    <span><strong><?=$sewa->isbn?></strong></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Tanggal Sewa:</em>                    <span><strong><?=$sewa->tglsewa?></strong></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Lama Sewa:</em>                    <span><strong><?=$sewa->lamasewa?></strong></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>No Telp:</em>                    <span><strong><?=$sewa->telp?></strong></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Email:</em>                    <span><strong><?=$sewa->email?></strong></span></li>
        </ul>
  </ul>
        </div>
    </div>
    </div>
</section>