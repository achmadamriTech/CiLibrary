<section style="margin-top: 5%;" class="content">
    <div class="container">
    <div class="card">
        <div style="background: #000;height:30px;" class="card-header">

        </div>
        <div style="text-align: left;" class="card-body">
            <h2>Salam <?php echo $nama ?> dari <?php echo $alamat ?> </h2>
            <p>Ini Adalah Halaman Salam</p>
            <p>Daftar Pendidikan</p>
            <ul>
                <?php foreach($daftarPendidikan as $arrValue) :  ?>
                <li><?=$arrValue?></li>
                <?php endforeach?>
            </ul>
        </div>
    </div>
    </div>
</section>