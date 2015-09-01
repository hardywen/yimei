<?php namespace Hardywen\Yimei\Facades;

use Illuminate\Support\Facades\Facade;

class Yimei extends Facade {

	protected static function getFacadeAccessor() {
		return 'yimei';
	}
}