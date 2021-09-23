<section style="margin-top: 3%;" class="content">
    <div class="container">
    <div class="card">
        <div style="background: #000;height:60px;padding:20px;" class="card-header">
            <h4 style="color: white;"><?php echo $title ?></h4>
        </div>
        <div class="card-body">
        <?=form_open("users/create/");?>

    <div class="form-group">
        <label class="form-label mt-4">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name">
    </div>

    <div class="form-group">
        <label class="form-label mt-4">Zipcode</label>
        <input type="text" class="form-control" name="zipcode" placeholder="Zipcode">
    </div>

    <div class="form-group">
        <label class="form-label mt-4">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email">
    </div>

    <div class="form-group">
        <label class="form-label mt-4">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username">
    </div>

    <div class="form-group">
        <label class="form-label mt-4">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Submit</button>
  <?=form_close();?>
        </div>
    </div>
    </div>
</section>