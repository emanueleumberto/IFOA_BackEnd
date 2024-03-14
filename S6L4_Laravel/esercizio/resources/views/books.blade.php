<?php
    print_r($books);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Books Page</h1>

    <button id="del">delete</button>
    <form method="post" action="{{ route('books', $book->book_id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">X</button>
                    </form>


    <script>
        document.querySelector('#del').addEventListener('click', ()=>{
            fetch('http://127.0.0.1:8000/books/2', { method: 'DELETE'})
                .then(response => response.json())
                .then(json => console.log(json))
                .catch(error => console.log(error))
        });
    </script>
</body>
</html>
