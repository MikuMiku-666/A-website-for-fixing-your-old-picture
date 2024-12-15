import os
import stat
from time import sleep
import time
import shutil

file_path = '/var/www/html/404.html'
upload_path = '/var/www/html/uploads'
abs_html_path = '/var/www/html'


def delete_directory(dir_path):
    try:
        
        shutil.rmtree(dir_path)
        print(f"目录 {dir_path} 及其所有内容已成功删除。")
    except Exception as e:
        print(f"删除目录时出错: {e}")

def delete_file(file_path):
    try:
   
        os.remove(file_path)
        print(f"文件 {file_path} 已成功删除。")
    except Exception as e:
        print(f"删除文件时出错: {e}")

while True:
    dirlist = []
    for files, dirs, root in os.walk(upload_path):
        dirlist = dirs
        break
    # print(dirlist)
    for dirname in dirlist:
        phpname = "result" + dirname + ".php"
        phppath_abs = os.path.join(abs_html_path, phpname)
        dirpath_abs=  os.path.join(upload_path, dirname)
        fstat = os.stat(dirpath_abs)
        if time.time() - fstat[stat.ST_MTIME] >= 300:
            delete_directory(os.path.join(upload_path, dirname))
            delete_file(phppath_abs)
    
    sleep(300)
print("Last modified:", file_stat[stat.ST_MTIME])
