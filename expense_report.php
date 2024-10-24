
<?php
include 'include/db.php';
include 'include/navbar.php';

$result = $conn->query("SELECT * FROM expenses");

?>

<div class="container">
    <h1>Expense Report</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Item</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['item']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['date']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
