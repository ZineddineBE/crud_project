<?php

include("db_connection.php");

if (isset($_GET["id_client"])) {
   $id_client = $_GET["id_client"];

   $sql = "DELETE FROM clients WHERE id_client = $id_client";
   $connection->query($sql);
}

header("location: index.php");
exit;

?>