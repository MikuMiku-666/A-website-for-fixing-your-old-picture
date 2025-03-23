import cv2
import os
import sys
import numpy as np

# 检查命令行参数数量
if len(sys.argv) != 3:
    raise TypeError("argv not correct, use: main.py image.jpg output_folder")
    exit(1)

img_path = sys.argv[1]
output_path = sys.argv[2]

image = cv2.imread(img_path)

# 检查图像是否读取成功
if image is None:
    raise ValueError("Could not read the image.")

# 将图像转换为灰度图
gray_image = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)

# 定义锐化核
sharpening_kernel = np.array([[-1, -1, -1],
                              [-1, 9, -1],
                              [-1, -1, -1]])

# 应用锐化核
sharpened_image = cv2.filter2D(gray_image, -1, sharpening_kernel)

# 将锐化后的图像转换回BGR颜色空间
sharpened_image = cv2.cvtColor(sharpened_image, cv2.COLOR_GRAY2BGR)

enhanced_image = cv2.addWeighted(sharpened_image, 0.2, image, 0.8, 0)

# # 提高亮度
# alpha = 1.05 
# brighter_image = cv2.convertScaleAbs(image, alpha=alpha)

# 保存锐化后的图像
cv2.imwrite(output_path, enhanced_image)


