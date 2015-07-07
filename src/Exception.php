<?php namespace Radweb\Tumble;

use Exception as BaseException;

class Exception extends BaseException {

	protected $message = 'Server Error Occurred';

	protected $status = 500;

	protected $details = null;

	public function __construct($message = null, $details = null)
	{
		$this->details = $details;
		parent::__construct($message ?: $this->message);
	}

	public function getHttpStatus()
	{
		return $this->status;
	}

	public function getDetails()
	{
		return $this->details;
	}

}