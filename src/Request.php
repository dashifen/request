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
  
  /**
   * @var ServerRequestInterface $request ;
   */
  protected $request;
  
  /**
   * @var SessionInterface $session
   */
  protected $session;
  
  /**
   * @var array $getVars
   */
  protected $getVars;
  
  /**
   * @var array $postVars
   */
  protected $postVars;
  
  /**
   * @var array serverVars
   */
  protected $serverVars;
  
  /**
   * @var array $cookieVars
   */
  protected $cookieVars;
  
  /**
   * @var array $filesVars
   */
  protected $filesVars;
  
  /**
   * Request constructor.
   *
   * @param ServerRequestInterface $request
   * @param SessionInterface       $session
   */
  public function __construct(ServerRequestInterface $request, SessionInterface $session)
  {
    $this->request = $request;
    $this->session = $session;
  }
  
  /**
   * Returns a $_GET value
   *
   * @param string $index
   * @param mixed  $default
   *
   * @return mixed
   */
  public function getGetVar(string $index, $default = "")
  {
    return $this->pullGet()[$index] ?? $default;
  }
  
  /**
   * Returns $_GET
   *
   * @return array
   */
  public function getGet(): array
  {
    return $this->pullGet();
  }
  
  /**
   * Initializes the getVars property when necessary and returns it
   *
   * @return array
   */
  protected function pullGet(): array
  {
    if (!is_array($this->getVars)) {
      $this->getVars = $this->request->getQueryParams();
    }
    
    return $this->getVars;
  }
  
  /**
   * Returns a $_POST value
   *
   * @param string $index
   * @param mixed  $default
   *
   * @return mixed
   */
  public function getPostVar(string $index, $default = "")
  {
    return $this->pullPost()[$index] ?? $default;
  }
  
  /**
   * Returns $_POST
   *
   * @return array
   */
  public function getPost(): array
  {
    return $this->pullPost();
  }
  
  /**
   * Initializes postVars property if necessary and returns it
   *
   * @return array
   */
  protected function pullPost()
  {
    if (!is_array($this->postVars)) {
      $this->postVars = $this->request->getParsedBody();
      
      if (!is_array($this->postVars)) {
        $this->postVars = [];
      }
    }
    
    return $this->postVars;
  }
  
  /**
   * Returns a $_SERVER value
   *
   * @param string $index
   * @param mixed  $default
   *
   * @return mixed
   */
  public function getServerVar(string $index, $default = "")
  {
    return $this->pullServer()[$index] ?? $default;
  }
  
  /**
   * Returns $_SERVER
   *
   * @return array
   */
  public function getServer(): array
  {
    return $this->pullServer();
  }
  
  /**
   * Initializes serverVars property if necessary and returns it
   *
   * @return array
   */
  protected function pullServer()
  {
    if (!is_array($this->serverVars)) {
      $this->serverVars = $this->request->getServerParams();
    }
    
    return $this->serverVars;
  }
  
  /**
   * Returns a $_COOKIE value
   *
   * @param string $index
   * @param mixed  $default
   *
   * @return mixed
   */
  public function getCookieVar(string $index, $default = "")
  {
    return $this->pullCookies()[$index] ?? $default;
  }
  
  /**
   * Returns $_COOKIE
   *
   * @return array
   */
  public function getCookies(): array
  {
    return $this->pullCookies();
  }
  
  /**
   * Initializes cookieVars property if necessary and returns it
   *
   * @return array
   */
  protected function pullCookies()
  {
    if (!is_array($this->cookieVars)) {
      $this->cookieVars = $this->request->getCookieParams();
    }
    
    return $this->cookieVars;
  }
  
  /**
   * A get* method for our session added for completeness compared with the others.
   *
   * @param string $index
   * @param mixed  $default
   *
   * @return mixed
   */
  public function getSessionVar(string $index, $default = "")
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
   * @param string $index
   * @param string $value
   * @param string $default
   *
   * @return mixed
   */
  public function getFilesVar(string $index, string $value, $default = "")
  {
    return $this->pullFiles()[$index][$value] ?? $default;
  }
  
  /**
   * @param string $index
   *
   * @return array
   */
  public function getFile(string $index): array
  {
    return $this->pullFiles()[$index] ?? [];
  }
  
  /**
   * @return array
   */
  public function getFiles(): array
  {
    return $this->pullFiles();
  }
  
  /**
   * Initializes filesVars property if necessary and returns it
   *
   * @return array
   */
  protected function pullFiles()
  {
    if (!is_array($this->filesVars)) {
      $this->filesVars = $this->request->getUploadedFiles();
    }
    
    return $this->filesVars;
  }
}
