
<?php
include 'include/db.php';
include 'include/navbar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    // Fetch item price
    $result = $conn->query("SELECT price FROM menu_items WHERE id = $item_id");
    $item = $result->fetch_assoc();
    $total_amount = $item['price'] * $quantity;

    // Insert order
    $stmt = $conn->prepare("INSERT INTO orders (user_id, item_id, quantity, total_amount) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiid", $user_id, $item_id, $quantity, $total_amount);
    $stmt->execute();
    header("Location: orders.php");
    exit();
}

// Fetch menu items for order
$result = $conn->query("SELECT * FROM menu_items");
?>

<div class="container">
    <h1>Place Order</h1>
    <form method="POST">
        <label for="item_id">Select Menu Item:</label>
        <select name="item_id" required>
            <?php while ($row = $result->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php endwhile; ?>
        </select>
        <br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required>
        <br>
        <input type="submit" value="Place Order">
    </form>
</div>
