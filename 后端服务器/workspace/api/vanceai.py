import requests
import json
import sys
import cv2

# 检查命令行参数数量
if len(sys.argv) != 3:
    print("Usage: python main.py image.jpg output_folder")
    sys.exit(1)

img_path = sys.argv[1]
output_path = sys.argv[2]

api_token = 'e62616ac169088cc3d7409fa923363c4'


with open(img_path, 'rb') as img_file:
    response = requests.post(
        'https://api-service.vanceai.com/web_api/v1/upload', 
        files={'file': img_file},
        data={'api_token': api_token},
    )
response.raise_for_status()  
r = response.json()
if r['code'] != 200:
    raise ValueError(f"API Error: {r['msg']}")
print('uid:', r['data']['uid'])
uid = r['data']['uid']

json_path = "/mnt/82_store/jw/workspace/api/config.json"
with open(json_path, 'r') as f:  
    jparam = json.load(f)

data = {
    'api_token': api_token,
    'uid': uid,
    'jconfig': json.dumps(jparam)
}

response = requests.post(
    'https://api-service.vanceai.com/web_api/v1/transform', 
    data=data
)
response.raise_for_status()
r = response.json()
if r['code'] != 200:
    raise ValueError(f"API Error: {r['msg']}")
print('trans_id:', r['data']['trans_id'])
trans_id = r['data']['trans_id']

remoteFileUrl = f'https://api-service.vanceai.com/web_api/v1/progress?trans_id={trans_id}&api_token={api_token}'
print(remoteFileUrl)

response = requests.get(remoteFileUrl)
response.raise_for_status()
r = response.json()
if r['code'] != 200:
    raise ValueError(f"API Error: {r['msg']}")
print('status:', r['data']['status'])

remoteResultUrl = f'https://api-service.vanceai.com/web_api/v1/download?trans_id={trans_id}&api_token={api_token}'
response = requests.get(remoteResultUrl, stream=True)
response.raise_for_status()

with open(output_path, "wb") as f:
    for chunk in response.iter_content(chunk_size=512):
        if chunk:
            f.write(chunk)
