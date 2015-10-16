<?php namespace Radweb\Tumble\Laravel;

class FormatExceptionsMiddleware {

	/**
	 * @var LaravelTumbleRenderer
	 */
	private $renderer;

	public function __construct(LaravelTumbleRenderer $renderer)
	{
		$this->renderer = $renderer;
	}

	public function handle($request, \Closure $next)
	{
		try
		{
			return $next($request);
		}
		catch (\Exception $e)
		{
			return $this->renderException($e);
		}
	}

	protected function renderException(\Exception $e)
	{
		return $this->renderer->render($this->convertException($e));
	}

	protected function convertException(\Exception $e)
	{
		return $e;
	}

}