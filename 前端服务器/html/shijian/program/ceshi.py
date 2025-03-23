import faiss
import pandas as pd
import numpy as np


# 从文件加载索引
index = faiss.read_index("/var/www/html/shijian/program/faiss_Q.index")
print(index.d)
index = faiss.read_index("/var/www/html/shijian/program/faiss_P.index")
print(index.d)