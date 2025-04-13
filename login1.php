<?php
session_start(); // 세션 시작

$conn = mysqli_connect("localhost", "root", "비밀번호", "tools_db");

$login_error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $input_password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($user = mysqli_fetch_assoc($result)) {
        if (password_verify($input_password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: mypage.php");
            exit;
        } else {
            $login_error = "Invalid username or password.";
        }
    } else {
        $login_error = "Invalid username or password.";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>로그인</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .login-box {
            backdrop-filter: blur(20px);
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            width: 350px;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.4);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 500;
            color: #f0f0f0;
        }

        .login-box input {
            width: 100%;
            padding: 14px;
            margin: 12px 0;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 15px;
        }

        .login-box input::placeholder {
            color: #ccc;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .login-box button,
        .login-box a.button-link {
            flex: 1;
            padding: 14px;
            background: linear-gradient(135deg, #43cea2, #185a9d);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: 0.3s ease;
        }

        .login-box button:hover,
        .login-box a.button-link:hover {
            opacity: 0.9;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .message.error {
            color: #ff5c5c;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>🔐 Login</h2>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="아이디" required>
        <input type="password" name="password" placeholder="비밀번호" required>
        <div class="btn-group">
            <button type="submit">로그인</button>
            <a href="register.php" class="button-link">회원가입</a>
        </div>
    </form>

    <div class="message">
        <?php if ($login_error): ?>
            <p class="error">❌ <?= $login_error ?></p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
