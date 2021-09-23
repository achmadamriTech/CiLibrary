<section style="margin-top: 5%;" class="content">
    <div class="container">
    <div class="card">
        <div style="background: #000;height:60px;padding:20px;" class="card-header">
            <h4 style="color: white;"><?php echo $title ?></h4>
        </div>
        <div class="card-body">
        <?=form_open("role/edit/$role->id");?>

        <?=form_hidden("id", $role->id);?>

    <div class="form-group">
        <label class="form-label mt-4">Role</label>
        <input type="text" class="form-control" name="role" placeholder="Role" value="<?=$role->role; ?>">
    </div>

    <div class="form-group">
        <label class="form-label mt-4">Keterangan</label>
        <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="<?=$role->keterangan; ?>">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Submit</button>
  <?=form_close();?>
        </div>
    </div>
    </div>
</section>