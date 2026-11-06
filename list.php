<?php 
    $conn = mysqli_connect("localhost", "root", "", "costume_closet");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }

    $sql = "SELECT id, item, borrower, due_date, returned FROM loans
    ORDER BY returned, due_date";

    $result = mysqli_query($conn, $sql);
?>

<table border="1">
        <tr><th>Item</th><th>Borrower</th><th>Due by</th><th>Returned</th></tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row["item"];?></td>
                <td><?php echo $row["borrower"];?></td>
                <td><?php echo $row["due_date"];?></td>
                <td><?php 
                    if ($row["returned"] == 0) {
                        echo "No";
                    }
                    else {
                        echo "Yes";
                    } ?></td>
            </tr>
        <?php } ?>
</table>
<?php mysqli_close($conn); ?>