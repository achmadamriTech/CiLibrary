<section style="margin-top: 5%;" class="content">
    <div class="container">
    <div class="card">
        <div style="background: #000;height:60px;padding:20px;" class="card-header">
            <h4 style="color: white;"><?php echo $title ?></h4>
        </div>
        <div class="card-body">

        <?=form_open("userRole/edit/$userRole->id");?>

        <div class="form-group">
            <input type="hidden" name="id" value="<?php $userRole->id ?>">
        </div>

    <div class="form-group">
      <label for="">User ID</label>
      <select style="height:50px;" class="form-control" name="userid" id="">
        <option value="">-- Pilih Data User --</option>
        <?php foreach($users as $data){ ?>
            <option <?php if($userRole->userid == "$data->id"){ echo 'selected="selected"'; } ?> value="<?php echo $data->id ?>"><?=$data->name;?></option>
		<?php } ?>
      </select>
    </div>

    <div class="form-group">
      <label for="">Role ID</label>
      <select style="height:50px;" class="form-control" name="roleid" id="">
        <option value="">-- Pilih Data Role --</option>
        <?php foreach($role as $data){ ?>
            <option <?php if($userRole->roleid == "$data->id"){ echo 'selected="selected"'; } ?> value="<?php echo $data->id ?>"><?=$data->role;?></option>
		<?php } ?>
      </select>
    </div>

    <div class="form-group">
      <label for="">Aktif</label>
      <select style="height:50px;" class="form-control" name="aktif" id="">
        <option value="">-- Pilih Data Aktif --</option>
        <option <?php if($userRole->aktif == "0"){ echo 'selected="selected"'; } ?> value="0">Tidak Aktif</option>
        <option <?php if($userRole->aktif == "1"){ echo 'selected="selected"'; } ?>value="1">Aktif</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary btn-block">Submit</button>
  <?=form_close();?>
        </div>
    </div>
    </div>
</section>