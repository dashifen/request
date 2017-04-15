<?php

namespace Dashifen\Request;

use Dashifen\Session\SessionInterface;

/**
 * Interface RequestInterface
 *
 * @package Dashifen\Request
 */
interface RequestInterface {
	/**
	 * @param string $index
	 *
	 * @return string|null
	 */
	public function getGetVar(string $index): ?string;
	
	/**
	 * @return array
	 */
	public function getGet(): array;
	
	/**
	 * @param string $index
	 *
	 * @return string|null
	 */
	public function getPostVar(string $index): ?string;
	
	/**
	 * @return array
	 */
	public function getPost(): array;
	
	/**
	 * @param string $index
	 *
	 * @return string|null
	 */
	public function getServerVar(string $index): ?string;
	
	/**
	 * @return array
	 */
	public function getServer(): array;
	
	/**
	 * @param string $index
	 *
	 * @return string|null
	 */
	public function getCookieVar(string $index): ?string;
	
	/**
	 * @return array
	 */
	public function getCookies(): array;
	
	/**
	 * @param string $index
	 * @param null   $default
	 *
	 * @return mixed|null
	 */
	public function getSessionVar(string $index, $default = null);
	
	/**
	 * @return array
	 */
	public function getSession(): array;
	
	/**
	 * @return SessionInterface
	 */
	public function getSessionObj(): SessionInterface;
}
