
### 前提条件
wordscheck服务已经正常运行
```shell
[root@localhost ~]# netstat -lptun|grep wordscheck
tcp6       0      0 :::8080                 :::*                    LISTEN      19596/./wordscheck  
tcp6       0      0 :::50051                :::*                    LISTEN      19596/./wordscheck 
```

### 安装用到的库
`npm install @grpc/grpc-js --save`

### 运行测试代码
```shell
[root@localhost nodejs]# node nodejs_case.js 
{
  WordList: [ { Keyword: '艳情', Category: '色情' } ],
  Code: '0',
  Msg: '检测成功',
  ReturnStr: '他在传播**内容'
}
```
