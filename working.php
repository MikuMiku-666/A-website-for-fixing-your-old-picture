<?php
     // 检查是否有文件上传
     session_start(); 
     $command = $_SESSION['command'] ;
     $newphp = $_SESSION['newphp'];
     $folderpath = $_SESSION['fpath'];  
     $img_path = $_SESSION['imgpath']; 
    shell_exec($command); 
    echo $img_path . "<br>"; 
    echo $command; 
    // unlink($imgpath); 

    // 设置要跳转到的URL
    $url = $newphp;
 
    // 使用header函数发送Location头信息
    header("Location: $url");

    exit;

?>