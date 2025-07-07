<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 420px;
            border: 1px solid #ccc;
        }

        h2 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 24px;
            color: #222;
        }

        form input[type="text"],
        form input[type="password"] {
            width: 100%;
            padding: 12px 14px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            background-color: #fafafa;
        }

        form button {
            width: 100%;
            padding: 12px;
            background-color: #222;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.3s;
        }

        form button:hover {
            background-color: #444;
        }

        p {
            margin-top: 16px;
            text-align: center;
            font-size: 14px;
        }

        p a {
            color: #007bff;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            font-size: 13px;
            margin-top: -6px;
            margin-bottom: 10px;
        }

        @media (max-width: 500px) {
            .form-container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Login</h2>

    <form method="POST" action="index.php?action=login">
        <input type="text" name="username" placeholder="Username" required>
        <?php if (!empty($error['username'])) echo "<div class='error'>{$error['username']}</div>"; ?>

        <input type="password" name="password" placeholder="Password" required>
        <?php if (!empty($error['password'])) echo "<div class='error'>{$error['password']}</div>"; ?>

        <button type="submit">Login</button>
    </form>

    <p>Belum punya akun? <a href="index.php?action=register">Daftar di sini</a></p>
</div>

</body>
</html>
