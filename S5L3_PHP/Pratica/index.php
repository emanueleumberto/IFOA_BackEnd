<?php
  session_start();
  if(!isset($_SESSION['userLogin']) && isset($_COOKIE["useremail"]) && isset($_COOKIE["userpassword"])) {
    header('Location: http://localhost/S5L2_PHP/Pratica/controller.php?email='.$_COOKIE["useremail"].'&password='.$_COOKIE["userpassword"]);
  } else if(!isset($_SESSION['userLogin'])) {
    header('Location: http://localhost/S5L2_PHP/Pratica/login.php');
  } 

  if(!isset($_SESSION['content'])){
    header('Location: http://localhost/S5L2_PHP/Pratica/language.php?lang=it');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">App PHP</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.html">Home</a>
              </li>
            </ul>
            <span class="navbar-text d-flex">
                <span class="me-3 d-flex">
                  <a class="nav-link active" aria-current="page" href="language.php?lang=it">
                    <img src="img/it.png" style="width:16px" class="mx-1" />
                  </a>
                  <a class="nav-link active" aria-current="page" href="language.php?lang=us">
                    <img src="img/us.png" style="width:16px" class="mx-1" />
                  </a>
                </span>
                <span>
                  <!-- <a class="nav-link active" aria-current="page" href="login.html">Login</a> -->
                  <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                </span>
            </span>
          </div>
        </div>
    </nav>
    <div class="container">
        <!-- <h1 class="text-center">Home Page</h1> -->
        <h1 class="text-center"><?= $_SESSION['content']['title']  ?></h1>
        <div class="card p-3">
          <img src="<?= $_SESSION['content']['img']  ?>" />
          <div class="my-3"><?= $_SESSION['content']['content']  ?></div>
        </div>
        <figure class="text-end">
          <blockquote class="blockquote">
            <p><?= $_SESSION['content']['author']  ?></p>
          </blockquote>
          <figcaption class="blockquote-footer">
            Someone famous in <cite title="Source Title">Source Title</cite>
          </figcaption>
      </figure>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>