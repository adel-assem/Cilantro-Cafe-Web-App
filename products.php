<?php include('server11.php');
if(!isset($_SESSION['username'])){ header('location:login.php'); exit(); } ?>
<!DOCTYPE html>
<html>
<head>
    <title>Cilantro - Menu</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #fff; }
        header { background: #FFD700; padding: 14px 30px; display: flex; justify-content: space-between; align-items: center; border-bottom: 3px solid #e6c200; }
        .logo img { height: 48px; }
        .user-info { font-size: 14px; color: #1a1a1a; font-weight: bold; }
        .user-info a { color: #1a1a1a; margin-left: 10px; text-decoration: underline; }
        .hero { background: #FFD700; text-align: center; padding: 30px 20px 40px; }
        .hero h1 { font-size: 32px; color: #1a1a1a; font-weight: 900; letter-spacing: 2px; }
        .hero p { color: #333; margin-top: 6px; font-size: 15px; }
        .section { padding: 30px; }
        .section h2 { font-size: 20px; color: #1a1a1a; font-weight: 800; border-left: 5px solid #FFD700; padding-left: 12px; margin-bottom: 20px; letter-spacing: 1px; }
        .grid { display: flex; flex-wrap: wrap; gap: 18px; }
        .card { background: #fff; border-radius: 12px; width: 190px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); overflow: hidden; transition: transform 0.2s; }
        .card:hover { transform: translateY(-4px); }
        .card img { width: 100%; height: 140px; object-fit: cover; }
        .card-body { padding: 12px; }
        .card-body h3 { font-size: 14px; color: #1a1a1a; font-weight: 700; margin-bottom: 4px; }
        .card-body p { font-size: 12px; color: #888; margin-bottom: 10px; }
        .card-body .price { font-size: 15px; font-weight: bold; color: #1a1a1a; margin-bottom: 10px; }
        .card-body a { display: block; text-align: center; background: #FFD700; color: #1a1a1a; padding: 7px; border-radius: 6px; font-size: 13px; font-weight: bold; text-decoration: none; }
        .card-body a:hover { background: #e6c200; }
        footer { background: #FFD700; text-align: center; padding: 14px; font-size: 13px; color: #1a1a1a; font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="https://cilantro.cafe/cdn/shop/files/LOGO_800x.png?v=1613746224" alt="Cilantro">
    </div>
    <div class="user-info">
        Hello, <?= $_SESSION['username'] ?>
        <a href="login.php?logout=1">Logout</a>
    </div>
</header>
<div class="hero">
    <h1>OUR MENU</h1>
    <p>Order your favourite drinks &amp; bites</p>
</div>
<div class="section">
    <h2>DRINKS</h2>
    <div class="grid">
        <?php $drinks = mysqli_query($db, "SELECT * FROM products WHERE category='drinks'");
        while($p = mysqli_fetch_assoc($drinks)){ ?>
        <div class="card">
            <img src="<?= $p['image'] ?>" alt="<?= $p['name'] ?>">
            <div class="card-body">
                <h3><?= $p['name'] ?></h3>
                <p><?= $p['description'] ?></p>
                <div class="price">EGP <?= $p['price'] ?></div>
                <a href="order.php?pid=<?= $p['id'] ?>">Order Now</a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<div class="section">
    <h2>FOOD</h2>
    <div class="grid">
        <?php $food = mysqli_query($db, "SELECT * FROM products WHERE category='food'");
        while($p = mysqli_fetch_assoc($food)){ ?>
        <div class="card">
            <img src="<?= $p['image'] ?>" alt="<?= $p['name'] ?>">
            <div class="card-body">
                <h3><?= $p['name'] ?></h3>
                <p><?= $p['description'] ?></p>
                <div class="price">EGP <?= $p['price'] ?></div>
                <a href="order.php?pid=<?= $p['id'] ?>">Order Now</a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<footer>© 2025 Cilantro Cafe — All Rights Reserved</footer>
</body>
</html>
