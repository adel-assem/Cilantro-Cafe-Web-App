<?php include('server11.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Cilantro - Login</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #FFD700; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .box { background: white; padding: 40px; border-radius: 12px; width: 340px; box-shadow: 0 4px 20px rgba(0,0,0,0.15); }
        .logo { text-align: center; margin-bottom: 20px; }
        .logo img { height: 70px; border-radius: 10px; }
        h2 { text-align: center; color: #1a1a1a; font-size: 20px; margin-bottom: 20px; }
        label { display: block; margin-bottom: 4px; color: #333; font-size: 14px; font-weight: bold; }
        input { width: 100%; padding: 10px; margin-bottom: 14px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; }
        button { width: 100%; padding: 11px; background: #FFD700; color: #1a1a1a; border: none; border-radius: 6px; font-size: 15px; font-weight: bold; cursor: pointer; }
        button:hover { background: #e6c200; }
        p { text-align: center; font-size: 13px; margin-top: 12px; color: #555; }
        a { color: #1a1a1a; font-weight: bold; }
        .error { color: red; font-size: 13px; margin-bottom: 10px; background: #fff0f0; padding: 8px; border-radius: 6px; }
    </style>
</head>
<body>
<div class="box">
    <div class="logo">
        <img src="https://cilantro.cafe/cdn/shop/files/LOGO_800x.png?v=1613746224" alt="Cilantro">
    </div>
    <h2>Welcome Back</h2>
    <?php foreach($error as $e): ?>
        <div class="error"><?= $e ?></div>
    <?php endforeach; ?>
    <form method="post" action="login.php">
        <label>Username</label>
        <input type="text" name="un" required>
        <label>Password</label>
        <input type="password" name="psw1" required>
        <button type="submit" name="login">Sign In</button>
    </form>
    <p>Not a member? <a href="register.php">Sign Up</a></p>
</div>
</body>
</html>
