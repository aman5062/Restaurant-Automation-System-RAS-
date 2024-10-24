
<?php
include 'include/db.php';
include 'include/navbar.php';

// Fetch suppliers
$result = $conn->query("SELECT * FROM suppliers");
?>

<div class="container">
    <h1>Supplier Management</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contact Info</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['contact_info']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
