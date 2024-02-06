<?php 
    include_once('header.php'); 
    include_once('nav.php'); 

    require_once 'config.php';
    //var_dump($mysqli);

    if(isset($_GET['id']) ) {
        //echo 'voglio modificare id ' . $_GET['id'];
        $user = getUserByID($mysqli);
        //print_r($user);
    }

    function getUserByID($mysqli) {     
        $sql = "SELECT * FROM users WHERE id = " . $_GET['id']; 
        $res = $mysqli->query($sql); // return un mysqli result
        if($res) { // Controllo se ci sono dei dati nella variabile $res 
            $result = $res->fetch_assoc(); // estraggo ogni singola riga che leggo dal DB e la inserisco in un array  
        }
        return $result;
        //var_dump($user);
    } 

?>

    <div class="container my-3">
        <h1 class="text-center">Register Page</h1>
        <form method="post" action="controller.php?action=update&id=<?=$_GET['id']?>" enctype="multipart/form-data" class="my-3">
            <div class="mb-3">
                <label for="firstname" class="form-label">Firstname</label>
                <input type="text" value="<?= $user['firstname'] ?>" class="form-control" id="firstname" placeholder="Firstname..." name="firstname">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Lastname</label>
                <input type="text" value="<?= $user['lastname'] ?>" class="form-control" id="lastname" placeholder="Lastname..." name="lastname">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" value="<?= $user['city'] ?>" class="form-control" id="city" placeholder="City..." name="city">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" value="<?= $user['phone'] ?>" class="form-control" id="phone" placeholder="Phone..." name="phone">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="<?= $user['email'] ?>" class="form-control" id="email" placeholder="Email..." name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" value="<?= $user['password'] ?>" class="form-control" id="password" placeholder="Password..." name="password">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" value="<?= $user['image'] ?>" class="form-control" id="image" placeholder="Image..." name="image">
            </div>
            <button type="submit" class="btn btn-dark">Update</button>
        </form>
    </div>
<?php include_once('footer.php'); ?>