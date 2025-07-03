<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Form Register</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST" action="index.php?action=register">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="password" name="confirm" placeholder="Confirm Password" required><br><br>
        <button type="submit">Register</button>
    </form>
    <p>Sudah punya akun? <a href="index.php?action=login">Login di sini</a></p>
</body>
</html>
