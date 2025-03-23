<?php 
    putenv('JAVA_HOME=/usr/lib/jvm/jdk1.8.0_371'); 
    $command = "/usr/local/hadoop/bin/hdfs dfs -ls /user/hadoop/imgs 2>&1"; 
    echo shell_exec($command);     
    
?>