
<?php
include 'include/db.php';
include 'include/navbar.php';

// Fetch invoices
$result = $conn->query("SELECT i.id, s.name AS supplier_name, i.total_amount, i.created_at FROM invoices i JOIN suppliers s ON i.supplier_id = s.id");
?>

<div class="container">
    <h1>Invoice Management</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Supplier</th>
            <th>Total Amount</th>
            <th>Date</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['supplier_name']; ?></td>
            <td><?php echo $row['total_amount']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
