<?php
// 连接数据库
// 定义数据库服务器的名称，用户名，密码和数据库名
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
echo  "success";
// 从POST请求中获取用户名和密码
// 使用real_escape_string函数防止SQL注入
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);

echo $username . '\n';
echo $password . '\n';
// $username = "testusr000";
// $password = "hSsWYa3m";

// 准备SQL语句防止SQL注入
// 使用prepare方法准备一个SQL查询，避免SQL注入攻击
$stmt = $conn->prepare("SELECT id, username, hashed_password FROM users WHERE username = ?");
$stmt->bind_param("s", $username); // 绑定参数到SQL查询

// 执行查询
$stmt->execute(); // 执行准备好的SQL查询
$result = $stmt->get_result(); // 获取查询结果

// 检查用户名是否存在
if ($result->num_rows > 0) {
    // 输出结果
    while($row = $result->fetch_assoc()) {
        // 验证密码
        // echo $row['hashed_password'] ."\n";
        // 使用password_verify函数检查提交的密码是否与数据库中的哈希密码匹配
        if (password_verify($password, $row['hashed_password'])) {
            // 登录成功
            session_start(); // 开始一个新的会话或恢复现有的会话
            $_SESSION['loggedin'] = true; // 在会话中设置一个标志，表示用户已登录
            $_SESSION['id'] = $row['id']; // 存储用户ID在会话中
            $_SESSION['username'] = $row['username']; // 存储用户名在会话中
            header("location: success_page.php"); // 重定向到成功页面
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