<?php namespace Radweb\Tumble\Laravel;

use Exception;
use Illuminate\Http\JsonResponse;
use \Radweb\Tumble\Exception as TumbleException;
use Symfony\Component\HttpKernel\Exception\HttpException as SymfonyHttpException;

class LaravelTumbleRenderer {

	public function render(Exception $e)
	{
		if ($e instanceof TumbleException)
		{
			return $this->tumbleException($e);
		}
		else if ($e instanceof SymfonyHttpException)
		{
			return $this->symfonyException($e);
		}
		else
		{
			return $this->otherException($e);
		}
	}

	private function tumbleException(TumbleException $e)
	{
		return new JsonResponse($this->addDebug($e, [
			'message' => $e->getMessage(),
			'details' => $e->getDetails(),
		]), $e->getHttpStatus());
	}

	private function symfonyException(SymfonyHttpException $e)
	{
		return new JsonResponse($this->addDebug($e, [
			'message' => $e->getMessage()
		]), $e->getStatusCode(), $e->getHeaders());
	}

	private function otherException(Exception $e)
	{
		return new JsonResponse($this->addDebug($e, [
			'message' => $e->getMessage()
		]), 500);
	}

	private function addDebug(Exception $e, $content)
	{
		$debug = env('APP_DEBUG', false) ? [
			'message' => $e->getMessage(),
			'line' => $e->getLine(),
			'file' => $e->getFile(),
			'code' => $e->getCode(),
		] : [];

		return array_merge($content, ['error' => $debug]);
	}

}