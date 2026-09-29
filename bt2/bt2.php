<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả đăng ký</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f6f9;
            margin: 0;
        }
        /* Style khung thông báo bo viền màu tím hồng theo slide */
        .box-message {
            background: #fff;
            padding: 25px 30px;
            border-radius: 8px;
            border: 3px solid #a855f7;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .msg-text {
            color: #c026d3;
            font-weight: bold;
            font-size: 15px;
            line-height: 1.5;
        }
    </style>
</head>
<body>

<div class="box-message">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Kiểm tra điều kiện Password và Confirm Password
        if ($password !== $confirm_password) {
            echo "<div class='msg-text'>Incorrect confirm password!</div>";
        } else {
            echo "<div class='msg-text'>Thank " . htmlspecialchars($fullname) . " !, please confirm registration in your email: " . htmlspecialchars($email) . "</div>";
        }
    }
    ?>
</div>

</body>
</html>