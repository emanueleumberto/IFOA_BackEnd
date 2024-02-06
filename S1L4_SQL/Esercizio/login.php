<?php
include_once('header.php');
include_once('nav.php');
?>

<div class="container my-3">
    <h1 class="text-center">Login Page</h1>
    <form method="post" action="controller.php" enctype="multipart/form-data" class="my-3">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email..." name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password..." name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<?php include_once('footer.php'); ?>