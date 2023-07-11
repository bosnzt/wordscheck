using System;  
using System.Net.Http;  
using System.Text;  
using System.Threading;  
using Newtonsoft.Json;
  
class CsharpCase  
{  
    static void Main(string[] args)  
    {  
        SendJsonPostRequest().Wait();  
    }  
  
    public static async Task SendJsonPostRequest()  
    {  
        HttpClient client = new HttpClient();  
        var obj = new { content = "他在传播艳情内容" }; 
        string json = JsonConvert.SerializeObject(obj);
        string url = "http://localhost:8080/wordscheck";  
        string contentType = "application/json";  
        HttpContent content = new StringContent(json, Encoding.UTF8, contentType);  
        HttpResponseMessage response = await client.PostAsync(url, content);  
        string result = await response.Content.ReadAsStringAsync();  
        Console.WriteLine(result);  
    }  
}  
