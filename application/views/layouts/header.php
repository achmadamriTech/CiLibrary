<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../../assets/style.css" rel=”stylesheet”>
    <!-- DataTables -->
    <!-- Bootswatch     -->
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
    <style>
      #footer{
        background:#000;
        height:60px;
        width: 100%;
        position:relative;
        bottom:0;
        margin-top: 70px;
      }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="<?=site_url();?>">
      <img style="width:50px;height:auto;" src="https://cdn.worldvectorlogo.com/logos/codeigniter.svg" alt="" srcset="">  
    Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="<?php if($this->uri->segment(1)==""){echo "active";}?> nav-link" href="<?=site_url();?>">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>

        <?php if($this->session->userdata('username')) : ?>
          <li class="nav-item">
          <a class="<?php if($this->uri->segment(1)=="buku"){echo "active";}?> nav-link" href="<?=site_url();?>buku">Buku</a>
        </li>
        <li class="nav-item">
          <a class="<?php if($this->uri->segment(1)=="pelanggan"){echo "active";}?> nav-link" href="<?=site_url();?>pelanggan"">Pelanggan</a>
        </li>
        <li class="nav-item">
          <a class="<?php if($this->uri->segment(1)=="sewa"){echo "active";}?> nav-link" href="<?=site_url();?>sewa">Sewa</a>
        </li>
        <?php if ($this->session->userdata('role')=='Write' || $this->session->userdata('role')=='Admin' ) :?>
          <li class="nav-item dropdown">
          <a class="<?php if($this->uri->segment(1)=="users"){echo "active";}?> nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Users</a>
          <div class="dropdown-menu">
          <a class="dropdown-item" href="<?=site_url();?>users">Users</a>
            <a class="dropdown-item" href="<?=site_url();?>role">Role</a>
            <a class="dropdown-item" href="<?=site_url();?>userRole">User Role</a>
          </div>
        </li>
        <?php endif;?>
        <?php endif ?>
      </ul>
      <div class="d-flex align-items-center">
            <?php if($this->session->userdata('username')) : ?>
                <div class="text-white"><?=$this->session->userdata('email')?></div>&nbsp;
                <a class="btn btn-danger" href="<?=site_url()?>login/logout">Logout</a>
              <?php else : ?>
                <a class="btn btn-success" href="<?=site_url()?>login">Login</a>
              <?php endif ?>
        </div>
    </div>
  </div>
</nav>
<!-- End Navbar -->

<div class="container" style="margin-top: 30px;">
      <div id="flash_message">
        <?php if($this->session->flashdata('success')) : ?>
          <div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong><?=$this->session->flashdata('success')?></strong>
            </div>
        <?php endif?>
        <?php if($this->session->flashdata('error')) : ?>
          <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong><?=$this->session->flashdata('error')?></strong>
            </div>
        <?php endif?>
        <?php if($this->session->flashdata('warning')) : ?>
          <div class="alert alert-dismissible alert-warning">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong><?=$this->session->flashdata('warning')?></strong>
            </div>
        <?php endif?>
        <?php if($this->session->flashdata('info')) : ?>
          <div class="alert alert-dismissible alert-info">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong><?=$this->session->flashdata('info')?></strong>
            </div>
        <?php endif?>
      </div>
</div>
    
    <div class="container" style="margin-top: 30px;">
      <?php if(!empty(validation_errors())) : ?>
        <div class="alert alert-dismissible alert-warning">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <h4 class="alert-heading">Warning!</h4>
      <p class="mb-0"><?=validation_errors();?></p>
      </div>
      <?php endif?>
    </div>