<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Costume Closet Loans</title>
</head>
<body>
    <header><h1>Loans list</h1></header>
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
                    <td><a href="mark_returned.php?id=<?php echo $row["id"]; ?>">Mark returned</a></td>
                    <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                </tr>
            <?php } ?>
    </table>
    <?php mysqli_close($conn); ?>    
</body>
</html>
