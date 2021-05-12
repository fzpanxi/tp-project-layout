基于ThinkPHP 6.0 实施的项目布局框架
===============

## 介绍
这是基于ThinkPHP 6.0 实现的标准项目布局框架。

> 运行环境要求PHP7.1+，兼容PHP8.0。

## 安装
```python
git clone this project
composer install
```

## 目录结构

```python
├─ app
| ├─ application    类 DDD application 层
| | |____event      事件发布、订阅(XxxAppPubEvent.php、XxxAppSubEvent.php)
| | |____service    application service(XxxApplication.php)
|____controller     类 DDD interface 层
| |____response     返回对象定义（例：GetXxxResponse.php、ListXxxResponse.php）
| |____validate     验证器（例：XxxValidate.php）
| |____Xxx.php      TP框架控制器文件
|____domain         类 DDD domain 层
| |____entity       实体
| |____repository   仓储（类似DDD repository，例：UserRepo用户相关的仓储）
| |____service      服务（类似DDD domain service，例：UserService用户相关的领域服务）
|____intra          持久化、存储层
| |____model        TP模型层（持久化数据等)
| |____XxxInfra.php 实现domian repository的接口（例：实现UserRepo的UserInfra），同时封装cache、db等基础组件
|____library        公共库目录
| |____error        全局错误定义
| |____response     全局API Response定义
|____TP框架相关目录、文件
```