<?php

class UnholyFactory
{
	private $fighters = [];

	function absorb($fighter)
	{
		if($fighter instanceof Fighter)
			{
				if(isset($this->fighters[$fighter->get_category()]))
					print("(Factory already absorbed a fighter of type ". $fighter->get_category().")". PHP_EOL);
				else 
				{
					$this->fighters[$fighter->get_category()] = new $fighter;
					print("(Factory absorbed a fighter of type ". $fighter->get_category() .")". PHP_EOL);
				}
			}
			
		else 
			print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
    }
    
	function fabricate($category)
	{
		if(isset($this->fighters[$category]))
		{
			print("(Factory fabricates a fighter of type " .$category.")". PHP_EOL);
			return (new $this->fighters[$category]);
		}
		print("(Factory hasn't absorbed any fighter of type " .$category.")". PHP_EOL);
		return (NULL);	
	}
}