<?php

class Util_InputFilters
{
	// charactor encoding
	public static function check_encoding($value)
	{
		
		if (is_array($value))
		{
			array_map(array('Util_InputFilters', 'check_encoding'), $value);
			return $value;
		}

		if (mb_check_encoding($value, Fuel::$encoding))
		{
			return $value;
		}
		else
		{
			Util_Log::log_error('Invalid control characters', $value); 
			throw new Exception_HttpInvalidException('Invalid input data');
		}
	}

	// control check
	public static function check_control($value)
	{
		if (is_array($value))
		{
			array_map(array('Util_InputFilters', 'check_control'), $value);
			return $value;
		}
		
		if (preg_match('/\A[\r\n\t[:^cntrl:]]*\z/u', $value) === 1)
		{
			return $value;
		}
		else
		{
			Util_Log::log_error('Invalid control characters', $value);
			throw new Exception_HttpInvalidException('Invalid input data');
		}
	}

}