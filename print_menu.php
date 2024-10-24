<?php
include 'include/db.php';
include 'include/navbar.php';

$result = $conn->query("SELECT * FROM menu_items");

?>

<div class="container">
    <h1>Menu</h1>
    <table>
        <tr>
            <th>Item Name</th>
            <th>Price</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
