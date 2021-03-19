## ⚡️ Quickstart Guide
### 环境准备工作
- CentOS 8.0 ~~强烈建议但这并不是必要的~~
	- Supervisor 用于队列进程守护 
- Mysql 5.7 
- MongoDB 4.0 
- Redis 6.0 
- Composer 
- PHP 7.4.15  
	- redis 
	- mongodb 
	- fileinfo 
	- opcache 
	- ~~pdo_sqlsrv (非必要的)~~
#### PHP特殊函数需要开启
- putenv 
- proc_open
- pcntl_alarm
- pcntl_signal
- pcntl_signal_distpch
### 开始安装 
``` bash
git clone git@github.com:feiflyg/datahub.git 
cd datahub 
composer install 
#准备环境配置文件,并且进行配置 
cp .env.example .env 
vim .env 
```
⚠️ **配置文件中必须先要配置数据库连接**  

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_name
DB_USERNAME=user_name
DB_PASSWORD=user_password
```
> 环境配置文件可以参考 <a href="https://learnku.com/docs/laravel/8.x/configuration/9355" target="_blank" >Laravel 文档</a>

配置完成之后,接下来开始执行数据库迁移动作
``` bash
php astisan migrate 
php artisan key:generate
```

🔐 接下来，运行 `passport:install` 命令来创建生成安全访问令牌时所需的加密密钥，同时，这条命令也会创建用于生成访问令牌的「个人访问」客户端和「密码授权」客户端：

``` bash
php artisan passport:install --uuids
```
完成上述步骤后服务端安装已经完成，此时可以运行开始调试：
``` bash
php artisan serve
# 成功运行结果
Starting Laravel development server: http://127.0.0.1:8000
```

