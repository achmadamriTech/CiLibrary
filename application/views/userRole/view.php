<section style="margin-top: 5%;" class="content">
    <div class="container">
    <a class="btn btn-warning" href="<?=site_url();?>userRole">Kembali</a><br><br>
    <div class="card">
        <div style="background: #000;height:60px;padding:20px;" class="card-header">
            <h4 style="color: white;"><?php echo $title ?></h4>
        </div>
        <div style="text-align: center;" class="card-body">
        <ul class="list-group list-group-flush">
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Nama:</em>          <span><strong><?=$userRole->name ?></strong></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Email:</em>          <span><strong><?=$userRole->email ?></strong></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Username:</em>           <span><?=$userRole->username ?></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Role:</em>     <span><?=$userRole->role ?></span></li>
                <li style="border-bottom: 2px solid black;" class="list-group-item d-flex justify-content-between"><em>Zipcode:</em>               <span><?=$userRole->zipcode ?></span></li>
            </ul>
  </ul>
        </div>
    </div>
    </div>
</section>