import socket
import os
import sys
server_ip = '10.24.116.14'
server_port = 12345
header_len = 64
buffer_size = 4096

def send_image(socket, image_data, image_format):
    header = f'{len(image_data)}:{image_format}'.encode().ljust(header_len)
    socket.sendall(header)
    socket.sendall(image_data)

def recv_image(socket: socket.socket):
    header = socket.recv(header_len)
    if not header:
        return None, None
    header = header.decode().strip()
    image_data_len, image_format = header.split(':')
    image_data = b''
    image_data_len = int(image_data_len)
    while len(image_data) < image_data_len:
        if len(image_data) + buffer_size <= image_data_len:
            image_data += socket.recv(buffer_size)
        else:
            image_data += socket.recv(image_data_len - len(image_data))
    return image_format, image_data

def tcp_client(file_path):
    file_path = os.path.split(file_path)[-1]
    file_name, file_format = os.path.splitext(file_path)
    file_format = file_format[1:] # 提取文件扩展名，不带"."
    if file_format not in ['jpeg', 'jpg', 'png']:
        print("Unsupported file format.")
        return
    
    # 创建socket对象
    client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

    # 连接服务器
    client_socket.connect((server_ip, server_port))

    with open(file_path, 'rb') as f:
        send_image(client_socket, f.read(), file_format)

    print(f'File {file_path} transferred complete.')

    cnt = 0
    while True:
        img_format, img_data = recv_image(client_socket)
        if not img_data:
            break
        with open(f'{file_name}_output_{cnt}.{img_format}', 'wb') as f:
            f.write(img_data)
        print(f'File {file_name}_output_{cnt}.{img_format} received complete.')
        cnt += 1

    
    client_socket.close()

img_path = sys.argv[1]

tcp_client(img_path)
