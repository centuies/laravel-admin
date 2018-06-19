# openbms
本项目参考[https://github.com/xiayulei/open_source_bms](https://github.com/xiayulei/open_source_bms)，是由laravel5.5开发的一个后台管理系统。

# laravel-admin

本项目参考[https://github.com/xiayulei/open_source_bms](https://github.com/xiayulei/open_source_bms)，是由laravel5.5开发的一个后台管理系统。

##环境要求
1.php版本必须大于7.1
2.服务器开启url重写
 (1)如果使用 Apache 作为服务容器，请启用 mod_rewrite模块，让服务器能够支持 .htaccess 文件的解析。
 (2)如果你使用的是 Nginx，在你的站点配置中加入以下内容，它将会将所有请求都引导到 index.php 前端控制器：
```
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

##安装

1. git clone项目
```
git clone https://github.com/centuies/laravel-admin.git
```
2.进入项目所在文件夹，使用composer安装包
```
composer install
```

3.将.env.example文件重命名为.env，修改数据库信息。
4.应用秘钥
```
php artisan key:generate
```
5. 迁移数据
```
php artisan migrate
```
6.填充数据
```
php artisan db:seed
```
7.修改storage 目录和bootstrap/cache 目录的权限
```
chmod -R 777 storage/
```
##默认密码

后台默认用户名admin，默认密码admin。
