<section style="margin-top: 5%;" class="content">
    <div class="container">
    <a class="btn btn-warning" href="<?=site_url();?>pelanggan">Kembali</a><br><br>
    <div class="card">
        <div style="background: #000;height:60px;padding:20px;" class="card-header">
            <h4 style="color: white;"><?php echo $title ?></h4>
        </div>
        <div style="text-align: center;" class="card-body">
        <ul class="list-group list-group-flush">
        <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Kode Pelanggan:</em>          <span><strong><?=$pelanggan->kodepel ?></strong></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Nama:</em>          <span><strong><?=$pelanggan->nama ?></strong></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Alamat:</em>           <span><?=$pelanggan->alamat ?></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Email:</em>           <span><?=$pelanggan->email ?></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Jenis Kelamin:</em>           <span><?=$pelanggan->jk ?></span></li>
            </ul>
  </ul>
        </div>
    </div>
    </div>
</section>