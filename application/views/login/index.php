<section style="margin-top: 3%;" class="content">
    <div class="container">
    <div class="card">
        <div style="background: #000;height:60px;padding:20px;" class="card-header">
            <h4 style="color: white;"><?php echo $title ?></h4>
        </div>
        <div class="card-body">
        <?=form_open("login/index/");?>
        <div class="form-group" style="width: 75%;margin-left:13%">
        <div class="form-floating mb-3">
            <input type="email" class="form-control" name="emailUsers" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="passwordUsers" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div><br>
        <button type="Submit" class="btn btn-primary btn-block">Login</button>
        </div>
        <?=form_close();?>
        </div>
    </div>
    </div>
</section>