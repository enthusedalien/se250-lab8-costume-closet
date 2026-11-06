<?php 
    $conn = mysqli_connect("localhost", "root", "", "costume_closet");
    $id = (int) $_GET["id"];
    $sql = "DELETE FROM loans WHERE id = '$id'";
    mysqli_query($conn, $sql);
    header("Location: list.php");
?>