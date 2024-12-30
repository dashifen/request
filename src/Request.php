<?php

namespace Dashifen\Request;

use Dashifen\Session\SessionInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class Request
 *
 * @package Dashifen\Request
 */
class Request implements RequestInterface
{
  protected array $get;
  protected array $post;
  protected array $server;
  protected array $cookie;
  protected array $files;
  
  /**
   * Request constructor.
   *
   * @param ServerRequestInterface $request
   * @param SessionInterface       $session
   */
  public function __construct(
    protected ServerRequestInterface $request,
    protected SessionInterface $session
  ) {
  }
  
  /**
   * Returns the value of a $_GET index.
   *
   * @param string $index
   * @param mixed  $default
   *
   * @return mixed
   */
  public function getGetVar(string $index, mixed $default = ''): mixed
  {
    return $this->getGet()[$index] ?? $default;
  }
  
  /**
   * Returns the value of a $_GET index.
   *
   * @return array
   */
  public function getGet(): array
  {
    return $this->pull('get');
  }
  
  /**
   * Initializes the getVars property when necessary and returns it
   *
   * @param string $target 
   * 
   * @return array
   */
  private function pull(string $target): array
  {
    if (!isset($this->{$target})) {
      $method = match ($target) {
        'get'    => 'getQueryParams',
        'post'   => 'getParsedBody',
        'server' => 'getServerParams',
        'cookie' => 'getCookieParams',
        'files'  => 'getUploadedFiles',
      };
      
      $this->{$target} = $this->request->{$method}();
    }
    
    return $this->{$target};
  }
  
  /**
   * Returns a $_POST value
   *
   * @param string $index
   * @param mixed  $default
   *
   * @return mixed
   */
  public function getPostVar(string $index, mixed $default = ''): mixed
  {
    return $this->getPost()[$index] ?? $default;
  }
  
  /**
   * Returns $_POST
   *
   * @return array
   */
  public function getPost(): array
  {
    return $this->pull('post');
  }
  
  /**
   * Returns a $_SERVER value
   *
   * @param string $index
   * @param mixed  $default
   *
   * @return mixed
   */
  public function getServerVar(string $index, mixed $default = ''): mixed
  {
    return $this->getServer()[$index] ?? $default;
  }
  
  /**
   * Returns $_SERVER
   *
   * @return array
   */
  public function getServer(): array
  {
    return $this->pull('server');
  }
  
  /**
   * Returns a $_COOKIE value
   *
   * @param string $index
   * @param mixed  $default
   *
   * @return mixed
   */
  public function getCookieVar(string $index, mixed $default = ''): mixed
  {
    return $this->getCookies()[$index] ?? $default;
  }
  
  /**
   * Returns $_COOKIE
   *
   * @return array
   */
  public function getCookies(): array
  {
    return $this->pull('cookie');
  }
  
  /**
   * A get* method for our session added for completeness compared with the others.
   *
   * @param string $index
   * @param mixed  $default
   *
   * @return mixed
   */
  public function getSessionVar(string $index, mixed $default = ''): mixed
  {
    return $this->session->get($index, $default);
  }
  
  /**
   * Returns the protected Session property
   *
   * @return array
   */
  public function getSession(): array
  {
    return $this->session->getSession();
  }
  
  /**
   * Returns the actual session object
   *
   * @return SessionInterface
   */
  public function getSessionObj(): SessionInterface
  {
    return $this->session;
  }
  
  /**
   * Returns the value of a $_FILES index.
   * 
   * @param string $index
   * @param string $value
   * @param string $default
   *
   * @return mixed
   */
  public function getFilesVar(string $index, string $value, mixed $default = ''): mixed
  {
    return $this->getFiles()[$index][$value] ?? $default;
  }
  
  /**
   * Returns complete information about an index within $_FILES.
   *
   * @param string $index
   *
   * @return array
   */
  public function getFile(string $index): array
  {
    return $this->pull('files')[$index] ?? [];
  }
  
  /**
   * Returns the information in $_FILES.
   *
   * @return array
   */
  public function getFiles(): array
  {
    return $this->pull('files');
  }
}
