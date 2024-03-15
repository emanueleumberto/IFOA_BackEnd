<?php

    //print_r($projects);

   /*  foreach ($projects as $key => $value) {
        echo $value->name . "<br />";
        echo $value->type . "<br />";
        echo $value->state . "<br />";
    }
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Projects Page</h1>
    <div>
        @if(count($projects) > 0)
            <ul>
                @foreach ($projects as $project)
                    <li>{{$project->name}} <span> <a href="projects/{{$project->id}}">o</a></span></li>
                @endforeach
            </ul>
        @else
            <p>I don't have any records!</p>
        @endif
    </div>
</body>
</html>
