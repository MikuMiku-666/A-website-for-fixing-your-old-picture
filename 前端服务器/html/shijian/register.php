<?php
// 数据库配置
$servername = "10.26.63.81";
$username = "newuser";
$password = "123456";
$dbname = "anime_db";

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 从POST请求中获取数据
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);
$confirm_password = $conn->real_escape_string($_POST['confirm_password']);

// 检查密码是否一致
if ($password !== $confirm_password) {
    die("Passwords do not match");
}

// 密码加密
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// 插入新用户
$stmt = $conn->prepare("INSERT INTO users (username, password, hashed_password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $password, $hashed_password);

if ($stmt->execute()) {
    echo "New user created successfully";
    echo "<script>window.onload = function() {
        window.location.href = 'http://10.26.63.81/shijian/genre.php?login=$username';
        };
        </script>";
} else {
    echo "Error: " . $stmt->error;
}

// 关闭stmt和连接
$stmt->close();
$conn->close();
?>