<?php namespace Radweb\Tumble\Laravel;

use Illuminate\Contracts\Debug\ExceptionHandler;

class LogExceptionsMiddleware {

	/**
	 * @var ExceptionHandler
	 */
	private $exceptionHandler;

	public function __construct(ExceptionHandler $exceptionHandler)
	{
		$this->exceptionHandler = $exceptionHandler;
	}

	public function handle($request, \Closure $next)
	{
		try
		{
			return $next($request);
		}
		catch (\Exception $e)
		{
			$this->exceptionHandler->report($e);
			throw $e;
		}
	}

}