<section style="margin-top: 5%;" class="content">
    <div class="container">
    <div class="card">
        <div style="background: #000;height:60px;padding:20px;" class="card-header">
            <h4 style="color: white;"><?php echo $title ?></h4>
        </div>
        <div class="card-body">
        <?=form_open("users/edit/$users->id");?>

        <?=form_hidden("id", $users->id);?>

    <div class="form-group">
        <label class="form-label mt-4">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name" value="<?=$users->name; ?>">
    </div>

    <div class="form-group">
        <label class="form-label mt-4">Zipcode</label>
        <input type="text" class="form-control" name="zipcode" placeholder="Zipcode" value="<?=$users->zipcode; ?>">
    </div>

    <div class="form-group">
        <label class="form-label mt-4">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email" value="<?=$users->email; ?>">
    </div>

    <div class="form-group">
        <label class="form-label mt-4">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username" value="<?=$users->username; ?>">
    </div>

    <div class="form-group">
        <label class="form-label mt-4">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" value="<?=$users->password; ?>">
    </div>
    
    <button type="submit" class="btn btn-primary btn-block">Submit</button>
  <?=form_close();?>
        </div>
    </div>
    </div>
</section>