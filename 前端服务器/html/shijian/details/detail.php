<!doctype html>
<html lang="en">

<?php 
// 通过 id 来查询指定番剧
    $id = isset($_GET['id']) ? $_GET['id'] : "0";  // 直接访问时，默认显示第一个番剧
    header('Content-Type: text/html; charset=utf-8');
    $user = isset($_GET['login']) ? $_GET['login'] : "None"; 
    $servername = "10.26.63.81";
    $username = "newuser";
    $password = "123456";
    $dbname = "anime_db";

    // 创建连接到数据库的连接
    // 使用mysqli扩展创建一个新的数据库连接

    // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try {
        $conn = new mysqli($servername, $username, $password, $dbname);
        // 检查连接是否成功
        if ($conn->connect_errno) {
            throw new Exception("连接失败: " . $conn->connect_error);
        }
    } catch (Exception $e) {
        echo "连接数据库时发生错误: " . $e->getMessage();
        exit();
    }
    
    $command = "select * from anime where id = '$id'"; 
    $result = $conn->query($command);
    if($result->num_rows == 0){
        echo "没有这个番剧"; 
    }
    else{
        $row = $result->fetch_assoc();
        $summary = $row["summary"]; 
        $avg_rating = $row["rating"]; 
        $language = $row["language"]; 
        $genre = $row["genre"]; 
        $name = $row["title"]; 
        $image = $row["image"]; 
        $cast = $row["cast"]; 
        
    }
    $userid = 0; 
    if($user != "None"){
        $command = "select * from users where username = '$user'"; 
        $result = $conn->query($command);
        if($result->num_rows == 0){
            echo "没有这个用户"; 
        }
        else{
           $userid = $row["id"]; 
        }
    }
    
?>


<?php 
     putenv('JAVA_HOME=/usr/lib/jvm/jdk1.8.0_371');
    
     function fetchImagesFromHDFS($hdfsPath, $localDir) {
        // 构建Hadoop HDFS命令
        $command = ("/usr/local/hadoop/bin/hdfs dfs -get $hdfsPath $localDir 2>&1");
        // $command = ("/usr/local/hadoop/bin/hdfs dfs -ls /usr/hadoop/imgs"); 
    
        // 执行命令并捕获输出和错误
        $output = shell_exec($command);
    
        // 检查命令是否成功执行
        if (preg_match('/Exception|ERROR|error/', $output)) {
            // 如果输出中包含错误消息，则抛出异常
            throw new Exception("Failed to fetch images from HDFS. Command output: " . $output);
        }
    
        // 如果命令成功，则返回成功消息
        return "Images successfully fetched to $localDir";
    }
    $img_url = "http://10.26.63.81/shijian/images/".$id.".jpg"; 
    $local_path = "/var/www/html/shijian/images/".$id.".jpg";
if (file_exists($local_path)) {

} else {
    $hdfsPath_base = "/user/hadoop/imgs/"; 
    $localDir_base = "/var/www/html/shijian/images/"; 

    fetchImagesFromHDFS($hdfsPath_base.$id.".jpg", $localDir_base); 
}
    
    // $img_url = "http://10.26.63.81/shijian/images/".$id.".jpg"; 
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link href="assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/slick/slick.css" rel="stylesheet">
    <link href="assets/vendors/slick/slick-theme.css" rel="stylesheet">
    <link href="assets/vendors/elagent-icon/style.css" rel="stylesheet">
    <link href="assets/vendors/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="assets/vendors/icomoon/style.css" rel="stylesheet">
    <link href="assets/vendors/themify-icon/themify-icons.css" rel="stylesheet">
    <link href="assets/vendors/animation/animate.css" rel="stylesheet">
    <link href="assets/vendors/fancybox/jquery.fancybox.min.css" rel="stylesheet">
    <link href="assets/vendors/themify-icon/themify-icons.css" rel="stylesheet">
    <link href="assets/vendors/ui-fliter/jquery-ui.css" rel="stylesheet">
    <link href="assets/vendors/nice-select/css/nice-select.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <title><?php echo $name. "---详情页"; ?> </title>
</head>

<body data-scroll-animation="true">
    

    <div class="body_wrapper">

        <div class="toast-container position-fixed p-3">
            <div id="cartToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Cart Update</strong>
                    <small>just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Item added to the cart!
                </div>
            </div>
        </div>

        <header class="header_area header_relative">
            <nav class="navbar navbar-expand-lg menu_one" id="header">
                <div class="container">
                    
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_toggle">
                            <span class="hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <span class="hamburger-cross">
                                <span></span>
                                <span></span>
                            </span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                        <ul class="navbar-nav menu w_menu ms-auto me-auto">
                            <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="http://10.26.63.81/shijian" role="button"  aria-haspopup="false" aria-expanded="false" style="font-size: 20px; ">
                                    主页
                                </a>
                                
                            </li> 
                        </ul>
                        
                       
                    </div>
                </div>
            </nav>
        </header>

        <!-- breadcrumb area  -->
        
        <!-- breadcrumb area  -->
        <section class="product_details_area sec_padding" data-bg-color="#f5f5f5">
            <div class="container">
                <div class="row gy-xl-0 gy-3">
                    <div class="col-xl-12">
                        <div class="bj_book_single me-xl-3">
                            <div class="bj_book_img flip">
                                <div class="front"><img class="img-fluid" src="<?php echo $img_url; ?>" alt="">
                                </div>
                                <div class="back"><img class="img-fluid" src="<?php echo $img_url; ?>" alt=""></div>
                                <div class="pr_ribbon">
                                    <!-- <span class="product-badge">New</span> -->
                                </div>
                            </div>
                            <div class="bj_book_details">
                                <h2><?php echo $name; ?></h2>
                                <ul class="list-unstyled book_meta">
                                    <?php 
                                    $genre[0] = '{'; 
                                    $genre[strlen($genre)-1] = '}'; 
                                    $jsonString = str_replace(['{', '}', '\''], ['[', ']', '"'], $genre);
                                    // echo $jsonString; 
                                    $genres = json_decode($jsonString);  
                                        echo "标签: "; 
                                        // $i = 1; 
                                        foreach($genres as $gen){
                                            echo "<li>".$gen."</li>"; 
                                        }
                                    ?>

                                </ul>
                                <div class="ratting review">
                                <div class="star-rating">
                                    <?php
                                    $fullStars = floor($avg_rating / 2); // 获取全星的数量
                                    $halfStar = ($avg_rating - $fullStars) >= 0.5 ? 1 : 0; // 判断是否需要半星
                                  

                                    // 输出全星
                                    for ($i = 0; $i < $fullStars; $i++) {
                                        echo '<i class="fas fa-star"></i>';
                                    }

                                    // 输出半星（如果有的话）
                                    if ($halfStar) {
                                        echo '<i class="fas fa-star-half-stroke"></i>';
                                    }

                                   
                                    ?>
                                    <span><?php echo $avg_rating; ?></span>
                                </div>
                                    
                                </div>
                                <!-- <div class="price">$10</div> -->
                                <p style="margin-top:2%; "><?php echo $summary; ?></p>
                                <ul class="product_meta list-unstyled">
                                    <li><span>演员:</span><?php 
                                   
                                    $cast[0] = '{'; 
                                    $cast[strlen($cast)-1] = '}'; 
                                    $jsonString = str_replace(['{', '}', '\''], ['[', ']', '"'], $cast);
                                    // echo $jsonString; 
                                    $casts = json_decode($jsonString);  
                                    // echo $cast; 
                                        foreach($casts as $cas){
                                            echo $cas." | "; 
                                        }
                                        // echo $cast; 
                                    ?>
                                    </li>
                                    <li><span>日期:</span><?php echo $row["year"]; ?></li>
                                    <li><span>集数:</span><?php echo $row["episode_count"]; ?></li>
                                    <li><span>语言:</span><?php echo $row["language"]; ?></li>
                                    <li><span>导演:</span><?php 
                                         $dir = $row["director"]; 
                                         $dir[0] = '{'; 
                                         $dir[strlen($dir)-1] = '}'; 
                                         $jsonString = str_replace(['{', '}', '\''], ['[', ']', '"'], $dir);
                                         // echo $jsonString; 
                                         $directors = json_decode($jsonString);  
                                         // echo $cast; 
                                             foreach($directors as $director){
                                                 echo $director."|"; 
                                             }
                                    
                                    ?></li>
                                    <li><span>国家:</span><?php echo $row["country"]; ?></li>
                                </ul>
                                <form action="work.php" method="post">
        
                                    <label for="rating">选择分数:</label>
                                    <select name="rating" id="rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <br><br>
                                    <?php 
                                        if($user == "None")
                                            echo "请先登录，再提交打分";
                                        else
                                            echo '<input type="submit" value="提交">'; 
                                    ?>
                                    
                                </form>

                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </section>



        

    </div>
    <!-- Back to top button -->
    <a id="back-to-top" title="Back to Top"></a>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <style>
        #preloader {
            display: none;
        }
    </style>
    <!-- <script src="assets/js/preloader.js"></script> -->
    <script src="assets/vendors/bootstrap/js/popper.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendors/parallax/parallax.js"></script>
    <script src="assets/vendors/slick/slick.min.js"></script>
    <script src="assets/js/comming-soon.js"></script>
    <script src="assets/vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendors/isotope/isotope.pkgd.min.js"></script>
    <script src="assets/vendors/parallax/jquery.parallax-scroll.js"></script>
    <script src="assets/vendors/fancybox/jquery.fancybox.min.js"></script>
    <script src="assets/vendors/ui-fliter/jquery-ui.js"></script>
    <script src="assets/vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="assets/vendors/wow/wow.min.js"></script>
    <script src="assets/js/custom.js"></script>

</body>

</html>