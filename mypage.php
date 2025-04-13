<?php
session_start();

// 로그인 안 했을 경우 로그인 페이지로 보내기
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "비밀번호", "tools_db");

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>마이페이지</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
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

        .mypage-box {
            background-color: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 40px;
            width: 400px;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.4);
            text-align: center;
        }

        .mypage-box h2 {
            font-weight: 500;
            margin-bottom: 20px;
        }

        .mypage-box p {
            font-size: 18px;
            margin: 10px 0;
        }

        .mypage-box a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
            transition: 0.3s ease;
        }

        .mypage-box a:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

<div class="mypage-box">
    <h2>👤 마이페이지</h2>
    <p><strong>아이디:</strong> <?= htmlspecialchars($user['username']) ?></p>
    <p><strong>회원번호:</strong> <?= $user['id'] ?></p>
    <a href="logout.php">로그아웃</a>
</div>

</body>
</html>
