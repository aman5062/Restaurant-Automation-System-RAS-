<?php
include 'include/db.php';
include 'include/navbar.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $contact_info = $_POST['contact_info'];

    $stmt = $conn->prepare("UPDATE suppliers SET name=?, contact_info=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $contact_info, $id);
    $stmt->execute();
    header("Location: suppliers.php");
    exit();
}

// Fetch existing supplier data
$result = $conn->query("SELECT * FROM suppliers WHERE id = $id");
$supplier = $result->fetch_assoc();
?>

<div class="container">
    <h1>Edit Supplier</h1>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $supplier['name']; ?>" required>
        <br>
        <label for="contact_info">Contact Info:</label>
        <input type="text" name="contact_info" value="<?php echo $supplier['contact_info']; ?>" required>
        <br>
        <input type="submit" value="Update Supplier">
    </form>
</div>
