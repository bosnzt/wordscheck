
### 前提条件
wordscheck服务已经正常运行
```shell
[root@localhost ~]# netstat -lptun|grep wordscheck
tcp6       0      0 :::8080                 :::*                    LISTEN      19596/./wordscheck  
tcp6       0      0 :::50051                :::*                    LISTEN      19596/./wordscheck 
```

### 安装依赖
确保已安装php_grpc库

`pecl install grpc`

```shell
[root@localhost php]# php -m|grep grpc
grpc
```

更新代码依赖

`composer install`


### 运行测试代码
```shell
[root@localhost php]# php php_case.php 
0
检测成功
他在传播**内容
色情
艳情
```