
<?php
include 'include/db.php';
include 'include/navbar.php';

$result = $conn->query("SELECT * FROM purchase_orders");

?>

<div class="container">
    <h1>Purchase Orders</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Ingredient Name</th>
            <th>Quantity Ordered</th>
            <th>Status</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['ingredient_name']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['status']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
