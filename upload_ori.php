<?php
// 检查是否有文件上传
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $uploadDir = 'uploads/'; // 图片保存目录
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true); // 如果目录不存在，创建目录
    }

    $file = $_FILES['file'];
    $fileName = basename($file['name']);

    $folderPath = $uploadDir . "/" . uniqid() . "/";
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

        // 获取文件夹中的所有文件
        $files = scandir($folderPath);

        // 图片扩展名数组
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];

        // 遍历文件并筛选图片
        $images = [];
        foreach ($files as $file) {
            $filePath = $folderPath . '/' . $file;

            // 检查是否为文件以及扩展名是否为图片
            if(is_file($filePath) && in_array(strtolower(pathinfo($filePath, PATHINFO_EXTENSION)), $imageExtensions)) {
                $images[] = $file;
            }
        }

        // 显示图片
        if(count($images) > 0) {
            foreach($images as $image) {
                echo "<div style='margin: 10px; display: inline-block; text-align: center;'>";
                echo "<img src='{$folderPath}/{$image}' alt='{$image}' style='max-width: 200px; max-height: 200px; display: block; margin-bottom: 5px;'>";
                echo "<p>{$image}</p>";
                echo "</div>";
            }
        } else {
            echo "文件夹中没有图片。";
        }
        exit;
    } else {
        die('文件上传失败，请重试。');
    }
} else {
    die('无效的请求。');
}
?>
