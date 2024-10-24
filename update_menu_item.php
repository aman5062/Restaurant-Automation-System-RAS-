
<?php
include 'include/db.php';
include 'include/navbar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_name = $_POST['item_name'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("UPDATE menu_items SET price = ? WHERE name = ?");
    $stmt->bind_param("ds", $price, $item_name);
    $stmt->execute();
    header("Location: print_menu.php");
    exit();
}

$result = $conn->query("SELECT * FROM menu_items");
?>

<div class="container">
    <h1>Update Menu Items</h1>
    <form method="POST">
        <label for="item_name">Select Menu Item:</label>
        <select name="item_name" required>
            <?php while ($row = $result->fetch_assoc()): ?>
                <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
            <?php endwhile; ?>
        </select>
        <br>
        <label for="price">New Price:</label>
        <input type="number" step="0.01" name="price" required>
        <br>
        <input type="submit" value="Update Menu Item">
    </form>
</div>
