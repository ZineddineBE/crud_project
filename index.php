<?php
    include("db_connection.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://kit.fontawesome.com/2d5224f76b.js" crossorigin="anonymous"></script>
    <title>List Clients | CRUD Project</title>
    <script>
        function confirmDeletion(id, event) {
            event.preventDefault();

            const confirmation = confirm(`Are you sure you want to delete the client n°${id}?`);
            if (confirmation) {
                window.location.href = `delete.php?id_client=${id}`;
            }
        };
    </script>

</head>
<body>
    <h1>CRUD Project - Zineddine BEOUCHE</h1>
    <div class="container my-5">
        <h2>List of Clients</h2>
        <div class="d-flex justify-content-end">
            <a href="create.php" class="btn btn-primary my-3" role="button">
                <i class="fa-solid fa-plus pe-2"></i>New Client
            </a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Firstname</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                //read all rows from database table

                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                //read data of each row
                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[id_client]</td>
                        <td>$row[firstname]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[phone]</td>
                        <td>$row[address]</td>
                        <td>
                            <a class='btn btn-warning btn-sm' href='edit.php?id_client=$row[id_client]'><i class='fa-solid fa-pen pe-2'></i>Edit</a>
                            <a class='btn btn-danger btn-sm' href='#' onclick='confirmDeletion(" . $row['id_client'] . ", event)'><i class='fa-solid fa-xmark pe-2'></i>Delete</a>
                        </td>
                    </tr>";
                }

                ?>
            </tbody>

        </table>

    </div>
    
</body>
</html>