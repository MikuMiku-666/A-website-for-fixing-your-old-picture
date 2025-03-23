import os
import sys
import subprocess
import shutil

# 使用方法：接受命令行输入的图片所在的文件夹，然后依次按照所有方法输出至 output 文件夹中
# output文件夹可能会被覆盖，应该由上层代码进行决定。

# img_dir = r"/mnt/82_store/jw/workspace/img/1.jpg"

if len(sys.argv) != 3 and len(sys.argv) != 4:
    raise(TypeError("argv not correct, use: main.py image_path img.jpg"))
    exit(1)

img_folder_path = sys.argv[1]
img_name = sys.argv[2]
resolution = sys.argv[3] if len(sys.argv) == 4 else "2"

img_dir = os.path.join(img_folder_path, img_name)
output_folder = os.path.join(img_folder_path, "output")
try:
    if os.path.exists(output_folder):
        shutil.rmtree(output_folder)
    try:
        subprocess.run(["./realesrgan-ncnn-vulkan", "-i", img_dir, "-o", os.path.join(os.path.join(img_folder_path, "output"), "output1.png"), "-s", resolution], 
                    cwd = "/mnt/82_store/jw/workspace/realesrgan-ncnn-vulkan-20220424-ubuntu", 
                    stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL)  # 隐藏输出
        print(img_name + " output1 success")
    except:
        print(img_name + " output1 failed")
    # print(img_dir)
    try:
        subprocess.run(["python", "pillow.py",img_dir, os.path.join(os.path.join(img_folder_path, "output"), "output2.jpg")], 
            cwd = "./PILwork", stdout=subprocess.DEVNULL,stderr=subprocess.DEVNULL)
        print(img_name + " output2 success")
    except:
        print(img_name + " output2 failed")
    try:
        subprocess.run(["python", "pillow1.py",img_dir, os.path.join(os.path.join(img_folder_path, "output"), "output3.jpg")], 
        cwd = "./PILwork", stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL)
        print(img_name + " output3 success")
    except:
        print(img_name + "output3 failed")
        
    try:
        subprocess.run(["python", "inference_gfpgan.py", "-i", img_dir, "-o", os.path.join(img_folder_path, "output"), "-v", "1.3", "-s", resolution], 
                    cwd = "./GFPGAN", stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL)
        shutil.move(os.path.join(os.path.join(output_folder, "restored_imgs"), img_name), output_folder + "/" + "output4.jpg")
        shutil.rmtree(os.path.join(output_folder, "restored_imgs"))
        print(img_name + " output4 success")
    except:
        print(img_name + " output4 failed")
   
    try:
        subprocess.run(["python", "colorization_pipeline.py", "--input", img_dir, "--output", os.path.join(os.path.join(img_folder_path, "output"), "output5.jpg"), "--model_path", "/mnt/82_store/jw/workspace/DDColor-master/modelscope/damo/cv_ddcolor_image-colorization/pytorch_model.pt"], 
                    cwd = "./DDColor-master/inference", stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL)
        print(img_name + " output5 success")
    except:
        print(img_name + " output5 failed")

    try:
        subprocess.run(["python", "vanceai.py",img_dir, os.path.join(os.path.join(img_folder_path, "output"), "output6.jpg")], 
        cwd = "./api", stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL)
        print(img_name + " output6 success")
    except:
        print(img_name + "output6 failed")

    print("Success")
except:
    print("Failed!")
    