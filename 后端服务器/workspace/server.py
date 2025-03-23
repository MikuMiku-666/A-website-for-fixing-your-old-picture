import socket
import os
import sys
import signal
import threading
import subprocess

thread_limit = 100
server_port = 12345
server_ip = '10.24.116.14'
header_len = 64
buffer_size = 20 * 1024 * 1024 
exit_event = threading.Event()

def send_image(socket, algo_id, image_data, image_format, extend_info=''):
    header = f'{algo_id}/{len(image_data)}/{image_format}/{extend_info}'.encode().ljust(header_len)
    socket.sendall(header)
    socket.sendall(image_data)

def recv_image(socket: socket.socket):
    header = socket.recv(header_len)
    if not header:
        return None, None
    header = header.decode().strip()
    image_data_len, image_format, resolution, extend_info = header.split('/')
    image_data = b''
    image_data_len = int(image_data_len)
    while len(image_data) < image_data_len:
        if len(image_data) + buffer_size <= image_data_len:
            image_data += socket.recv(buffer_size)
        else:
            image_data += socket.recv(image_data_len - len(image_data))
    return image_format, image_data, resolution


# 创建 socket 对象
server_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
client_socket_list = [-1] * thread_limit
unused_id = list(range(thread_limit)[::-1])
def handle_exit(signal_number, frame):
    lock = threading.Lock()
    with lock:
        print('\nProgram terminated. Cleaning up all sockets.')
        for client_socket in client_socket_list:
            if client_socket != -1:
                client_socket.close()
        server_socket.close()
        sys.exit(0)  # 正常退出程序

# 设置信号处理器，当接收到SIGINT（通常由Ctrl+C触发）时调用handle_exit函数
signal.signal(signal.SIGINT, handle_exit)

# 关闭 socket 连接
def close_client(lock, id, client_socket, addr):
    with lock:
        client_socket.close()
        unused_id.append(id)
        client_socket_list[id] = -1
    print(f"{addr} closed")

def handle_input():
    while True:
        command = input("")
        if command == 'exit':
            exit_event.set()
            break
def handle_client(client_socket, addr):
    lock = threading.Lock()
    with lock:
        id = unused_id.pop(-1)
        client_socket_list[id] = client_socket
    
    print(f"Connected by {addr}")
    
    # 接收文件
    img_format, img_data, resolution = recv_image(client_socket)
    print(f"Received file format {img_format} from {addr}")
    if not img_data:
        close_client(lock, id, client_socket, addr)
        return
    
    # 接收图片数据
    file_path = os.path.join('./img', str(id))
    os.makedirs(file_path, exist_ok=True)
    img_path = os.path.join(file_path, f"{id}.{img_format}")
    with open(img_path, 'wb') as f:
        f.write(img_data)  # 将数据写入文件
    
    # 运行 main.py 处理图片
    # print(resolution)
    subprocess.run(["python", "main.py", os.path.abspath(file_path), f"{id}.{img_format}", f"{resolution}"], cwd=os.path.abspath('.'))
    
    for _, _, imgs in os.walk(os.path.join(file_path, 'output')):
        for img in imgs:
            with open(os.path.join(file_path, 'output', img), 'rb') as f:
                send_image(client_socket, int(img[6:].split('.')[0]), f.read(), img.split('.')[-1])
            print(f"Sent file {img} to {addr}")
                
    close_client(lock, id, client_socket, addr)

def handle_accept(server_socket):
    while True:
        # 接受一个新的连接
        client_socket, addr = server_socket.accept()
        client_thread = threading.Thread(target=handle_client, args=(client_socket, addr))
        client_thread.daemon = True
        client_thread.start()
    
 
if __name__ == '__main__':
    # 获取当前文件夹
    current_folder = os.getcwd()
    
    # 绑定端口
    server_socket.bind((server_ip, server_port))
    

    input_thread = threading.Thread(target=handle_input)
    input_thread.daemon = True
    input_thread.start()
    print("Input thread started. Input 'exit' to exit.")

    # 设置为监听模式
    server_socket.listen()
    accept_thread = threading.Thread(target=handle_accept, args=(server_socket,))
    accept_thread.daemon = True
    accept_thread.start()
    print("Server is listening...")
    
    exit_event.wait()
    handle_exit(None, None)