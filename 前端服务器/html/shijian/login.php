<?php
// 连接数据库
// 定义数据库服务器的名称，用户名，密码和数据库名
header('Content-Type: text/html; charset=utf-8');
$servername = "10.26.63.81";
$username = "newuser";
$password = "123456";
$dbname = "anime_db";

// 创建连接到数据库的连接
// 使用mysqli扩展创建一个新的数据库连接
// 启用异常模式

// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    // 检查连接是否成功
    if ($conn->connect_errno) {
        throw new Exception("连接失败: " . $conn->connect_error);
    }
} catch (Exception $e) {
    // 处理异常
    echo "连接数据库时发生错误: " . $e->getMessage();
    exit();
}
// 检测连接是否成功
// 如果连接失败，则输出错误信息并停止脚本执行
if ($conn->connect_error) {
    echo  "die";
    die("Connection failed: " . $conn->connect_error);
}

// 从POST请求中获取用户名和密码
// 使用real_escape_string函数防止SQL注入
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);


// echo $password .'\n';
// $username = "testusr000";
// $password = "hSsWYa3m";
// echo $password."\n";;
// 准备SQL语句防止SQL注入
// 使用prepare方法准备一个SQL查询，避免SQL注入攻击
$stmt = $conn->prepare("SELECT id, username, password, hashed_password FROM users WHERE username = ?");
$stmt->bind_param("s", $username); // 绑定参数到SQL查询

// 执行查询
$stmt->execute(); // 执行准备好的SQL查询
$result = $stmt->get_result(); // 获取查询结果

// 检查用户名是否存在
if ($result->num_rows > 0) {
    // 输出结果
    while($row = $result->fetch_assoc()) {
        // 验证密码
        // echo $row['password'] ."\n";
        // $row['password'] = trim($row['password']);
        // 假设 $row 是从数据库中获取的记录
        // $password1 = $row['password'];

//         // 使用 trim() 函数去除两侧的空格
//         $trimmedPassword = trim($password1);

//         // 检查原始密码和修剪后的密码是否相同
//         if ($password1 !== $trimmedPassword) {
//             echo "密码两侧有空格。";
//         } else {
//             echo "密码两侧没有空格。";
// }
//         if (strcmp($password, $row['password']) === 0) {
//             echo "字符串内容一致";
//         } else {
//             echo "字符串内容不一致";
//         }
        // 使用password_verify函数检查提交的密码是否与数据库中的哈希密码匹配
        if (password_verify($password, $row['hashed_password'])) {
            echo "success";
            // 登录成功
            session_start(); // 开始一个新的会话或恢复现有的会话
            $_SESSION['loggedin'] = true; // 在会话中设置一个标志，表示用户已登录
            $_SESSION['id'] = $row['id']; // 存储用户ID在会话中
            $_SESSION['username'] = $row['username']; // 存储用户名在会话中
            // echo "<pre>";
            // print_r($_SESSION);
            // echo "</pre>";
            header("location: index.php?login=".$row['username']); // 重定向到成功页面
            // header("location:success_page.php"); 
            exit; // 停止脚本执行
        } else {
            // 密码错误
            echo "Invalid password"; // 输出错误信息
        }
    }
} else {
    // 用户名不存在
    echo "Username does not exist"; // 输出错误信息
}

// 关闭连接
$stmt->close(); // 关闭prepared statement
$conn->close(); // 关闭数据库连接
?>