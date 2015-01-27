
###Install

1.将 ```'hardywen/yimei': 'dev-master'``` 加入composer.json文件

```json
"require": {
	  "laravel/framework": "4.2.*",
	  "..."
	  "hardywen/yimei": "dev-master"
},

```

2.运行```composer update``` 安装本组件

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

```php artisan config:publish hardywen/yimei```

5.运行上面命令后，可以在 ```app/config/packages/hardywen/yimei/config```里配置支付宝的相关参数 


###Usage

6.发送短信
```php
$content = Yimei::getContent(); //可以传入 code 参数。将通过config里面的内容模板渲染出来。不传code参数则会自动生成6位随机数字
$msg = Yimei::sendSMS(['138xxxxxxxx','138xxxxxxxx'], $content);
```
