<?php namespace Hardywen\Yimei;

use Illuminate\Support\Facades\Config;
require_once(__DIR__.'/Client.php');

class Yimei {

	public static $config = [];

	public static $instance;

	public static function instance($config){

		if(self::$instance == null){
			self::init($config);
		}
		return self::$instance;

	}

	public static function newInstance($config){
		self::init($config);
		return self::$instance;
	}


	private static function init($config){

		self::$config = array_merge(Config::get('yimei::config'),$config);

		$url = self::$config ['url'];
		$serialNumber = self::$config ['serialNumber'];
		$password = self::$config ['password'];
		$sessionKey = self::$config ['sessionKey'];
		$contentTpl = self::$config ['contentTpl'];
		$proxyhost = false;
		$proxyport = false;
		$proxyusername = false;
		$proxypassword = false;
		$timeout = 2;
		$response_timeout = 10;

		self::$instance = new \Client($url,$serialNumber,$password,$sessionKey,$proxyhost,$proxyport,
			$proxyusername, $proxypassword, $timeout, $response_timeout,$contentTpl);

		self::$instance->setOutgoingEncoding(self::$config ['outgoingEncoding']);
		self::$instance->setIncomingEncoding(self::$config ['incomingEncoding']);
	}


}