<?php

namespace System\View;

interface ViewInterface
{
	/**
	 * Get the view output
	 *
	 * @return string
	 */
	public function getOutput();

	/**
	 * Covert the view object to string in printing
	 *
	 * @return string
	 */
	public function __toString();
}