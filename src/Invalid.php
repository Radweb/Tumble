<?php namespace Radweb\Tumble;

use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Contracts\Support\MessageProvider;

class Invalid extends BadRequest {

	protected $message = 'Invalid Request';

	/**
	 * @var MessageBag|null
	 */
	protected $bag;

	/**
	 * @param MessageBag|MessageProvider|string[] $errors
	 */
	public function __construct($errors = [])
	{
		parent::__construct();

		if ($errors instanceof MessageProvider)
		{
			$errors = $errors->getMessageBag();
		}

		if ($errors instanceof MessageBag)
		{
			$this->bag = $errors;
			$errors = $errors->all();
		}

		$this->details = $errors;
	}

	/**
	 * @return MessageBag|null
	 */
	public function getBag()
	{
		return $this->bag;
	}

}