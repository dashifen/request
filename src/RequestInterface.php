<?php

namespace Dashifen\Request;

use Dashifen\Session\SessionInterface;

/**
 * Interface RequestInterface
 *
 * @package Dashifen\Request
 */
interface RequestInterface
{
  /**
   * Returns the value of a $_GET index.
   *
   * @param string $index
   * @param mixed  $default
   *
   * @return mixed
   */
  public function getGetVar(string $index, mixed $default = ''): mixed;
  
  /**
   * Returns the information in the  $_GET array.
   *
   * @return array
   */
  public function getGet(): array;
  
  /**
   * Returns the value of a $_POST index.
   *
   * @param string $index
   * @param mixed  $default
   *
   * @return mixed
   */
  public function getPostVar(string $index, mixed $default = ''): mixed;
  
  /**
   * Returns information in the $_POST array.
   *
   * @return array
   */
  public function getPost(): array;
  
  /**
   * Returns the value of a $_SERVER index.
   *
   * @param string $index
   * @param mixed  $default
   *
   * @return mixed
   */
  public function getServerVar(string $index, mixed $default = ''): mixed;
  
  /**
   * Returns the information in the $_SERVER array
   *
   * @return array
   */
  public function getServer(): array;
  
  /**
   * Returns the value of a $_COOKIE index.
   *
   * @param string $index
   * @param mixed  $default
   *
   * @return mixed
   */
  public function getCookieVar(string $index, mixed $default = ''): mixed;
  
  /**
   * Returns the information in the $_COOKIES array.
   *
   * @return array
   */
  public function getCookies(): array;
  
  /**
   * Returns the value of a $_SESSION index.
   *
   * @param string $index
   * @param mixed  $default
   *
   * @return mixed
   */
  public function getSessionVar(string $index, mixed $default = ''): mixed;
  
  /**
   * Returns information in the $_SESSION array.
   *
   * @return array
   */
  public function getSession(): array;
  
  /**
   * Returns the SessionInterface object being used to manage our session.
   *
   * @return SessionInterface
   */
  public function getSessionObj(): SessionInterface;
  
  /**
   * Returns the value of a $_FILES index.
   *
   * @param string $index
   * @param string $value
   * @param string $default
   *
   * @return mixed
   */
  public function getFilesVar(string $index, string $value, mixed $default = ''): mixed;
  
  /**
   * Returns complete information about an index within $_FILES.
   *
   * @param string $index
   *
   * @return array
   */
  public function getFile(string $index): array;
  
  /**
   * Returns the information in $_FILES.
   *
   * @return array
   */
  public function getFiles(): array;
}
