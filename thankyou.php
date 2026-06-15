<?php include('server11.php');
if(!isset($_SESSION['username'])){ header('location:login.php'); exit(); } ?>
<!DOCTYPE html>
<html>
<head>
    <title>Cilantro - Thank You</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #FFD700; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .box { background: white; padding: 40px; border-radius: 12px; text-align: center; width: 340px; box-shadow: 0 4px 20px rgba(0,0,0,0.15); }
        .logo { margin-bottom: 16px; }
        .logo img { height: 70px; border-radius: 10px; }
        h2 { color: #1a1a1a; font-size: 22px; margin-bottom: 10px; }
        p { color: #666; font-size: 14px; line-height: 1.6; }
        a { display: inline-block; margin-top: 20px; padding: 11px 28px; background: #FFD700; color: #1a1a1a; border-radius: 6px; font-weight: bold; text-decoration: none; }
        a:hover { background: #e6c200; }
    </style>
</head>
<body>
<div class="box">
    <div class="logo">
        <img src="https://cilantro.cafe/cdn/shop/files/LOGO_800x.png?v=1613746224" alt="Cilantro">
    </div>
    <h2>Order Confirmed!</h2>
    <p>Your order has been placed successfully.<br>We'll have it ready for you shortly.</p>
    <a href="products.php">Order Again</a>
</div>
</body>
</html>
