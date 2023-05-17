# 敏感词检测API - 私有化部署
提供文本识别、智能鉴黄、敏感词过滤、涉政检测等服务，

可部署至「本地服务器」或「专有云服务器」，保障数据私密性，提供一键启动软件部署包私有化。

『开箱即用的检测服务』


## 简介
+ 敏感词库从大量词条中整理出来，基于NLP算法检测
+ 支持Windows、MacOs、Linux等64位主流系统
+ 可以部署在本地服务器，或部署到阿里云、腾讯云、华为云、百度云等云服务器
+ 通过下载部署包，即可一键启动私有化的"敏感词检测 API服务"
+ 支持http json方式或grpc方式查询
+ 单服务参考查询效率70000次/分钟，同时支持并行服务
+ 支持自定义添加文本白名单/黑名单
+ 服务运行内存100M左右，非常轻便


## 应用场景
+ 用户昵称、聊天消息、直播弹幕、评论留言、用户简介、商品详情、AI智能问答 等内容合规检测过滤
+ 境外产品 内容合规需要


## 演示地址
[坚果墙在线敏感词检测]


## 快速接入文档
[文档地址]

##  敏感词分类
+ 色情：色情传播、x用品、av女优、色情描写、x器官、x行为、色情行为
+ 政治：领导人、官员、政党、国家机关、反动言论、邪教、分裂组织、宗教
+ 暴恐违禁：枪支弹药、警用军用、涉黑涉恶、非法传教、毒品、假钞、刑事行为、违禁品
+ 谩骂：脏话、谩骂、地域攻击
+ 广告：冒充系统、违法买卖、金融广告、赌博、网络广告、广告词
+ 不良价值观：劣迹艺人、负面文化

##  部署(Linux环境示例)
1. 下载*svc*文件夹到服务器，运行
```shell
[root@localhost svc]# ls
blacklist.txt  config.ini  whitelist.txt  wordscheck
[root@localhost svc]# ./wordscheck
```

2. curl测试下服务
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
		"category": "色情",
		"position": "4-5"
	}]
}
```

config.ini  配置文件

Windows、MacOs部署基本相同

Windows运行文件wordscheck_win.exe

MacOs运行文件wordscheck_mac

##  http方式查询
代码示例目录`example/http/`

##  rpc方式查询
代码示例目录`example/rpc/`

### 如何调整服务中的敏感词？
blacklist.txt：黑名单，追加新的敏感词到检测服务中

whitelist.txt：白名单，从检测服务中排除某些敏感词


[坚果墙在线敏感词检测]:http://www.wordscheck.com
[文档地址]:http://doc.wordscheck.com/docs/docs
[版本说明]:http://doc.wordscheck.com/docs/docs/docs-1ef2q7n1kl46b
[购买私钥]:http://doc.wordscheck.com/docs/docs/docs-1ef22tc31kev6
