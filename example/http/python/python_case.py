import requests  
import json  
  
url = "http://localhost:8080/wordscheck"  
content = '他在传播艳情内容'  
data = json.dumps({'content': content})  
  
# 如果配置了Header token验证, 填到这里 
access_token = ""  

headers = {  
    'Content-Type': 'application/json',  
    'Authorization': f'Bearer {access_token}'  
}  
    
response = requests.post(url, data=data, headers=headers)  

print(response.status_code)

print(response.text)  
