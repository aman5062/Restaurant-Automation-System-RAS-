
<?php
include 'include/db.php';
include 'include/navbar.php';

$invoice_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Logic to pay the invoice
    echo "Invoice paid.";
}

?>

<div class="container">
    <h1>Pay Invoice</h1>
    <form method="POST">
        <p>Invoice ID: <?php echo $invoice_id; ?></p>
        <input type="submit" value="Pay Invoice">
    </form>
</div>
