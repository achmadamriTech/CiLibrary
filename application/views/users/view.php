<section style="margin-top: 5%;" class="content">
    <div class="container">
    <a class="btn btn-warning" href="<?=site_url();?>users">Kembali</a><br><br>
    <div class="card">
        <div style="background: #000;height:60px;padding:20px;" class="card-header">
            <h4 style="color: white;"><?php echo $title ?></h4>
        </div>
        <div style="text-align: center;" class="card-body">
        <ul class="list-group list-group-flush">
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Nama:</em>          <span><strong><?=$users->name ?></strong></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Email:</em>          <span><strong><?=$users->email ?></strong></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Username:</em>           <span><?=$users->username ?></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Zipcode:</em>           <span><?=$users->zipcode ?></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Register Date:</em>           <span><?=$users->register_DATE ?></span></li>
            </ul>
  </ul>
        </div>
    </div>
    </div>
</section>