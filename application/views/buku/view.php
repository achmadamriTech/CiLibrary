<section style="margin-top: 5%;" class="content">
    <div class="container">
    <a class="btn btn-warning" href="<?=site_url();?>buku">Kembali</a><br><br>
    <div class="card">
        <div style="background: #000;height:60px;padding:20px;" class="card-header">
            <h4 style="color: white;"><?php echo $title ?></h4>
        </div>
        <div style="text-align: center;" class="card-body">
        <ul class="list-group list-group-flush">
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Judul:</em>          <span><strong><?=$buku->judul ?></strong></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Pengarang:</em>          <span><strong><?=$buku->pengarang ?></strong></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Penerbit:</em>           <span><?=$buku->penerbit ?></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Tanggal Terbit:</em>     <span><?=$buku->tglterbit ?></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>ISBN:</em>               <span><?=$buku->isbn ?></span></li>
            </ul>
  </ul>
        </div>
    </div>
    </div>
</section>