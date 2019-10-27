<?php

abstract class Fighter
{
	private $_category;

	function __construct($category)
	{
		$this->_category = $category;
	}

	function get_category()
	{
		return $this->_category;
	}

	abstract function fight($target);
}