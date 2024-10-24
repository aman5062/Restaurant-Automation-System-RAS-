
<?php
include 'include/db.php';
include 'include/navbar.php';

$result = $conn->query("SELECT * FROM orders");

?>

<div class="container">
    <h1>Sales Report</h1>
    <table>
        <tr>
            <th>Order ID</th>
            <th>User</th>
            <th>Total Amount</th>
            <th>Date</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['total_amount']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
