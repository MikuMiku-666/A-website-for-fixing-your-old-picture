<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="html template">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Asad">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Our own image server!</title>

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
                    <!-- banner area start -->
                    <section class="banner-area">
                        <div class="container custom-container-1">
                            <div class="banner-single-2">
                            <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="breadcrumb-content text-center">
                                        <h2 class="breadcrumb-title tp_has_text_reveal_anim">Workspace</h2>
                                        <div class="breadcrumb-list tp_fade_left">
                                            <a href="index.html"><i class="fa-light fa-house"></i>Home</a>
                                            <span>Workspace</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="banner-content-2">
                        <div id="image-box">
        <?php
        if (isset($_GET['image'])) {
            $imagePath = htmlspecialchars($_GET['image']);
            echo "<img src='$imagePath' alt='Uploaded Image'>";
        } else {
            echo "<span>请上传图片</span>";
        }
        ?>
    </div>
    <div class="banner-content-3">
    <form action="loading.php" method="post" enctype="multipart/form-data" class="horizontal-form">
    <div class="banner-content-btn-2">
        <!-- <label for="file">选择图片：</label> -->
        <!-- <input type="file" class ="h2_banner-form" name="file" id="file" accept="image/*" required > -->
        <div class="custom-file-input-container">
            <div class="custom-file-input">
                <input type="file" name="file" class="custom-file-input" id="file" accept="image/*" required>
                <label for="file">选择图片</label>
            </div>
        <span id="file-name" style="margin-left: 10px;"></span>
        </div>
    </div>
        <label for="highResolution">
            Enable High Resolution:
            <input type="checkbox" id="highResolution" name="resolution" value="true">
        </label>
        <div class="banner-content-btn-2">
            <button type="submit"  class="theme-btn-3">上传图片</button>    
        </div>
        <!-- <button type="submit" id="upload-label">上传图片</button> -->
    </form>
    </div> 
    </div> 
                        
                                <!-- <div class="banner-content">
                                    <span class="banner-content-subtitle tp_fade_left">图片修复生成器</span>
                                    <h1 class="banner-content-title tp_has_text_reveal_anim">Best For Fixing your old photos</h1> -->
                                    
                                    <!-- <div class="banner-content-btn">
                                        <a href="main_test.php" class="theme-btn tp_fade_bottom">Start now!</a>

                                    </div> -->
                                <!-- </div> -->
                                <!-- <div class="banner-img tp_fade_left">

                                    
                                </div> -->
                            </div>
                        </div>
                        <div class="banner-shape d-none d-lg-block">
                            <img src="assets/images/banner/home1/shape-1.png" alt="Image Not Found" class="banner-shape-1" data-speed="0.7">
                            <img src="assets/images/banner/home1/shape-2.png" alt="Image Not Found" class="banner-shape-2" data-speed="0.8">
                            <img src="assets/images/banner/home1/shape-3.png" alt="Image Not Found" class="banner-shape-3" data-speed="0.8">
                            <img src="assets/images/banner/home1/shape-4.png" alt="Image Not Found" class="banner-shape-4" data-speed="0.7">
                            <img src="assets/images/banner/home1/shape-5.png" alt="Image Not Found" class="banner-shape-5">
                        </div>
                    </section>
                   

            </div>
        </div>
    </div>


    <!-- jQuery Js -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script> 
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/meanmenu.min.js"></script>
    <script src="assets/js/gsap.min.js"></script>
    <script src="assets/js/ScrollSmoother.min.js"></script>
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <script src="assets/js/TweenMax.min.js"></script>
    <script src="assets/js/SplitText.min.js"></script>
    <script src="assets/js/chroma.min.js"></script>
    <script src="assets/js/magnific-popup.min.js"></script>
    <script src="assets/js/nice-select.min.js"></script>
    <script src="assets/js/backtotop.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('file').addEventListener('change', function(e) {
    var fileName = e.target.files[0].name; // 获取文件名
    document.getElementById('file-name').textContent = fileName; // 更新显示文件名的元素
  });
});
  </script>
  <script>
    // 获取文件输入和图片预览容器
    var fileInput = document.getElementById('file');
    var imageBox = document.getElementById('image-box');

    // 文件选择事件处理函数
    fileInput.addEventListener('change', function(event) {
        var file = event.target.files[0]; // 获取选择的文件
        if (file) {
            var reader = new FileReader(); // 创建FileReader对象
            reader.onload = function(e) {
                // 清除之前的预览
                imageBox.innerHTML = '';
                // 创建新的img元素并设置src为读取的文件内容
                var img = new Image();
                img.src = e.target.result;
                img.alt = '预览图片';
                // 将img元素添加到image-box中
                imageBox.appendChild(img);
            };
            reader.readAsDataURL(file); // 读取文件内容为DataURL
        }
    });
</script>
  </body>
  <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }
        #image-box {
            width: 40vw;
            height: 52vh;
            border: 2px dashed #ccc;
            border-radius: 10px;
            margin: 10px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f9f9f9;
        }     
        #image-box img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 8px;
        }
        form {
            margin-top: 10px;
        }
        #upload-label {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #upload-label:hover {
            background-color: #0056b3;
        }
        .custom-file-input input[type="file"] {
  position: absolute;
  z-index: -1;
  visibility: hidden;
}
/* .theme-btn-3 {
  border-radius: 50px;
  background: linear-gradient(180deg, #25c7ec 0%, #2596ec 100%);
  color: #FFF;
  font-size: 14px;
  font-weight: 600;
  display: inline-block;
  height: 46px;
  line-height: 45px;
  padding: 0 25px;
  -webkit-transition: all 0.3s linear 0s;
  -moz-transition: all 0.3s linear 0s;
  -ms-transition: all 0.3s linear 0s;
  -o-transition: all 0.3s linear 0s;
  transition: all 0.3s linear 0s;
}
.theme-btn-3:hover {
  background: linear-gradient(180deg, #7D25EC 0%, #9425EC 100%);
  color: #fff;
} */
.custom-file-input-container {
  display: flex; /* 使用flex布局 */
  align-items: center; /* 垂直居中对齐 */
}

.custom-file-input label {
  border-radius: 50px;
  background: linear-gradient(180deg, #25c7ec 0%, #2596ec 100%);
  color: #FFF;
  font-size: 14px;
  font-weight: 600;
  display: inline-block;
  height: 46px;
  line-height: 45px;
  padding: 0 25px;
  -webkit-transition: all 0.3s linear 0s;
  -moz-transition: all 0.3s linear 0s;
  -ms-transition: all 0.3s linear 0s;
  -o-transition: all 0.3s linear 0s;
  transition: all 0.3s linear 0s;
  border: 2px solid #000; /* 添加边框，颜色为黑色，宽度为2px */
  box-sizing: border-box; /* 确保边框贴合原来的边缘 */
  cursor: pointer; /* 添加光标样式 */
}

.custom-file-input label:hover {
  background: linear-gradient(180deg, #7D25EC 0%, #9425EC 100%);
  color: #fff;
}

.custom-file-input input[type="file"] {
  position: absolute;
  z-index: -1;
  visibility: hidden;
}

/* 文件名样式 */
#file-name {
  font-size: 16px; /* 增大字体大小 */
  margin-left: 10px; /* 保持左边距 */
}

.horizontal-form {
  display: flex; /* 使用flex布局 */
  align-items: center; /* 垂直居中对齐 */
  justify-content: flex-start; /* 水平起始对齐 */
  justify-content: space-around; 
}

/* .custom-file-input input[type="file"]:valid + label {
  background-color: #28a745;
} */
    </style>
</html>
