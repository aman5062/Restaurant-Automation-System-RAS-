
<?php
include 'include/db.php';
include 'include/navbar.php';

$result = $conn->query("SELECT * FROM ingredients");

?>

<div class="container">
    <h1>Inventory Report</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Ingredient Name</th>
            <th>Quantity</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
