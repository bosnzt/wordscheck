# 敏感词检测服务
政治、色情、暴恐违禁、谩骂、违规广告、不良价值观 文本内容检测服务，

支持本地化部署，无查询次数限制，

微服务化，替代各种在线敏感词检测api。


## 简介
+ 用户昵称、聊天消息、直播弹幕、评论留言、用户简介等文本内容安全检测
+ 使用场景：游戏、直播、交互类App
+ 支持直接本地部署运行，http json方式或rpc方式查询
+ 单服务参考查询效率70000次/分钟
+ 支持多个服务同时运行，提高检测效率
+ 按需自定义添加和排除部分敏感词
+ 自动更新最新词库，无需耗费大量工作时间整理维护词库


## 演示地址
[坚果墙在线敏感词检测]

## 支持的系统
+ Centos7.2_64位、Centos7.3_64位、Centos7.4_64位、Centos7.5_64位、Centos7.6_64位、Centos7.7_64位、Centos7.8_64位、Centos7.9_64位、Centos8.2_64位
+ Ubuntu14.04_64位、Ubuntu16.04_64位、Ubuntu18.04_64位、Ubuntu20.04_64位、Ubuntu22.04_64位

+ 服务运行内存64MB左右


## 快速接入文档
[文档地址]

##  敏感词分类
+ 色情：色情传播、x用品、av女优、色情描写、x器官、x行为、色情行为
+ 政治：领导人、官员、政党、国家机关、反动言论、邪教、分裂组织、宗教
+ 暴恐违禁：枪支弹药、警用军用、涉黑涉恶、非法传教、毒品、假钞、刑事行为、违禁品
+ 谩骂：脏话、谩骂、地域攻击
+ 广告：冒充系统、违法买卖、金融广告、赌博、网络广告、广告词
+ 不良价值观：劣迹艺人、负面文化

##  部署
1. 下载*svc*目录所有文件到服务器目录
```shell
[root@localhost svc]# cd /root/svc
[root@localhost svc]# ls
config.ini  exclude.txt  include.txt  wordscheck
```

程序运行需要*能正常访问外网*

设置config.ini参数，按需配置私钥、访问端口等

[版本说明]，未配置私钥，服务会有部分限制，[购买私钥]

2. 运行敏感词检测服务
```shell
[root@localhost svc]# chmod +x wordscheck
[root@localhost svc]# ./wordscheck
```

3. 通过curl确认服务是否正常
```shell
[root@localhost ~]# curl -H "Accept: application/json" -H "Content-type: application/json" -X POST -d '{"content":"他在传播艳情内容"}'  http://localhost:8080/wordscheck
```

curl结果
```json
{
	"code": "0",
	"msg": "检测成功",
	"return_str": "他在传播**内容",
	"word_list": [{
		"keyword": "艳情",
		"category": "色情"
	}]
}
```

需要时可以添加敏感词到include.txt，排除敏感词到exclude.txt

##  http方式接入

+ go例子
`example/http/go_case.go`

+ php例子
`example/http/php/php_case.php`

+ node.js例子
`example/http/nodejs/nodejs_case.js`

##  rpc方式接入
+ go例子
`example/rpc/golang/go_case.go`

+ php例子
`example/rpc/php/php_case.php`

+ node.js例子
`example/rpc/nodejs/nodejs_case.js`


## 同时部署运行多个服务
[部署示例]

[坚果墙在线敏感词检测]:http://www.wordscheck.com
[文档地址]:http://doc.wordscheck.com/docs/docs
[版本说明]:http://doc.wordscheck.com/docs/docs/docs-1ef2q7n1kl46b
[购买私钥]:http://doc.wordscheck.com/docs/docs/docs-1ef22tc31kev6
[部署示例]:http://doc.wordscheck.com/docs/docs/docs-1eclgqdl7flkk