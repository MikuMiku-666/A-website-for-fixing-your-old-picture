<?php 
    $command = "python3 /home/hadoop/workspace/Xuekeshijian/main.py -id 0 2>&1"; 
    $output = shell_exec($command); 
    echo $output;

?>