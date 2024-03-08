<?php
    // echo $title . '<br />';
    // print_r($users);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="php">
            <h1><?= $title ?></h1>
            <div class="card my-3">
                <ul class="list-group list-group-flush">
                    <?php
                        if(!empty($users)){
                            foreach ($users as $key => $value) { ?>
                                <li class="list-group-item">
                                    <?= $value['fullname'] ?>
                                    <span class="float-end">
                                        <a type="button" class="btn btn-outline-info" href="/app/users">Info</a>
                                    </span>
                                </li>
                    <?php }} ?>
                </ul>
            </div>
        </div>
        <div class="blade">
            <h1>{{ $title }}</h1>
            <div class="card my-3">
                <ul class="list-group list-group-flush">
                    @if($users)
                        @foreach($users as $key => $value)
                            <li class="list-group-item">
                                {{$value['fullname']}}
                                <span class="float-end">
                                    <a type="button" class="btn btn-outline-info" href="/app/users">Info</a>
                                </span>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
