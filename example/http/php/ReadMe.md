
### 前提条件
wordscheck服务已经正常运行
```shell
[root@localhost ~]# netstat -lptun|grep wordscheck
tcp6       0      0 :::8080                 :::*                    LISTEN      19596/./wordscheck  
tcp6       0      0 :::50051                :::*                    LISTEN      19596/./wordscheck 
```

### 运行测试代码
```shell
[root@localhost php]# php php_case.php 
200
{"code":"0","msg":"检测成功","return_str":"他在传播**内容","word_list":[{"keyword":"艳情","category":"色情","posit
ion":"4-5","level":"高"}],"extstr":""}
```