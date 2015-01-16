<?php namespace Hardywen\Yimei;

require_once(__DIR__.'/Client.php');

class Yimei {

	public static $config;

	public static $instance;

	public static function instance($config){

		if(self::$instance == null){

			self::$config = $config;

			$url = $config['url'];
			$serialNumber = $config['serialNumber'];
			$password = $config['password'];
			$sessionKey = $config['sessionKey'];
			$contentTpl = $config['contentTpl'];
			$proxyhost = false;
			$proxyport = false;
			$proxyusername = false;
			$proxypassword = false;
			$timeout = 2;
			$response_timeout = 10;

			self::$instance = new \Client($url,$serialNumber,$password,$sessionKey,$proxyhost,$proxyport,
				$proxyusername, $proxypassword, $timeout, $response_timeout,$contentTpl);

			self::$instance->setOutgoingEncoding($config['outgoingEncoding']);
			self::$instance->setIncomingEncoding($config['incomingEncoding']);

		}
		return self::$instance;

	}

}