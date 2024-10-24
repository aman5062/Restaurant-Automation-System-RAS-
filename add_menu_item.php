
<?php
include 'include/db.php';
include 'include/navbar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO menu_items (name, description, price) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $name, $description, $price);
    $stmt->execute();
    header("Location: menu.php");
    exit();
}
?>

<div class="container">
    <h1>Add Menu Item</h1>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea>
        <br>
        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" required>
        <br>
        <input type="submit" value="Add Item">
    </form>
</div>
