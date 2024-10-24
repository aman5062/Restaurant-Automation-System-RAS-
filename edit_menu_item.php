<?php
include 'include/db.php';
include 'include/navbar.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("UPDATE menu_items SET name=?, description=?, price=? WHERE id=?");
    $stmt->bind_param("ssdi", $name, $description, $price, $id);
    $stmt->execute();
    header("Location: menu.php");
    exit();
}

// Fetch existing data
$result = $conn->query("SELECT * FROM menu_items WHERE id = $id");
$item = $result->fetch_assoc();
?>

<div class="container">
    <h1>Edit Menu Item</h1>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $item['name']; ?>" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" required><?php echo $item['description']; ?></textarea>
        <br>
        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" value="<?php echo $item['price']; ?>" required>
        <br>
        <input type="submit" value="Update Item">
    </form>
</div>
