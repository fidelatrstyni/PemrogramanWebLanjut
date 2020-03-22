<?= 
form_open('login/proses_login');
?>
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mx-auto">

                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0">Login</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="formlogin" novalidate="" method="POST">
                                <div class="form-group">
                                    <label for="uname1">Username</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="uname1" 
                                    id="uname1" required="">
                                    <div class="invalid-feedback">Oops, you missed this one.</div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" name="pwd1" 
                                    id="pwd1" required="" autocomplete="new-password">
                                    <div class="invalid-feedback">Enter Your Password too!</div>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg float-right" id="btnlogin">Login</button>
                            </form>

                        </div>
                        <div class="alert alert-info" role="alert">
                                <?php
                                    if(isset($pesan)){
                                        echo $pesan;
                                    }else{
                                        echo "Masukkan username dan password anda";
                                    }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>

<?= 
form_close();
?>
