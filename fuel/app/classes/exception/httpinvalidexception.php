<?php
class Exception_HttpInvalidException extends HttpException
{
	public function response()
	{
		$response = Request::forge('error/invalid')->execute()->response();
		return $response;
	}
}