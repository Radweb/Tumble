<?php namespace Radweb\Tumble;

class Conflict extends Exception {

	protected $message = 'A Conflict Occurred';

	protected $status = 409;

}