from PIL import Image, ImageFilter

# 打开图片
image = Image.open('sample.png')

# 应用高斯模糊
blurred_image = image.filter(ImageFilter.GaussianBlur(radius=5))

# 保存处理后的图片
blurred_image.save('blurred_image.png')

