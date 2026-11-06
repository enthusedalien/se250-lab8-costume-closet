<?php
    $conn = mysqli_connect("localhost", "root", "", "costume_closet");
    $id = (int) $_GET["id"];
    $sql = "UPDATE loans SET returned = '1' WHERE id = '$id'";
    mysqli_query($conn, $sql);
    header("Location: list.php");
?>