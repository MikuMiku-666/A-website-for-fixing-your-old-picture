<?php 
    echo "File opened!" . "<br>"; 

    $py_path = "/home/ubuntu/workspace/client.py"; 
    $img_path = "./A.jpeg"; 
    $command = "python3 " . $py_path . " " . $img_path . " 2>&1"; 
    //chdir("/home/ubuntu/workspace"); 
    echo "python3 /home/ubuntu/workspace/client.py " . $img_path . "<br>"; 
    $output = shell_exec("sudo -S python3 ./client.py ". $img_path . " 2>&1"); 
    echo $img_path . "<br>"; 
    echo nl2br($output) . "<br>"; // 使用nl2br将输出中的换行符转换为HTML换行标签
?>
