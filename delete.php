<?php
include('connection.php'); // Ensure this file includes the database connection code

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM `vacancy` WHERE id='$id'";
    if (mysqli_query($con, $sql)) {
        header("Location: vacancy.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "ID not provided";
}
?>
