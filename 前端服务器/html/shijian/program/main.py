import sys
import os
import argparse
import faiss
import pandas as pd
import numpy as np

movie_cnt = 8

def get_user_id():
    parser = argparse.ArgumentParser(description="Process user information.")
    parser.add_argument('-name', type=str, help='User name.')
    parser.add_argument('-id', type=int, help='User ID.')
    args = parser.parse_args()
    name_count = sys.argv.count('-name')
    id_count = sys.argv.count('-id')
    if id_count == 1 and name_count == 0:
        user_id = args.id
    else:
        print('Usage: main.py <-id userID>')
        exit(-1)
    return user_id

if __name__ == '__main__':
    # user_id = get_user_id()
    user_id = 1
    faiss_P = faiss.read_index('/var/www/html/shijian/program/faiss_P.index')
    user_feature = faiss_P.reconstruct(user_id - 1).reshape(1, -1)
    faiss_Q = faiss.read_index('/var/www/html/shijian/program/faiss_Q.index')
    faiss_score = faiss.read_index('/var/www/html/shijian/program/faiss_score.index')
    score_vector = faiss_score.reconstruct(user_id - 1)

    recommend_set = set()
    # 找到最相似的两个用户
    D, I = faiss_P.search(user_feature, 2)
    for i in I[0]:
        anime_feature = faiss_Q.reconstruct(i.item())
        sorted_indices = np.argsort(anime_feature)[::-1]
        num = 0
        for index in sorted_indices:
            if index not in recommend_set:
                recommend_set.add(index)
                num = num + 1
                if num >= 2:
                    break

    # 找到该用户评分最高的四部动漫
    highest_four_animes = np.argsort(score_vector)[-4:][::-1]
    # 去掉没打过分或者低分的
    for i in highest_four_animes:
        if score_vector[i] < 7:
            highest_four_animes.remove(i)

    # 匹配与这几部动漫最相似的
    for i in highest_four_animes:
        D_matrix,I_matrix = faiss_Q.search(highest_four_animes,4)

    while recommend_set.shape < 8:
        for i in highest_four_animes:
                anime_id = I_matrix[i][0][0]
                if anime_id not in recommend_set:
                    recommend_set.add(anime_id)
                    I_matrix[i][0].remove(anime_id)
                    if recommend_set.shape == 8:
                        break


    for i in recommend_set:
        print(i, end = " ")
    # print(I[0])  # 打印最近邻的索引
    # print(D)  # 打印与最近邻的距离