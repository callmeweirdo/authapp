<?php $this->extend("./layout.php") ?>

<?php $this->section("title") ?>
<title>Login User</title>
<?php $this->endSection() ?>

<?php $this->section("content") ?>
<div class="container">

    <div class="container logindiv ">
        <div class="d-flex p-5 m-5 shadow justify-content-center align-items-center  ">
            <div class="  ">
                <h3 class="p-2 m-2 ">Login From</h3>
                <?php if (session()->get("success")) : ?>
                    <div class="alert alert-success">
                        <?= session()->get("success") ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>
                <form action="login" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Enter Email</label>
                        <input type="email" name="email" class="form-control">
                        <div class="form-text">we will never shear your details with anyone else</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Enter Email</label>
                        <input type="password" name="password" class="form-control">
                        <!-- <div class="form-text">we will never shear your details with anyone else</div> -->
                    </div>
                    <div class="d-flex justify-content-around">
                        <button class="btn btn-sm btn-success btn-block button ">Login</button>
                        <a href="#">already have an account? sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<?php $this->endSection() ?>