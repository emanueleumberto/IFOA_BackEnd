<?php
    /* session_start();

    //print_r($_SESSION);
    $contacts = [];
    if(isset($_SESSION['contacts'])){
        $contacts = $_SESSION['contacts'];
    }
    
    session_write_close(); */

    require_once 'config.php';
    //var_dump($mysqli);
    
    include_once('function.php'); 
    include_once('header.php'); 
    include_once('nav.php'); 

    $contacts = getAllUser($mysqli);

?>

    <div class="container my-3">
        <h1 class="text-center">Rubrica App</h1>
        <div class="my-3">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">City</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if($contacts){
                    foreach ($contacts as $key => $contact) { 
                    ?>
                        <tr>
                            <th scope="row"><?= $key+1 ?></th>
                            <td><img src=<?= $contact['image'] ?> width="50" ></td>
                            <td><?= $contact['firstname'] ?></td>
                            <td><?= $contact['lastname'] ?></td>
                            <td><?= $contact['city'] ?></td>
                            <td><?= $contact['phone'] ?></td>
                            <td><?= $contact['email'] ?></td>
                            <td>
                                <a class="btn btn-danger" href="controller.php?action=delete&id=<?= $contact['id'] ?>" role="button">X</a>
                                <a class="btn btn-warning" href="update.php?id=<?= $contact['id'] ?>" role="button">M</a>
                            </td>
                        </tr>
                    <?php } }?>
                </tbody>
            </table>
        </div>
    </div>
    
<?php include_once('footer.php'); ?>