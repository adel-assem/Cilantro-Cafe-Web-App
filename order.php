<?php include('server11.php');
if(!isset($_SESSION['username'])){ header('location:login.php'); exit(); }
$pid = isset($_GET['pid']) ? (int)$_GET['pid'] : 0;
$product = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM products WHERE id=$pid"));
if(!$product){ header('location:products.php'); exit(); }
if(isset($_POST['confirm'])){
    $user = $_SESSION['username'];
    $payment = mysqli_real_escape_string($db, $_POST['payment']);
    mysqli_query($db, "INSERT INTO orders (username, product_id, payment_method) VALUES ('$user', $pid, '$payment')");
    header('location:thankyou.php'); exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cilantro - Order</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #FFD700; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .box { background: white; padding: 36px; border-radius: 12px; width: 340px; box-shadow: 0 4px 20px rgba(0,0,0,0.15); }
        .logo { text-align: center; margin-bottom: 16px; }
        .logo img { height: 60px; border-radius: 10px; }
        h2 { text-align: center; color: #1a1a1a; font-size: 20px; margin-bottom: 16px; }
        .item { background: #FFF8DC; border-radius: 10px; padding: 14px; margin-bottom: 20px; text-align: center; }
        .item img { width: 100%; height: 130px; object-fit: cover; border-radius: 8px; margin-bottom: 10px; }
        .item h3 { color: #1a1a1a; font-size: 16px; margin-bottom: 4px; }
        .item .price { font-size: 20px; font-weight: bold; color: #1a1a1a; }
        label { display: block; margin-bottom: 6px; color: #333; font-size: 14px; font-weight: bold; }
        select { width: 100%; padding: 10px; margin-bottom: 16px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; }
        button { width: 100%; padding: 11px; background: #FFD700; color: #1a1a1a; border: none; border-radius: 6px; font-size: 15px; font-weight: bold; cursor: pointer; }
        button:hover { background: #e6c200; }
        a { display: block; text-align: center; margin-top: 12px; color: #555; font-size: 13px; }
    </style>
</head>
<body>
<div class="box">
    <div class="logo">
        <img src="https://cilantro.cafe/cdn/shop/files/LOGO_800x.png?v=1613746224" alt="Cilantro">
    </div>
    <h2>Confirm Order</h2>
    <div class="item">
        <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
        <h3><?= $product['name'] ?></h3>
        <p style="color:#888;font-size:13px;margin:4px 0;"><?= $product['description'] ?></p>
        <div class="price">EGP <?= $product['price'] ?></div>
    </div>
    <form method="post">
        <label>Payment Method</label>
        <select name="payment">
            <option value="Cash">Cash</option>
            <option value="Credit Card">Credit Card</option>
            <option value="Vodafone Cash">Vodafone Cash</option>
        </select>
        <button type="submit" name="confirm">Confirm Order</button>
    </form>
    <a href="products.php">← Back to Menu</a>
</div>
</body>
</html>
