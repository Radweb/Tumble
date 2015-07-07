<?php namespace Radweb\Tumble;


use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Contracts\Support\MessageProvider;

class Invalid extends BadRequest {

	protected $message = 'Invalid Request';

	/**
	 * @param MessageBag|MessageProvider|string[] $errors
	 */
	public function __construct($errors = [])
	{
		parent::__construct();

		if ($errors instanceof MessageBag)
		{
			$errors = $errors->all();
		}

		if ($errors instanceof MessageProvider)
		{
			$errors = $errors->getMessageBag()->all();
		}

		$this->details = $errors;
	}

}