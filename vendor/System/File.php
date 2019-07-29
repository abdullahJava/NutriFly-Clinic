<?php 

namespace System;

class File
{
	/**
	 * Directory Separator (\)
	 *
	 * @const string
	 */
	const DS = DIRECTORY_SEPARATOR;

	/**
	 * Root path
	 *
	 * @var string
	 */
	private $root;

	/**
	 * Constructor
	 *
	 * @param string $root
	 */
	public function __construct($root)
	{
		$this->root = $root;
	}

	/**
	 * Check if the file path exists
	 *
	 * @param string $file
	 * @return bool
	 */
	public function exists($file)
	{
		return file_exists($this->to($file));
	}

	/**
	 * Include the given file
	 *
	 * @param string $file
	 * @return mixed
	 */
	public function includeFile($file)
	{
		return include $this->to($file);
	}

	/**
	 * Generate full path to the given path in vendor folder
	 *
	 * @param string $path
	 * @return string
	 */
	public function toVendor($path)
	{
		return $this->to('vendor/' . $path);
	}

	/**
	* Generate full path to the given path in public folder
	*
	* @param string $path
	* @return string
	*/
	public function toPuplic($path)
	{
		return $this->to('public/' . $path);
	}

	/**
	 * Generate full path to the given path
	 *
	 * @param string $path
	 * @return string
	 */
	public function to($path)
	{
		return $this->root . static::DS . str_replace(['/', '\\'], static::DS, $path);
	}
}