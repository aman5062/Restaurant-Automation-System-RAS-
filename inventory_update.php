<?php
include 'include/db.php';
include 'include/navbar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("UPDATE inventory SET quantity = quantity + ? WHERE item_name = ?");
    $stmt->bind_param("is", $quantity, $item_name);
    $stmt->execute();
    header("Location: inventory.php");
    exit();
}

// Fetch inventory items for selection
$result = $conn->query("SELECT * FROM inventory");
?>

<div class="container">
    <h1>Update Inventory</h1>
    <form method="POST">
        <label for="item_name">Select Inventory Item:</label>
        <select name="item_name" required>
            <?php while ($row = $result->fetch_assoc()): ?>
                <option value="<?php echo $row['item_name']; ?>"><?php echo $row['item_name']; ?></option>
            <?php endwhile; ?>
        </select>
        <br>
        <label for="quantity">Quantity to Add:</label>
        <input type="number" name="quantity" required>
        <br>
        <input type="submit" value="Update Inventory">
    </form>
</div>
