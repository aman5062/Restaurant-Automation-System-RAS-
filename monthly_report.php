<?php
include 'include/db.php';
include 'include/navbar.php';

$result = $conn->query("SELECT SUM(total_amount) as total_sales, MONTH(created_at) as month 
                         FROM orders 
                         GROUP BY month");

?>

<div class="container">
    <h1>Monthly Sales Report</h1>
    <table>
        <tr>
            <th>Month</th>
            <th>Total Sales</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['month']; ?></td>
                <td><?php echo $row['total_sales']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
