<?php
session_start();
include 'include/db.php';
include 'include/navbar.php';
?>

<!-- Dashboard Content -->
<div class="container mt-5">
    <h1 class="text-center mb-4">Restaurant Automation System Dashboard</h1>

    <div class="row">
        <!-- Sales Summary Card -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Sales</div>
                <div class="card-body">
                    <h5 class="card-title">₹50,000</h5>
                    <p class="card-text">This is the total sales figure for the current month.</p>
                </div>
            </div>
        </div>

        <!-- Orders Summary Card -->
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Pending Orders</div>
                <div class="card-body">
                    <h5 class="card-title">20 Orders</h5>
                    <p class="card-text">These are the orders that are still being processed.</p>
                </div>
            </div>
        </div>

        <!-- Inventory Alert Card -->
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Low Inventory</div>
                <div class="card-body">
                    <h5 class="card-title">5 Items</h5>
                    <p class="card-text">There are 5 items running low on stock. Replenish soon!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Links Section -->
    <div class="row mt-4">
        <div class="col-md-3">
            <a href="add_order.php" class="btn btn-primary btn-block">Add New Order</a>
        </div>
        <div class="col-md-3">
            <a href="manage_inventory.php" class="btn btn-secondary btn-block">Manage Inventory</a>
        </div>
        <div class="col-md-3">
            <a href="sales_report.php" class="btn btn-success btn-block">View Sales Report</a>
        </div>
        <div class="col-md-3">
            <a href="expense_report.php" class="btn btn-danger btn-block">View Expense Report</a>
        </div>
    </div>

    <!-- Latest Orders Table -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h3>Latest Orders</h3>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch recent orders from the database
                    $result = $conn->query("SELECT * FROM orders ORDER BY created_at DESC LIMIT 5");
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['user_id']}</td>
                                <td>₹{$row['total_amount']}</td>
                                <td>{$row['status']}</td>
                                <td>{$row['created_at']}</td>
                                <td><a href='view_order.php?id={$row['id']}' class='btn btn-info btn-sm'>View</a></td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap and jQuery scripts (make sure these are included) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
