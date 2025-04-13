<?php
$conn = mysqli_connect("localhost", "root", "비밀번호", "tools_db");

$register_success = false;
$register_error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password_raw = $_POST['password'];
    $password_hashed = password_hash($password_raw, PASSWORD_DEFAULT);

    // 중복 확인
    $check_sql = "SELECT * FROM users WHERE username = '$username'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        $register_error = "이미 존재하는 아이디입니다.";
    } else {
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password_hashed')";
        if (mysqli_query($conn, $sql)) {
            $register_success = true;
        } else {
            $register_error = "회원가입 실패: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>회원가입</title>
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

        .register-box {
            backdrop-filter: blur(20px);
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            width: 350px;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.4);
        }

        .register-box h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 500;
            color: #f0f0f0;
        }

        .register-box input {
            width: 100%;
            padding: 14px;
            margin: 12px 0;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 15px;
        }

        .register-box input::placeholder {
            color: #ccc;
        }

        .register-box button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #43cea2, #185a9d);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
            margin-top: 10px;
        }

        .register-box button:hover {
            opacity: 0.9;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .message.success {
            color: #7CFC00;
        }

        .message.error {
            color: #ff5c5c;
        }
    </style>
</head>
<body>

<div class="register-box">
    <h2>📝 회원가입</h2>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="아이디" required>
        <input type="password" name="password" placeholder="비밀번호" required>
        <button type="submit">회원가입</button>
    </form>

    <div class="message">
        <?php if ($register_success): ?>
            <p class="success">✅ 회원가입이 완료되었습니다! <a href="login.php" style="color:#7CFC00; text-decoration:underline;">로그인하러 가기</a></p>
        <?php elseif ($register_error): ?>
            <p class="error">❌ <?= $register_error ?></p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
