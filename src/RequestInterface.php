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
	 * @param mixed  $default
	 *
	 * @return mixed
	 */
	public function getGetVar(string $index, $default = "");
	
	/**
	 * @return array
	 */
	public function getGet(): array;
	
	/**
	 * @param string $index
	 * @param mixed  $default
	 *
	 * @return mixed
	 */
	public function getPostVar(string $index, $default = "");
	
	/**
	 * @return array
	 */
	public function getPost(): array;
	
	/**
	 * @param string $index
	 * @param mixed  $default
	 *
	 * @return mixed
	 */
	public function getServerVar(string $index, $default = "");
	
	/**
	 * @return array
	 */
	public function getServer(): array;
	
	/**
	 * @param string $index
	 * @param mixed  $default
	 *
	 * @return mixed
	 */
	public function getCookieVar(string $index, $default = "");
	
	/**
	 * @return array
	 */
	public function getCookies(): array;
	
	/**
	 * @param string $index
	 * @param mixed  $default
	 *
	 * @return mixed
	 */
	public function getSessionVar(string $index, $default = "");
	
	/**
	 * @return array
	 */
	public function getSession(): array;
	
	/**
	 * @return SessionInterface
	 */
	public function getSessionObj(): SessionInterface;
	
	/**
	 * @param string $index
	 * @param string $value
	 * @param string $default
	 *
	 * @return mixed
	 */
	public function getFilesVar(string $index, string $value, $default = "");
	
	/**
	 * @param string $index
	 *
	 * @return array
	 */
	public function getFile(string $index): array;
	
	/**
	 * @return array
	 */
	public function getFiles(): array;
}
