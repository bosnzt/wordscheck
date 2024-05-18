var request = require('request');  
  
//base node.js 16.19.0  
  
var content = '他在传播艳情内容';  
var url = 'http://localhost:8080/wordscheck';  
var accessToken = ''; //如果配置了Header token验证, 填写到这里
  
var options = {  
    headers: {  
        "Authorization": "Bearer " + accessToken,
        "Connection": "close"  
    },  
    url: url,  
    method: 'POST',  
    json: true,
    body: {content: content}  
};  
  
function callback(error, response, data) {  
    if (!error && response.statusCode == 200) {  
        console.log('code:', data.code);  
        console.log('msg:', data.msg);  
        console.log('return_str:', data.return_str);  
        console.log('word_list:', data.word_list);  
    } else {  
        console.error('Error:', error);  
        console.error('Status Code:', response && response.statusCode);  
    }  
}  
  
request(options, callback);