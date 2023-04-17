import requests
import json

url = "http://localhost:8080/wordscheck"
content = '他在传播艳情内容'
data = json.dumps({'content': content})
headers = {'Content-Type': 'application/json'}
response = requests.post(url, data=data, headers=headers)
print(response.text)