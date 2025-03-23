import PIL as pl
from PIL import Image
from PIL import ImageFilter
import os
import sys
import numpy as np
import cv2

if len(sys.argv) >= 4 or len(sys.argv) == 1:
    raise(TypeError("argv not correct, use: main.py image.jpg output_img.jpg"))
    exit(1)
Image.MAX_IMAGE_PIXELS = None


img_path = sys.argv[1]
output_folder = sys.argv[2]
image = cv2.imread(img_path)

    
value = 3

# 检查图像模式
if len(image.shape) == 2:  # 灰度图像
    # 使用 fastNlMeansDenoising 进行去噪
    denoised_img = cv2.fastNlMeansDenoising(src=image, dst=None, h=value, templateWindowSize=7, searchWindowSize=21)
elif len(image.shape) == 3 and image.shape[2] == 3:  # 彩色图像
    # 使用 fastNlMeansDenoisingColored 进行去噪
    denoised_img = cv2.fastNlMeansDenoisingColored(src=image, dst=None, h=value, hColor=value, templateWindowSize=7, searchWindowSize=21)

cv2.imwrite(output_folder,denoised_img)

