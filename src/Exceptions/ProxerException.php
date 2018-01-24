<?php
/**
 * Created by Tobias Franz.
 * Date: 23.01.2018
 * Time: 19:08
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Exceptions;


use Exception;
use Throwable;

class ProxerException extends Exception {

	public static $SERVER = "SERVER";
	public static $PROXER = "PROXER";

	public function __construct( string $message = "", int $code = 0, Throwable $previous = null, $type ) {
		$errorType     = is_null( $type ) ? self::$PROXER : $type;
		$this->message = sprintf( "%s ERROR: ", $errorType ) . $this->message;
		parent::__construct( $message, $code, $previous );
	}

}