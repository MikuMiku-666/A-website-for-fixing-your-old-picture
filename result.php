<!DOCTYPE html>

<html lang="en">
  <head>

  <?php
                                    $filename = basename(__FILE__);
                                    
                                    // 检查文件名是否以 'result' 开头并以 '.php' 结尾
                                    if (strpos($filename, 'result') === 0 && strpos($filename, '.php') !== false) {
                                        // 提取 'result' 和 '.php' 之间的部分
                                        $extracted_part = substr(
                                            $filename,
                                            strlen('result'), // 从 'result' 的长度后开始
                                            strpos($filename, '.php') - strlen('result') // 到 '.php' 之前的位置
                                        );
                                    
                                        echo "Extracted part: " . $extracted_part; 
                                    } else {
                                        echo "Filename does not match the expected pattern.";
                                    }
                                    
                                     $folderPath = "uploads/".$extracted_part; 
                                     echo $folderPath; 
                                     //echo $folderPath; 
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
                                $model = array("原图", "realesrgan-ncnn-vulkan", "锐化算法", "普通去噪", 
                            "inference_gfpgan", "colorization"); 
                                if(count($images)>1) {
                                    $count = 0; 
                                    echo "还在调试，别急"; 
                                } else {
                                    echo "图片生成出错，请重试";
                                   echo '<meta http-equiv="refresh" content="0;url=http://10.26.63.81/workerror.html">'; 
                                   exit; 
                                }
                                // exit;
                            ?>                           

    <meta charset="UTF-8">
    <meta name="description" content="html template">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Asad">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>图片处理结果</title>

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
                                        <h2 class="breadcrumb-title tp_has_text_reveal_anim">Result</h2>
                                        <h6 class="breadcrumb-title tp_has_text_reveal_anim">图片保存 5 分钟，请尽快下载 </h6>
                                        <div class="breadcrumb-list tp_fade_left">
                                            <a href="index.html"><i class="fa-light fa-house"></i>Home</a>
                                            <span>Result</span>
                                        </div>
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

                    
                     <!-- team area start -->
                    <section class="inner_team-area pt-140">
                        <div class="container">
                            <div class="row">
                            <?php   
                                    $image = $images[$count]; 
                                    // foreach($images as $image) {
                                        echo '<div style="margin: 0 auto; display: inline-block;">';
                                        echo '<img src="'.$folderPath.'/'.$image.'" alt="'.$image.'" style="max-width: 200px; max-height: 200px; display: block; margin-bottom: 5px;">';
                                        echo '<p>'.$model[$count].'</p>';
                                        echo '</div>';
                                        $count += 1; 
                                    // }
                                
                                // exit;
                                exit; 
                            ?>
                                    
                            </div>
                        </div>
                        <div class="inner_team-shape">
                            <img src="assets/images/team/shape-2.png" alt="Image Not Found" class="inner_team-shape-1" data-speed="0.8">
          
                        </div>
                    </section>
                    <!-- team area end -->
                    <!-- team member area start -->
                    
                    <!-- team member area end -->

                    <!-- bottom img  -->
                    <div class="inner_team-bottom-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- bottom img  -->
                </main>
            
                <!-- footer area start -->
                <footer class="h5_footer-area">
                    
                  
                    <div class="h5_footer-bottom">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-xl-6 col-md-6">
                                    <div class="h5_footer-bottom-copyright d-flex justify-content-center justify-content-md-start">
                                       
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="h5_footer-bottom-menu d-flex justify-content-center justify-content-md-end">
                                        <ul>
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- footer area end -->

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
