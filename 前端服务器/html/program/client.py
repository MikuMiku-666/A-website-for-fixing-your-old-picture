import socket
import os
import sys
server_ip = '10.24.116.14'
server_port = 12345
header_len = 64
buffer_size = 20 * 1024 * 1024 

def send_image(socket, image_data, image_format, resolution, extend_info=''):
    header = f'{len(image_data)}/{image_format}/{resolution}/{extend_info}'.encode().ljust(header_len)
    socket.sendall(header)
    socket.sendall(image_data)

def recv_image(socket: socket.socket):
    header = socket.recv(header_len)
    if not header:
        return None, None
    header = header.decode().strip()
    algo_id, image_data_len, image_format, extend_info = header.split('/')
    image_data = b''
    image_data_len = int(image_data_len)
    while len(image_data) < image_data_len:
        if len(image_data) + buffer_size <= image_data_len:
            image_data += socket.recv(buffer_size)
        else:
            image_data += socket.recv(image_data_len - len(image_data))
    return algo_id, image_format, image_data, extend_info

def tcp_client(full_file_path, resolution):
    if not os.path.exists(full_file_path):
        print('File not found')
        return
    file_path = os.path.split(full_file_path)[0]
    file_name, file_format = os.path.splitext(os.path.split(full_file_path)[-1])
    file_format = file_format[1:] # 提取文件扩展名，不带"."
    if file_format not in ['jpeg', 'jpg', 'png','bmp']:
        print("Unsupported file format.")
        return
    
    # 创建socket对象
    client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

    # 连接服务器
    try:
        client_socket.connect((server_ip, server_port))
    except socket.error as e:
        print(f"连接失败：{e}")
        client_socket.close()
        return

    with open(full_file_path, 'rb') as f:
        send_image(client_socket, f.read(), file_format, resolution)

    print(f'File {full_file_path} transferred complete.')

    while True:
        algo_id, img_format, img_data, extend_info = recv_image(client_socket)
        if not img_data:
            break
        nxtfile = os.path.join(file_path, f'{file_name}_output_{algo_id}.{img_format}')
        with open(nxtfile, 'wb') as f:
            f.write(img_data)
        print(f'File {nxtfile} received complete.')

    
    client_socket.close()

img_path = sys.argv[1]
resolution = int(sys.argv[2])

tcp_client(img_path, resolution)
