<?php
session_start();
include 'include/db.php';
include 'include/navbar.php';
?>

<div class="container">
    <h1>Orders Management</h1>
    <p>Manage your restaurant orders efficiently!</p>
    <a href="add_order.php" class="btn">Add New Order</a>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer ID</th>
                <th>Order Date</th>
                <th>Total Amount</th>
               
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch orders from the database
            $query = "SELECT * FROM orders ORDER BY created_at DESC";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['user_id'] . "</td>
                        <td>" . $row['created_at'] . "</td>
                        <td>" . $row['total_amount'] . "</td>
                        
                        <td>
                            <a href='update_order.php?id=" . $row['id'] . "'>Edit</a>
                            <a href='delete_order.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this order?\");'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No orders found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
