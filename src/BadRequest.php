<?php namespace Radweb\Tumble;

class BadRequest extends Exception {

	protected $message = 'Bad Request';

	protected $status = 400;

}