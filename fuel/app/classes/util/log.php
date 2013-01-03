<?php
class Util_Log
{
	
	public static function log_error($msg, $value)
	{
		Log::error(
				$msg . ': ' . Input::uri() . ' ' . urlencode($value) . ' ' .
				Input::ip() . ' "' . Input::user_agent() . '"'
		);
	}
}