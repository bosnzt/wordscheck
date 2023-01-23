
### 前提条件
wordscheck服务已经正常运行
```shell
[root@localhost ~]# netstat -lptun|grep wordscheck
tcp6       0      0 :::8080                 :::*                    LISTEN      19596/./wordscheck  
tcp6       0      0 :::50051                :::*                    LISTEN      19596/./wordscheck 
```

### 运行测试代码
```shell
[root@localhost golang]# go run go_case.go 
2023/01/18 22:09:05 code=0
2023/01/18 22:09:05 msg=检测成功
2023/01/18 22:09:05 return_str=他在传播**内容
2023/01/18 22:09:05 wordlist=[{Keyword:艳情 Category:色情}]
```