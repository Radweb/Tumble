<?php namespace Radweb\Tumble;

class NotFound extends Exception {

	protected $message = 'Resource Not Found';

	protected $status = 404;

	public static function make($entityType = 'Resource')
	{
		parent::__construct("$entityType Not Found");
	}

}