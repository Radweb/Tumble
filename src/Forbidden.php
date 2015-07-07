<?php namespace Radweb\Tumble;

class Forbidden extends Exception {

	protected $message = 'Permission Denied';

	protected $status = 403;

}