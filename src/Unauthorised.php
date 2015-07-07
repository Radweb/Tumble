<?php namespace Radweb\Tumble;

class Unauthorised extends Exception {

	protected $message = 'Unauthorised';

	protected $status = 401;

}