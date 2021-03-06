<?php 

namespace System;


class Cookie
{
	/**
	 * Application Object
	 * 
	 * @var \System\Application
	 */
	private $app;

	/**
	 * Cookies path
	 * 
	 * @var string
	 */
	private $path = '/';

	/**
	 * Constructor
	 * 
	 * @param \System\Application $app
	 */
	public function __construct(Application $app)
	{
		$this->app = $app;
		$this->path = dirname($this->app->request->server('SCRIPT_NAME')) ?: '/';
	}

	/**
	 * Set new cookie
	 *
	 * @param string $key
	 * @param mixed $value
	 * @param int $hours
	 * @return void
	 */
	public function set($key, $value , $hours = 1800)
	{
		$expireTime = $hours == -1 ? -1 : time() + $hours * 3600;
	           // key , value , expire time  ,  path , domain , secure , httpOnly
		setcookie($key, $value , $expireTime, $this->path, '', false, true);
		/*setcookie($key, $value , time() + $hours * 3600, '', '', false, true);*/
	}
	
	

	/**
	 * Get value from cookie by key
	 *
	 * @param string $key
	 * @param mixed $default
	 * @return mixed
	 */
	public function get($key, $default = null)
	{
		return array_get($_COOKIE, $key, $default);
	}

	/**
	 * Check if the cookie has the key
	 *
	 * @param string $key
	 * @return bool
	 */
	public function has($key)
	{
		return array_key_exists($key, $_COOKIE);
	}

	/**
	 * Remove the key from cookie
	 *
	 * @param string $key
	 * @return void
	 */
	public function remove($key)
	{
		$this->set($key, null, -1);
		unset($_COOKIE[$key]);
	}

	/**
	 * Get all cookie data
	 *
	 * @return array
	 */
	public function all()
	{
		return $_COOKIE;
	}

	/**
	 * Destroy cookie
	 *
	 * @return void
	 */
	public function destroy()
	{
		foreach (array_keys($this->all()) as $key) {
			$this->remove($key);
		}
		unset($_COOKIE);
	}
}