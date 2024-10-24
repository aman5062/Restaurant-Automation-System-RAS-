
<?php
include 'include/db.php';
include 'include/navbar.php';

// Fetch inventory
$result = $conn->query("SELECT * FROM inventory");
?>

<div class="container">
    <h1>Inventory Management</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Threshold</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['item_name']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['threshold']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
