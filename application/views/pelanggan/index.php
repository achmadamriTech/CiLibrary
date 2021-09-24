<section style="margin-top: 5%;" class="content">
    <div class="container">
    <div class="card">
        <div style="background: #000;height:60px;padding:20px;" class="card-header">
            <h4 style="color: white;"><?php echo $title; ?></h4>
        </div>
        <div class="card-body">
        <?php if ($this->session->userdata('role')=='Write' || $this->session->userdata('role')=='Admin' ) :?>
            <a href="<?=site_url('pelanggan/create/');?>" class="btn btn-info">Add Pelanggan</a><br><br>
        <?php endif;?>
            <table id="example" class="table table-bordered table-hover" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pelanggan</th>
                <th>Nama</th>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
        <?php 
		$no = 1;
		foreach($pelanggan as $data){ 
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $data->kodepel?></td>
            <td><?php echo $data->nama?></td>
            <td>
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <!-- <button type="button" class="btn btn-secondary">Action</button> -->
            <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="<?=site_url('pelanggan/view/'.$data->id);?>">Detail</a>
                    <?php if ($this->session->userdata('role')=='Write' || $this->session->userdata('role')=='Admin' ) :?>
                    <a class="dropdown-item" href="<?=site_url('pelanggan/edit/'.$data->id);?>">Edit</a>
                    <a class="dropdown-item" href="<?=site_url('pelanggan/delete/'.$data->id);?>">Delete</a>
                    <?php endif;?>
              </div>
           </div>
        </div>
            </td>
		</tr>
		<?php } ?>
        </tbody>
    </table>
        </div>
    </div>
    </div>
</section>