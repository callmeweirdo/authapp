<?php $this->extend("./layout.php") ?>

<?php $this->section("title") ?>
<title>Login User</title>
<?php $this->endSection() ?>

<?php $this->section("content") ?>
<div class="container">

    <div class="container logindiv ">
        <div class="d-flex p-5 m-5 shadow justify-content-center align-items-center  ">
            <div class="  ">
                <h3 class="p-2 m-2 ">Dashboard</h3>
            </div>

            <?php if (session()->get("isLoggedIn")) : ?>
                <div class="alert alert-success">
                    <?= session()->get("isLoggedIn") ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>
<?php $this->endSection() ?>