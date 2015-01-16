
###Install

1.将 ```'hardywen/yimei': 'dev-master'``` 加入composer.json文件

```json
"require": {
	  "laravel/framework": "4.2.*",
	  "..."
	  "hardywen/yimei": "dev-master"
},

```

2.运行```composer install``` 安装本组件

3.在```app/config/app.php```中加入以下配置

```php
	'providers' => array(
	    '...',
	    'Hardywen\Yimei\YimeiServiceProvider',
	)
	
	
	'aliases' => array(
	    '...',
	    'Yimei'            => 'Hardywen\Yimei\Facades\YimeiFacade',
	)
```


###Config

4.运行下面这条命令

```php artisan config:publish hardy/yimei```

5.运行上面命令后，可以在 ```app/config/packages/hardywen/yimei/config```里配置支付宝的相关参数 


###Usage

6.发送短信
```php
$content = Yimei::getContent();
$msg = Yimei::sendSMS(['138xxxxxxxx','138xxxxxxxx'], $content);
```
