<?php
include 'include/db.php';
include 'include/navbar.php';

// Fetch orders
$result = $conn->query("SELECT o.id, u.username, o.total_amount, o.created_at FROM orders o JOIN users u ON o.user_id = u.id");
?>

<div class="container">
    <h1>Order Management</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Total Amount</th>
            <th>Date</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['total_amount']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
