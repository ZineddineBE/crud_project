<?php

include("db_connection.php");

$id_client = "";
$firstname = "";
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET method: Show the data of the client

    if (!isset($_GET["id_client"])) {
        header("location: index.php");
        exit;
    }

    $id_client = $_GET["id_client"];

    //read the row of the selected client from the database table
    $sql = "SELECT * FROM clients WHERE id_client=$id_client";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: index.php");
        exit;
    }

    $firstname = $row["firstname"];
    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $address =$row["address"];

}
else {
    //POST method: Update the data of the client
    $id_client = $_POST["id_client"];
    $firstname = $_POST["firstname"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do {
        if (empty($id_client) || empty($firstname) || empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMessage = "All the fields are required !";
            break;
        }

        $sql = "UPDATE clients " .
                "SET firstname = '$firstname', name = '$name', email = '$email', phone = '$phone', address = '$address' " .
                "WHERE id_client = $id_client";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query:" . $connection->error;
            break;
        }

        $successMessage = "Client updated correctly !";

    } while (false);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/2d5224f76b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>Edit Client | CRUD Project</title>
</head>
<body>

    <div class="d-flex align-items-center ps-3">
        <a href="index.php" class="me-2">
            <i class="fa-solid fa-arrow-left fa-2xl" style="color: #000000;"></i>
        </a>
        <h1 class="ps-3">Edit Client</h1>
    </div>

    <?php
    if (!empty($errorMessage)) {
        echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
    }
    ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="offset-3 col-9">
                <form method="post">
                    <input type="hidden" name="id_client" value="<?php echo $id_client; ?>">

                    <div class="row mb-3">
                        <label for="col-3 col-form-label">Firstname</label>
                        <div class="col-12">
                            <input type="text" class="form-control w-75" name="firstname" value="<?php echo $firstname; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="col-3 col-form-label">Name</label>
                        <div class="col-12">
                            <input type="text" class="form-control w-75" name="name" value="<?php echo $name; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="col-3 col-form-label">Email</label>
                        <div class="col-12">
                            <input type="email" class="form-control w-75" name="email" value="<?php echo $email; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="col-3 col-form-label">Phone</label>
                        <div class="col-12">
                            <input type="tel" class="form-control w-75" name="phone" value="<?php echo $phone; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="col-3 col-form-label">Address</label>
                        <div class="col-12">
                            <input type="text" class="form-control w-75" name="address" value="<?php echo $address; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="offset-3 col-3 d-grid">
                            <a class="btn btn-outline-danger" href="index.php" role="button">Cancel</a>
                        </div>
                        <div class="col-3 d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>


                </form>

                <?php if (!empty($successMessage)) { ?>
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><?php echo $successMessage; ?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    
</body>
</html>