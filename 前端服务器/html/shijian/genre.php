<!DOCTYPE html>
<!--[if IE 8]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<?php 
    $mode = 0;  // 0:  第一套，1 第二套
    $username = ""; 

    header('Content-Type: text/html; charset=utf-8');

        $servername = "10.26.63.81";
        $logname = "newuser";
        $password = "123456";
        $dbname = "anime_db";

        // 创建连接到数据库的连接
        // 使用mysqli扩展创建一个新的数据库连接

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {
            $conn = new mysqli($servername, $logname, $password, $dbname);
            // 检查连接是否成功
            if ($conn->connect_errno) {
                throw new Exception("连接失败: " . $conn->connect_error);
            }
        } catch (Exception $e) {
            echo "连接数据库时发生错误: " . $e->getMessage();
            exit();
        }
    $userid = 0; 
    if(isset($_GET["login"])){
        $mode = 1; 
        $username = $_GET["login"]; 
        

        $command = 'SELECT * FROM users where username = "'.$username.'";'; 
        $result = $conn->query($command);
        if($result->num_rows == 0){
            echo "<script>window.onload = function() {
            window.location.href = 'http://10.26.63.81/shijian/index.php';
            };
            </script>";  // 如果没有这个用户，显示默认界面
        }
        else{
            $row = $result->fetch_assoc();
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
    $hdfsPath_base = "/user/hadoop/imgs/"; 
    $localDir_base = "/var/www/html/shijian/images/"; 

?>


<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8" />
    <!-- [if IE ]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/><![endif] -->
    <title>番剧推荐系统</title>
    <meta name="description"
        content="Epictrics offers unique travel experiences with adventure, family, and exploration tours. Discover stunning destinations, exclusive deals, and flexible itineraries. Book your dream trip with Epictrics today!">
    <meta name="keywords"
        content="book a tour, travel tour, cheap tours, domestic tours, international tours, holiday tours, adventure travel, family tours, group travel, beach tours, nature tours, all-inclusive tours, summer tours, travel packages, vacation deals">
    <meta name="author" content="themesflat.com" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="css/animate.min.css" />
    <!-- Magnific-popup -->
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.min.css" />
    <!-- Nice-select -->
    <link rel="stylesheet" type="text/css" href="css/nice-select.css">
    <!-- Nouislider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.min.css">
    <!-- Jquery-ui -->
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <!-- Swiper-bundle -->
    <link rel="stylesheet" type="text/css" href="css/swiper-bundle.min.css">
    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="css/styles.css" />

    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="icons/icomoon/style.css" />

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="image/logo/favicon.png" />
    <link rel="apple-touch-icon-precomposed" href="image/logo/favicon.png" />


</head>

<body class="popup-loader total-number-variant date-picker">
    <!-- .Wrapper -->
    <div id="wrapper">
        <!-- Preload -->
        <div class="preload preload-container">
            <div class="middle">
                <div class="img-preload">
                    <div class="img">
                        <img src="image/page-title/page-title-home-2-2.png" alt="" class="lazyload">
                    </div>
                    <div class="lines">
                        <div class="line line-1"></div>
                        <div class="line line-2"></div>
                        <div class="line line-3"></div>
                        <div class="line line-4"></div>
                    </div>
                </div>
            </div>
        </div><!-- /.preload -->

        

        <!-- Header -->
        <header id="header_main" class="header header-fixed style-absolute">
            <div class="header-inner style-2">
                <div class="tf-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="header-inner-wrap">
                                
                               
                                <nav class="main-menu">
                                    <ul class="menu-primary-menu">
                                        <li class="menu-item menu-item-has-children current-menu-item">
                                            <a href="javascript:void(0)">Homepage</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item current-item">
                                                    <a href="index.html">主页</a>
                                                </li>
                                                <li class="menu-item current-item">
                                                    <a href="listing-tours-pagination.html">番剧大全</a>
                                                </li>
                                                
                                            </ul>
                                        </li>
                                       
                                    </ul>
                                </nav>
                                <div class="header-right">
                                    <div class="login">
                                        <?php 
                                        if(isset($_GET['login'])){
                                            $output_str = '<a href="./index.php" data-bs-toggle="offcanvas">'; 
                                            echo $output_str; 
                                            echo "LOG OUT"; 
                                        }
                                        else{
                                            $output_str = '<a href="#canvasLogin" data-bs-toggle="offcanvas">'; 
                                            echo $output_str; 
                                            echo "LOG IN/REGISTER"; 
                                        }
                                        echo "</a>"; 
                                        ?>
                                    </div>
                                    
                                
                                    <div class="mobile-button">
                                        <span></span>
                                    </div><!-- /mobile-button -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-nav-wrap">
                <div class="overlay-mobile-nav"></div>
                <div class="inner-mobile-nav">
                    <div class="top-header-mobi">
                        <a href="index.html">
                            <img src="image/logo/logo-black.svg" data-src="image/logo/logo-black.svg" class="lazyload"
                                alt="">
                        </a>
                        <div class="mobile-nav-close">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                fill="black" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 122.878 122.88"
                                enable-background="new 0 0 122.878 122.88" xml:space="preserve">
                                <g>
                                    <path
                                        d="M1.426,8.313c-1.901-1.901-1.901-4.984,0-6.886c1.901-1.902,4.984-1.902,6.886,0l53.127,53.127l53.127-53.127 c1.901-1.902,4.984-1.902,6.887,0c1.901,1.901,1.901,4.985,0,6.886L68.324,61.439l53.128,53.128c1.901,1.901,1.901,4.984,0,6.886 c-1.902,1.902-4.985,1.902-6.887,0L61.438,68.326L8.312,121.453c-1.901,1.902-4.984,1.902-6.886,0 c-1.901-1.901-1.901-4.984,0-6.886l53.127-53.128L1.426,8.313L1.426,8.313z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <nav class="mobile-main-nav">
                        <ul id="menu-mobile" class="menu">
                            <li class="menu-item menu-item-has-children-mobile current-item-mobile">
                                <a href="#dropdown-menu-1" data-bs-toggle="collapse" class="collapsed">Homepage</a>
                                <div id="dropdown-menu-1" class="collapse" data-bs-parent="#menu-mobile">
                                    <ul class="sub-menu-mobile">
                                        <li class="menu-item current-item-mobile">
                                            <a href="index.html">Homepage 1</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="home-2.html">Homepage 2</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="home-3.html">Homepage 3</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="home-4.html">Homepage 4</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="home-5.html">Homepage 5</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="menu-item menu-item-has-children-mobile">
                                <a href="#dropdown-menu-2" data-bs-toggle="collapse" class="collapsed">Tour List</a>
                                <div id="dropdown-menu-2" class="collapse" data-bs-parent="#menu-mobile">
                                    <ul class="sub-menu-mobile">
                                        <li class="menu-item menu-item-has-children-mobile2">
                                            <a href="#sub-product-1" class="fw-6 text-body-3 item-menu-mobile collapsed" data-bs-toggle="collapse">Layout</a>
                                            <div id="sub-product-1" class=" collapse" data-bs-parent="#dropdown-menu-2">
                                                   <ul class="sub-menu-mobile2 ">
                                                    <li class="menu-item"><a href="listing-tours-pagination.html">Grid Style – Full Width</a></li>
                                                    <li class="menu-item"><a href="list-tour-sidebar-left.html">Grid Sidebar Left</a></li>
                                                    <li class="menu-item"><a href="listing-tours-pagination-2.html">List Style – Full Width</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="menu-item menu-item-has-children-mobile2">
                                            <a href="#sub-product-2" class="fw-6 text-body-3 item-menu-mobile collapsed" data-bs-toggle="collapse"> Feature </a>
                                            <div id="sub-product-2" class="collapse" data-bs-parent="#dropdown-menu-2">
                                                <ul class="sub-menu-mobile2 ">
                                                <li class="menu-item"><a href="listing-tours-pagination.html">Pagination Grid</a></li>
                                                <li class="menu-item"><a href="listing-tours-pagination-2.html">Pagination List</a></li>
                                                <li class="menu-item"><a href="listing-tours-pagination-3.html">Pagination Grid Style 2</a></li>
                                                <li class="menu-item"><a href="listing-tours-loadmore.html">Pagination Load More</a></li>
                                                <li class="menu-item"><a href="listing-tours-topmap-1.html">List Tours – Top Map 1</a></li>
                                                <li class="menu-item"><a href="listing-tours-topmap-2.html">List Tours – Top Map 2</a></li>
                                                <li class="menu-item"><a href="listing-tours-topmap-3.html">List Tours – Top Map 3</a></li>
                                                <li class="menu-item"><a href="list-tour-sidebar-left.html">List Tour – Sidebar Left</a></li>
                                                <li class="menu-item"><a href="list-tour-sidebar-left-2.html">List Tour – Sidebar Left 2</a>
                                                </li>
                                            </ul>
                                            </div>
                                           
                                        </li>
                                        <li class="menu-item menu-item-has-children-mobile2">
                                            <a href="#sub-product-3" class="fw-6 text-body-3 item-menu-mobile collapsed" data-bs-toggle="collapse">Tour Styles</a>
                                            <div id="sub-product-3" class="collapse" data-bs-parent="#dropdown-menu-2">
                                                <ul class="sub-menu-mobile2" >
                                                    <li class="menu-item"><a href="listing-tours-pagination-2.html">List Style</a></li>
                                                    <li class="menu-item"><a href="listing-tours-pagination.html">Grid Style 01</a></li>
                                                    <li class="menu-item"><a href="listing-tours-pagination-3.html">Grid Style 02</a></li>
                                                </ul>
                                            </div>
                                           
                                        </li>
                                        <li class="menu-item menu-item-has-children-mobile2">
                                            <a href="#sub-product-4" class="fw-6 text-body-3 item-menu-mobile collapsed" data-bs-toggle="collapse">Tour Details</a>
                                            <div id="sub-product-4" class="collapse" data-bs-parent="#dropdown-menu-2">
                                                <ul class="sub-menu-mobile2">
                                                <li class="menu-item"><a href="tours-details-1.html">Style 01</a></li>
                                                <li class="menu-item"><a href="tours-details-2.html">Style 02</a></li>
                                            </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="menu-item menu-item-has-children-mobile">
                                <a href="#dropdown-menu-3" data-bs-toggle="collapse" class="collapsed">Destination</a>
                                <div id="dropdown-menu-3" class="collapse" data-bs-parent="#menu-mobile">
                                    <ul class="sub-menu-mobile">
                                        <li class="menu-item">
                                            <a href="destination-style-1.html">Destination Style 01</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="destination-style-2.html">Destination Style 02</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="destination-style-3.html">Destination Style 03</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="destination-details.html">Destination Details</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="menu-item menu-item-has-children-mobile">
                                <a href="#dropdown-menu-4" data-bs-toggle="collapse" class="collapsed">Blog</a>
                                <div id="dropdown-menu-4" class="collapse" data-bs-parent="#menu-mobile">
                                    <ul class="sub-menu-mobile">
                                        <li class="menu-item">
                                            <a href="blog-defaults.html">Blog Defaults</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="blog-post.html">Blog Detail</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="menu-item menu-item-has-children-mobile">
                                <a href="#dropdown-menu-5" data-bs-toggle="collapse" class="collapsed">Pages</a>
                                <div id="dropdown-menu-5" class="collapse" data-bs-parent="#menu-mobile">
                                    <ul class="sub-menu-mobile">
                                        <li class="menu-item">
                                            <a href="about-us.html">About Us</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="our-team.html">Our Teams</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="FAQ.html">FAQs</a>
                                        </li>
    
                                    </ul>
                                </div>
                            </li>
                            <li class="menu-item">
                                <a href="contact-us.html">Contact Us</a>
                            </li>
                        </ul>
                        <ul id="contact-us-mobile" class="menu">
                            <li class="menu-item text-body-2 fw-6">
                                Welcome to Epictrips
                            </li>
                            <li>
                                <div class="details-section">
                                    <div class="phone details-content pb-10">
                                        <div class="title text-body-3 fw-6">
                                            Phone:
                                        </div>
                                        <div class="sub-title text-body-3 numberphone">
                                            <a href="#">+1 666 234 8888</a>
                                        </div>
                                    </div>
                                    <div class="email details-content pb-10">
                                        <div class="title text-body-3 fw-6">
                                            Email:
                                        </div>
                                        <div class="sub-title text-body-3 address-email">
                                            themeflat@gmail.com
                                        </div>
                                    </div>
                                    <div class="address details-content pb-10">
                                        <div class="title text-body-3 fw-6">
                                            Address:
                                        </div>
                                        <div class="sub-title text-body-3">
                                            2163 Phillips Gap Rd, West Jefferson, North Carolina, United States
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header><!-- /.header -->

        <!-- Page-title-home -->
        <div class="page-title-home style-1">
            <div class="swiper-container page-title-home-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="page-title-home-inner page-title-home-1">
                            <div class="tf-container">
                                <div class="row">
                                    <div class="col-xxl-7">
                                        <div class="page-title-home-content">
                                            <h1 class="title fw-6 tf-fade-top fade-item-3" style="color:black; ">
                                            <?php   echo "番剧推荐系统"  ?> </h1>
                                            <h6 class="sub-title tf-fade-top fade-item-2" style="color:black; "> 学科实践项目</h6>
                                            <a href="#start-pos" class="tf-btn color-white tf-fade-top fade-item-1" style="color:black; ">点击这里开始</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="page-title-home-inner page-title-home-2">
                            <div class="tf-container">
                                <div class="row">
                                    <div class="col-xxl-7">
                                        <div class="page-title-home-content">
                                            <h1 class="title fw-6 tf-fade-top fade-item-3">番剧推荐系统
                                            </h1>
                                            <h6 class="sub-title tf-fade-top fade-item-2">快来看看今天有什么好看的番剧吧！</h6>
                                            <a href="#start-pos" class="tf-btn color-white tf-fade-top fade-item-1">点击这里开始</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="slider-page-title-home-prev home-prev btn-arrow btn-arrow-page-title">
                    <i class="icon-back1"></i>
                </div>
                <div class="slider-page-title-home-next home-next btn-arrow btn-arrow-page-title">
                    <i class="icon-next1"></i>
                </div>
            </div>
        </div><!-- /.page-title-home -->

        <!-- Main-content -->
        <div class="main-content">
            <!-- Section-form-search -->
            <section class="section-form-search tf-spacing-4">
                <div class="tf-container" id="start-pos">
                    <div class="row">
                        <div class="col-12">
                            <form action="search.php" class="form-search">
                                <div class="list">
                                    <div class="group-form form-search-content">
                                        <div class="form-location">
                                            <div class="text-body-3 title fw-6">地区</div>
                                            <div class="nice-select">
                                                <span class="current">选择地区</span>
                                                <ul class="list">
                                                    <li class="option option-all">请选择地区</li>
                                                    <li class="option">国漫</li>
                                                    <li class="option">日漫</li>
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="line"></div>
                                        <div class="form-tour-type">
                                            <div class="text-body-3 title fw-6">种类</div>
                                            <div class="nice-select" tabindex="0">
                                                <span class="current">请选择种类</span>
                                                <ul class="list">
                                                    <li data-value="select-type" class="option">- 请选择种类 -</li>
                                                    <li data-value="adventure" class="option">冒险</li>
                                                    <li data-value="discovery" class="option">科幻</li>
                                                    <li data-value="beach" class="option">穿越</li>
                                                    <li data-value="wildlife" class="option">校园</li>
                                                    <li data-value="camping" class="option">恋爱</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="line"></div>
                                        
                                            <div class="btn-search">
                                                <button type="submit" class="tf-btn-search text-body-3">
                                                    <i class="icon-search3"></i> Search
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section><!-- /.section-form-search -->

            <!-- Section-recommended -->
            <section class="section-recommended tf-spacing-10">
                <div class="tf-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="heading-section text-center">
                                <h3 class="title fw-6 pb-12 wow fadeInUp">
                                    为你推荐
                                </h3>
                                
                            </div>
                            <div class="swiper-container tour-grid-swiper">
                                <div class="swiper-wrapper">
                                    
                                    <?php 
                                         $command = "python3 /home/hadoop/workspace/Xuekeshijian/main.py -id $userid 2>&1"; 
                                         $output = shell_exec($command); 
                                        $idArray = explode(" ", $output); 
                                        $id = array(); 
                                        $img_url = array(); 
                                        $rating = array(); 
                                        $name = array(); 
                                        $label = array(); 
                                        $summary = array(); 
                                        for($i = 0; $i <= 7; $i++){
                                            $command = "select * from anime where id = '$idArray[$i]'"; 
                                            $result = $conn->query($command);
                                           
                                            if($result->num_rows == 0){
                                               
                                            }
                                            else{
                                                $row = $result->fetch_assoc();
                                                $id[] = $row["id"]; 
                                                $rating[] = $row["rating"]; 
                                                $name[] = $row["title"]; 
                                                $summary[] = $row["summary"]; 
                                                $maxLength = 20; // 指定的最大长度
                                                $genre = $row["genre"]; 

                                                $genre[0] = '{'; 
                                                $genre[strlen($genre)-1] = '}'; 
                                                $jsonString = str_replace(['{', '}', '\''], ['[', ']', '"'], $genre);
                                                // echo $jsonString; 
                                                $genres = json_decode($jsonString);
                                                $label[] = implode(" | ", $genres); 
                                          
                                                $local_path = "/var/www/html/shijian/images/".$row["id"].".jpg";
                                                if (file_exists($local_path)) {
                                                    // do nothing
                                                } else {
                                                    $hdfsPath = $hdfsPath_base.$row['id'].".jpg"; 
                                                    fetchImagesFromHDFS($hdfsPath, $localDir_base);  
                                                }
                                               
                                               
                                                $img_url[] = "http://10.26.63.81/shijian/images/".(string)$row['id'].".jpg";
                                            }
                                        }
                                
                                        for($i = 0; $i <= 7; $i++){ 
                                            $cnt = $i + 1; 
                                            echo ' <div class="swiper-slide">
                                            <div class="tour-grid hover-img">
                                            <div class="image">
                                                <a href="http://10.26.63.81/shijian/details/detail.php?id='.$id[$i].'">
                                                    <img src="'.$img_url[$i].'"
                                                        data-src="'.$img_url[$i].'" alt=""
                                                        class="lazyload">
                                                </a>
                                                <div class="heart tf-action-btns">
                                                </div>
                                             
                                                <span class="number caption-1">
                                                    '.$cnt.'/8
                                                </span>
                                            </div>
                                            <div class="tour-grid-content">
                                                <div class="top">
                                                    <div class="map-ping">
                                                        
                                                        <a class="text-body-3 text">标签：'.$label[$i].'</a>
                                                    </div>
                                                    <div class="rating">
                                                        <div class="number text-body-3 fw-6">'.$rating[$i].'</div>
                                                        <i class="icon-star1"></i>
                                                    </div>
                                                </div>
                                                <div class="title text-body-2 fw-6">
                                                    <a href="tours-details-2.html">'.$name[$i].'</a>
                                                </div>
                                                <div class="tour-grid-details">
                                                    <a class="people text-body-3">
                                                        
                                                    </a>
                                                    
                                                </div>
                                                <div class="price text-body-3">
                                                    简介: <span class="text-body-2 fw-1" style="font-size: 16px; ">'.$summary[$i].'</span>
                                                </div>
                                            </div>
                                        </div>
                                        </div>'; 
                                        }
                                        ?>
                                  
                                                                    </div>
                                <div class="bottom-slide">
                                    <div class="swiper-pagination pagination-tour-grid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- /.section-recommended -->

        </div><!-- /.main-content -->

        <!-- Login -->
        <!-- <div class="offcanvas offcanvas-bottom offcanvas-login" id="canvasLogin">
            <div class="wg-login wg-popup fw-6">
                <button class="btn-close-login" type="button" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="icon-close1"></i>
                </button>
                <h4 class="title">
                    <span class="login">Login</span>
                    <span class="register" href="#canvasRegister" data-bs-toggle="offcanvas">Register</span>
                </h4>
                <form action="login.php" method="POST">
                    <fieldset class="input-text input-name">
                        <label class="text-body-3 fw-4" for="name-login">Username or email address<span>*</span></label>
                        <input class="text-body-3" type="text" name="username" id="name-login" value="" required>
                    </fieldset>
                    <fieldset class="input-text input-pass">
                        <label class="text-body-3 fw-4" for="pass-login">Password<span>*</span></label>
                        <input class="text-body-3" type="password" name="password" id="pass-login" required>
                        <div class="icon toggle-password">
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.1073 8.3916L7.89063 12.6083C7.34896 12.0666 7.01562 11.3249 7.01562 10.4999C7.01562 8.84993 8.34896 7.5166 9.99896 7.5166C10.824 7.5166 11.5656 7.84994 12.1073 8.3916Z"
                                    stroke="#64666C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M14.8518 5.3084C13.3935 4.2084 11.7268 3.6084 10.0018 3.6084C7.06016 3.6084 4.31849 5.34173 2.41016 8.34173C1.66016 9.51673 1.66016 11.4917 2.41016 12.6667C3.06849 13.7001 3.83516 14.5917 4.66849 15.3084"
                                    stroke="#64666C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M7.01562 16.7751C7.96563 17.1751 8.97396 17.3917 9.99896 17.3917C12.9406 17.3917 15.6823 15.6584 17.5906 12.6584C18.3406 11.4834 18.3406 9.5084 17.5906 8.3334C17.3156 7.90006 17.0156 7.49173 16.7073 7.1084"
                                    stroke="#64666C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12.9242 11.083C12.7076 12.258 11.7492 13.2163 10.5742 13.433" stroke="#64666C"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7.89297 12.6084L1.66797 18.8334" stroke="#64666C" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M18.3344 2.16699L12.1094 8.39199" stroke="#64666C" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </fieldset>
                    <div class="remember-fogotpassword">
                        <div class="remember check-box">
                            <input type="checkbox" name="remember" id="remember">
                            <label class="text-body-3 fw-4" for="remember">Remember me</label>
                        </div>
                        <a href="#" class="fw-4 text-body-3">Forgot password?</a>
                    </div>
                    <div class="btn-login btn-popup">
                        <button type="submit" class="tf-btn color-primary text-body-3">Login</button>
                    </div>
                </form>
                <div class="text text-body-3 fw-4">
                    Not registered yet? <a href="#canvasRegister" data-bs-toggle="offcanvas" class="fw-6">Sign Up</a>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const passwordInput = document.getElementById('pass-login');
                    const togglePasswordIcon = document.querySelector('.toggle-password');
                
                    togglePasswordIcon.addEventListener('click', function () {
                        // 切换密码输入框的类型
                        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                        passwordInput.setAttribute('type', type);
                
                        // 可选：切换图标（如果你想要图标在显示和隐藏密码时有所不同）
                        // 这里你可以添加逻辑来更改图标的样式或类名
                    });
                });
            </script>

        </div> -->
        <!-- /.login -->


        <!-- Register -->
<!-- <div class="offcanvas offcanvas-bottom offcanvas-register" id="canvasRegister">
    <div class="wg-register wg-popup fw-6">
        <button class="btn-close-register" type="button" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="icon-close1"></i>
        </button>
        <h4 class="title">
            <span class="login" href="#canvasLogin" data-bs-toggle="offcanvas">Login</span>
            <span class="register">Register</span>
        </h4>
        <form action="register.php" method="post">
            <fieldset class="input-text input-name">
                <label class="text-body-3 fw-4" for="name-register">Username or email address<span>*</span></label>
                <input class="text-body-3" type="text" name="username" id="name-register" required>
            </fieldset>
            <fieldset class="input-text input-pass">
                <label class="text-body-3 fw-4" for="pass-register">Password<span>*</span></label>
                <input class="text-body-3"  type="password" name="password" id="pass-register" required>
                <div class="icon toggle-password2">
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.1073 8.3916L7.89063 12.6083C7.34896 12.0666 7.01562 11.3249 7.01562 10.4999C7.01562 8.84993 8.34896 7.5166 9.99896 7.5166C10.824 7.5166 11.5656 7.84994 12.1073 8.3916Z"
                            stroke="#64666C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M14.8518 5.3084C13.3935 4.2084 11.7268 3.6084 10.0018 3.6084C7.06016 3.6084 4.31849 5.34173 2.41016 8.34173C1.66016 9.51673 1.66016 11.4917 2.41016 12.6667C3.06849 13.7001 3.83516 14.5917 4.66849 15.3084"
                            stroke="#64666C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M7.01562 16.7751C7.96563 17.1751 8.97396 17.3917 9.99896 17.3917C12.9406 17.3917 15.6823 15.6584 17.5906 12.6584C18.3406 11.4834 18.3406 9.5084 17.5906 8.3334C17.3156 7.90006 17.0156 7.49173 16.7073 7.1084"
                            stroke="#64666C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12.9242 11.083C12.7076 12.258 11.7492 13.2163 10.5742 13.433" stroke="#64666C"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7.89297 12.6084L1.66797 18.8334" stroke="#64666C" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M18.3344 2.16699L12.1094 8.39199" stroke="#64666C" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                
            </fieldset>
            <fieldset class="input-text input-pass">
                <label class="text-body-3 fw-4" for="pass-confirm">Confirm Password<span>*</span></label>
                <input class="text-body-3" type="password" name="confirm_password" id="pass-confirm" required>
                <div class="icon toggle-password3">
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.1073 8.3916L7.89063 12.6083C7.34896 12.0666 7.01562 11.3249 7.01562 10.4999C7.01562 8.84993 8.34896 7.5166 9.99896 7.5166C10.824 7.5166 11.5656 7.84994 12.1073 8.3916Z"
                            stroke="#64666C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M14.8518 5.3084C13.3935 4.2084 11.7268 3.6084 10.0018 3.6084C7.06016 3.6084 4.31849 5.34173 2.41016 8.34173C1.66016 9.51673 1.66016 11.4917 2.41016 12.6667C3.06849 13.7001 3.83516 14.5917 4.66849 15.3084"
                            stroke="#64666C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M7.01562 16.7751C7.96563 17.1751 8.97396 17.3917 9.99896 17.3917C12.9406 17.3917 15.6823 15.6584 17.5906 12.6584C18.3406 11.4834 18.3406 9.5084 17.5906 8.3334C17.3156 7.90006 17.0156 7.49173 16.7073 7.1084"
                            stroke="#64666C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12.9242 11.083C12.7076 12.258 11.7492 13.2163 10.5742 13.433" stroke="#64666C"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7.89297 12.6084L1.66797 18.8334" stroke="#64666C" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M18.3344 2.16699L12.1094 8.39199" stroke="#64666C" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </fieldset>
            
            提交按钮 -->
            <!-- <div class="btn-register btn-popup">
                <button type="submit" class="tf-btn color-primary text-body-3">Create a new account</button>
            </div>
            
            <div class="text text-body-3 fw-4">
                Already have an account? <a href="#canvasLogin" data-bs-toggle="offcanvas" class="fw-6">Login Here</a>
            </div>
        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const passwordInput = document.getElementById('pass-register');
                const togglePasswordIcon = document.querySelector('.toggle-password2');
            
                togglePasswordIcon.addEventListener('click', function () {
                    // 切换密码输入框的类型
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
            
                    // 可选：切换图标（如果你想要图标在显示和隐藏密码时有所不同）
                    // 这里你可以添加逻辑来更改图标的样式或类名
                });
            });
        </script>

        <script>
        
                document.addEventListener('DOMContentLoaded', function () {
                    const passwordInput = document.getElementById('pass-confirm');
                    const togglePasswordIcon = document.querySelector('.toggle-password3');
                
                    togglePasswordIcon.addEventListener('click', function () {
                        // 切换密码输入框的类型
                        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                        passwordInput.setAttribute('type', type);
                
                        // 可选：切换图标（如果你想要图标在显示和隐藏密码时有所不同）
                        // 这里你可以添加逻辑来更改图标的样式或类名
                    });
                });
         
        </script>
    </div> 
  
</div>  -->
<!-- /.register -->

                    <!-- Choose -->
                <div class="offcanvas offcanvas-bottom offcanvas-choose" id="canvasChoose">
                    <div class="wg-login wg-popup fw-6">
                        <button class="btn-close-login" type="button" data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="icon-close1"></i>
                        </button>
                        <h4 class="title">
                            请选择你的喜好:
                        </h4>
                        <form action="genre.php" method="POST">
                            <!-- 添加单选按钮作为选择项 -->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="preference" id="preference1" value="option1">
                                <label class="form-check-label" for="preference1">
                                    选项 1
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="preference" id="preference2" value="option2">
                                <label class="form-check-label" for="preference2">
                                    选项 2
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="preference" id="preference3" value="option3">
                                <label class="form-check-label" for="preference3">
                                    选项 3
                                </label>
                            </div>
                            <!-- 提交按钮 -->
                            <button type="submit" class="btn btn-primary">提交</button>
                        </form>
                        <div class="text text-body-3 fw-4">
                            Not registered yet? <a href="#canvasRegister" data-bs-toggle="offcanvas" class="fw-6">Sign Up</a>
                        </div>
                    </div>
                </div>
                <!-- /.choose -->

        <!-- Go-top -->
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                    style="transition: stroke-dashoffset 10ms linear; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 277.672;">
                </path>
            </svg>
        </div><!-- /.go-top -->

    </div><!-- /.wrapper -->

    <!-- Javascript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/lazysize.min.js"></script>
    <script type="text/javascript" src="js/jquery.nice-select.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/magnific-popup.min.js"></script>
    <script type="text/javascript" src="js/rangle-slider.js"></script>
    <script type="text/javascript" src="js/nouislider.min.js"></script>
    <script type="text/javascript" src="js/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="js/swiper.js"></script>

    <script type="text/javascript" src="js/main.js"></script>
    <!-- /Javascript -->


</body>

</html>
