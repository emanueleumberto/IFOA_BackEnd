<?php

    session_start();

    //print_r($_SESSION);
    if(!isset($_SESSION['userLogin'])){
        exit(header('Location: http://localhost/S1L4_SQL/Esercizio/login.php'));
    }

    include_once('function.php');
    include_once('header.php');
    include_once('nav.php');

    require_once 'config.php';
    //var_dump($mysqli);

    $posts = getPostsByUserID($mysqli, $_SESSION['userLogin']['id']);

    //print_r($posts);

    session_write_close();
?>

<div class="container my-3">
    

    <div class="card text-center my-3 p-3">
        <div class="row align-items-start">
            <div class="col-3">
                <img src="<?= $_SESSION['userLogin']['image'] ?>" class="img-thumbnail" alt="...">
            </div>
            <div class="card col">
                <div class="card-header">
                    <h1 class="text-center">Detail Page</h1>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $_SESSION['userLogin']['firstname'] . ' ' . $_SESSION['userLogin']['lastname'] ?></h5>
                    <p class="card-text my-2">City: <?= $_SESSION['userLogin']['city'] ?></p>
                    <p class="card-text my-2">Email: <?= $_SESSION['userLogin']['email'] ?></p>
                    <p class="card-text my-2">Phone: <?= $_SESSION['userLogin']['phone'] ?></p>
                </div>
            </div>
        
        </div>
        
        
    </div>

    <div class="card text-center">
        <div class="card-header">
            <h1 class="text-center">Posts</h1>
        </div>
        <div class="card-body">
            <form method="post" action="controller.php?action=addpost">
                <div class="row g-3">
                    <div class="col-sm">
                        <input type="text" class="form-control" name="title" placeholder="Title...">
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="description" placeholder="Description...">
                    </div>
                    <div class="col-sm">
                        <button type="submit" class="btn btn-dark w-100">Add Post</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card m-3">
            <div class="card">
                <?php foreach ($posts as $post) { ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1">
                                <img src="<?= $post['image'] ?>" class="img-thumbnail" width="50" alt="...">
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <?= $post['firstname'] . ' ' . $post['lastname'] ?>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $post['title']  ?></h5>
                                        <p class="card-text"><?= $post['description']  ?></p>
                                    </div>
                                    <div class="card-footer text-body-secondary">
                                        <?= $post['date_post']  ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    
</div>

<?php include_once('footer.php'); ?>