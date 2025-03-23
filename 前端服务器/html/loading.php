<!DOCTYPE html>

<html lang="en">
  <head>
    
<?php
 if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $uploadDir = 'uploads/'; // 图片保存目录
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true); // 如果目录不存在，创建目录
    }
    $resolution = isset($_POST['resolution']) ? $_POST['resolution'] : 'false';
    $file = $_FILES['file'];  
    $newfolder = uniqid(); 
    $originalFileName = basename($file['name']);
    $info = pathinfo($originalFileName); 
    $fileName = $newfolder . '.' . $info['extension']; // 注意加上了点（.）来连接文件夹名和文件扩展名
    $folderPath = $uploadDir . "/" . $newfolder . "/";
    $targetPath = $folderPath . $fileName;
    if(!is_dir($folderPath)) {
        mkdir($folderPath, 0755, true); // 如果目录不存在，创建目录
    }
    // 检查文件类型
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif','image/jpg','image/bmp'];
    if (!in_array($file['type'], $allowedTypes)) {
        die('只允许上传 JPEG, JPG , PNG, BMP 和 GIF 格式的图片。');
    }
    // 移动上传文件到目标路径
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        // 重定向到主页面，并传递图片路径
        $flag_res = 0; 
        if($resolution == 'false')
            $flag_res = 0; 
        else $flag_res = 1; 
        $py_path = "./program/client.py"; 
        $img_path = "./" . $targetPath;
        $command = "python3 " . $py_path . " " . $img_path . " " . $flag_res; 
        $newphp = "./result".$newfolder.".php"; 
        copy("./result.php", $newphp); 
        session_start();
        $_SESSION['command'] = $command;
        $_SESSION['newphp'] = $newphp;
        $_SESSION['fpath'] = $folderPath; 
        $_SESSION['imgpath'] = $img_path; 
        $_SESSION['resolution'] = $resolution; 
        echo '<meta http-equiv="refresh" content="0;url=http://10.26.63.81/working.php">'; 
       
    } else {
        die('文件上传失败，请重试。');
    }
} else {
    die('无效的请求。');
}
?>                    
 

    <meta charset="UTF-8">
    <meta name="description" content="html template">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Asad">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>处理中</title>

    <link rel="icon" href="assets/images/favicon.png">
    <link rel="apple-touch-icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/css/all.min.css"> 
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css"> 
    <link rel="stylesheet" href="assets/css/meanmenu.css"> 
    <link rel="stylesheet" href="assets/css/magnific-popup.css"> 
    <link rel="stylesheet" href="assets/css/nice-select.css"> 
    <link rel="stylesheet" href="assets/css/backtotop.css"> 
    <link rel="stylesheet" href="assets/css/main.css"> 

  </head>
  <body>

    <!-- Cursor start -->
    <div class="rts-cursor cursor-outer" data-default="yes" data-link="yes" data-slider="no">
        <span class="fn-cursor"></span>
    </div>
     
             
    <div class="rts-cursor cursor-inner" data-default="yes" data-link="yes" data-slider="no">
        <span class="fn-cursor">
        <span class="fn-left"></span>
        <span class="fn-right"></span>
        </span>
    </div>
    <!-- Cursor end -->

    <!-- back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
           <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- back to top end -->

    <!-- modal-search-start -->
    <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <a href="javascript:void(0)" type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
        </a>
        <div class="modal-dialog" role="document">
           <div class="modal-content">
              <form>
                    <input type="text" placeholder="Search here...">
                    <button>
                       <i class="fa fa-search"></i>
                    </button>
              </form>
           </div>
        </div>
    </div>
    <!-- modal-search-end -->
    
    <!-- sidebar-information-area-start -->
    <div class="sidebar-info side-info">
        <div class="sidebar-logo-wrapper mb-25">
            <div class="row align-items-center">
                <div class="col-xl-6 col-8">
                    <div class="sidebar-logo">
                        <a href="index.html"><img src="assets/images/logo/logo-w.png" alt="logo-img"></a>
                    </div>
                </div>
                <div class="col-xl-6 col-4">
                    <div class="sidebar-close-wrapper text-end">
                        <button class="sidebar-close side-info-close"><i class="fal fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-menu-wrapper fix">
            <div class="mobile-menu"></div>
        </div>
    </div>
    <div class="offcanvas-overlay"></div>
    <!-- sidebar-information-area-end -->

    <div class="has-smooth" id="has_smooth"></div>
    
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div class="body-wrapper">

            <header class="header-area">
                    
                    <div class="h5_header-bottom header-sticky" >
                        <div class="container custom-container-1">
                            <div class="row align-items-center">
                                <div class="col-xl-2 col-lg-2 col-6">
                                    
                                </div>
                                <div class="col-xl-7 col-lg-7 text-center d-none d-lg-block">
                                    <div class="header-menu ">
                                        <nav class="header-nav-menu" id="mobile-menu">
                                            <ul>
                                                <li>
                                                    <a href="index.html" style="font-size: 15px;">Home</a>
                                                   
                                                </li>

                                                <li class="menu-has-child">
                                                    <a style="font-size: 15px;">实现内容</a>
                                                    <ul class="submenu">
                                                        <li><a href="protocol.html" style="font-size: 15px;">图片传输协议</a></li>
                                                        <li><a href="process.html" style="font-size: 15px;">处理流程图</a></li>
                    
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="about.html" style="font-size: 15px;">关于</a>
                                                   
                                                </li>
            
                                                
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-6">
                                    <div class="header-action-wrap d-flex align-items-center justify-content-end">
                                        <div class="header-action d-none d-sm-flex">
                                            
                                        </div>
                                        <div class="header-menu-bar d-lg-none ml-10">
                                            <span class="header-menu-bar-icon side-toggle">
                                                <i class="fa-light fa-bars"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <main>
                    <!-- breadcrumb area start -->
                    <section class="breadcrumb-area bg-default" data-background="assets/images/breadcrumb/breadcrumb-bg.jpg">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="breadcrumb-content text-center">
                                        <h2 class="breadcrumb-title tp_has_text_reveal_anim">处理中</h2>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="breadcrumb-shape">
                            <img src="assets/images/breadcrumb/shape-1.png" alt="" class="breadcrumb-shape-1" data-speed="0.9">
                            <img src="assets/images/breadcrumb/shape-2.png" alt="" class="breadcrumb-shape-2" data-speed="0.8">
                            <img src="assets/images/breadcrumb/shape-3.png" alt="" class="breadcrumb-shape-3" data-speed="0.9">
                            <img src="assets/images/breadcrumb/circle.png" alt="" class="breadcrumb-shape-4">
                        </div>
                    </section>
                    <!-- breadcrumb area end -->

                    <!-- error area start -->
                    <section class="error-area pt-140 pb-140">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-6">
                                    <div class="error-wrap text-center">
                                        
                                        <div class="error-content">
                                            <h2 class="error-content-title tp_has_text_reveal_anim">后台正在加急处理中</h2>
                                            <h2 class="error-content-title tp_has_text_reveal_anim">请稍等(〃'▽'〃)</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- error area end -->
                </main>
            
                <!-- footer area start -->
                <footer class="h5_footer-area">
                </footer>

            </div>
        </div>
    </div>


    <!-- jQuery Js -->
    <script src="http://10.26.63.81/assets/js/jquery-3.6.0.min.js"></script>
    <script src="http://10.26.63.81/assets/js/bootstrap.bundle.min.js"></script> 
    <script src="http://10.26.63.81/assets/js/swiper-bundle.min.js"></script>
    <script src="http://10.26.63.81/assets/js/meanmenu.min.js"></script>
    <script src="http://10.26.63.81/assets/js/gsap.min.js"></script>
    <script src="http://10.26.63.81/assets/js/ScrollSmoother.min.js"></script>
    <script src="http://10.26.63.81/assets/js/ScrollTrigger.min.js"></script>
    <script src="http://10.26.63.81/assets/js/TweenMax.min.js"></script>
    <script src="http://10.26.63.81/assets/js/SplitText.min.js"></script>
    <script src="http://10.26.63.81/assets/js/chroma.min.js"></script>
    <script src="http://10.26.63.81/assets/js/magnific-popup.min.js"></script>
    <script src="http://10.26.63.81/assets/js/nice-select.min.js"></script>
    <script src="http://10.26.63.81/assets/js/backtotop.js"></script>
    <script src="http://10.26.63.81/assets/js/main.js"></script>
 
  </body>

</html>
