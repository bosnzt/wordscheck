# 敏感词检测API - 私有化部署
提供文本识别、智能鉴黄、涉政检测、谩骂等等 敏感词检测过滤服务，

可部署至本地或云服务器，一键启动，直接服务器本地检测，低网络延迟、内容隐私。

『开箱即用的检测服务』、不限调用次数。


## 简介
+ 敏感词库从大量样本库整理出来，基于NLP算法检测
+ 支持Windows、MacOs、Linux等64位主流系统
+ 可以部署在本地，或部署到阿里云、腾讯云、亚马逊云、谷歌云等云服务器
+ 通过下载部署包，即可一键启动私有化的"敏感词检测 API服务"
+ 支持自动云更新最新词库
+ 支持http json方式或gRPC方式查询
+ 单服务参考查询效率70000次/分钟，同时支持并行服务
+ 支持自定义添加白名单/黑名单词条
+ 服务运行内存100M左右，非常轻便


## 应用场景
+ AI智能问答、评论留言、聊天消息、直播弹幕、商品详情 等内容合规检测过滤
+ 应用提审上架、主管部门审核、云平台内容巡查 等监管需要
+ 境内外 产品内容合规需要，可部署到中国香港、新加坡、日本、美国、韩国等


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
[root@localhost ~]# curl -H "Accept: application/json" -H "Content-type: application/json" -X POST -d "{\"content\":\"他在传播艳情内容\"}" http://localhost:8080/wordscheck
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
		"position": "4-5",
		"level": "高"
	}]
}
```

config.ini  配置文件

Windows、MacOs部署基本相同

| **运行文件**  | **环境说明**  |
| ------------ | ------------ |
| wordscheck | Linux环境，常用的服务器x86_64、amd64 |
| wordscheck_arm64 | Linux环境，aarch64、arm64的服务器 |
| wordscheck_win.exe | Windows环境 |
| wordscheck_mac | MacOs环境，intel芯片的电脑 |

##  http方式查询
代码示例目录`example/http/`

##  rpc方式查询
代码示例目录`example/rpc/`

### 如何调整服务中的敏感词？
blacklist.txt：黑名单，追加新的敏感词到检测服务中

whitelist.txt：白名单，从检测服务中排除某些敏感词

##  Docker方式部署
修改Dockerfile，调整系统环境、执行文件；配置config.ini

通过Dockerfile，自行build镜像，自己定个镜像名字

`docker build -t 镜像名字 .`

运行容器

`docker run -p 8080:8080 -d 镜像名字`



[坚果墙在线敏感词检测]:https://www.wordscheck.com
[文档地址]:https://doc.wordscheck.com/docs/docs
