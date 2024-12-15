<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $uploadDir = 'uploads/'; // 图片保存目录
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true); // 如果目录不存在，创建目录
    }

    $file = $_FILES['file'];
    $fileName = basename($file['name']);
    $newfolder = uniqid(); 
    $folderPath = $uploadDir . "/" . $newfolder . "/";
    $targetPath = $folderPath . $fileName;
    if(!is_dir($folderPath)) {
        mkdir($folderPath, 0755, true); // 如果目录不存在，创建目录
    }

    // 检查文件类型
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($file['type'], $allowedTypes)) {
        die('只允许上传 JPEG, PNG 和 GIF 格式的图片。');
    }
    // 移动上传文件到目标路径
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        // 重定向到主页面，并传递图片路径
        $py_path = "./program/client.py"; 
        $img_path = "./" . $targetPath;
        $command = "python3 " . $py_path . " " . $img_path; 
        $output = shell_exec("sudo " . $command);
        unlink($img_path);
        copy("/result.php", "/uploads/".$newfolder."/result".$newfolder.".php"); 
    } else {
        die('文件上传失败，请重试。');
    }
} else {
    die('无效的请求。');
} 

?>