<?php
include 'include/db.php';
include 'include/navbar.php';

// Fetch menu items
$result = $conn->query("SELECT * FROM menu_items");
?>

<div class="container">
    <h1>Menu Management</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['price']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
