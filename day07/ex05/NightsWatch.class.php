<?php

class NightsWatch 
{
    private $fighters = array();

    public function recruit($fighter)
    {
        $this->fighters[] = $fighter;
    }

    public function fight()
    {
        foreach($this->fighters as $fighter)
        {
            if($fighter instanceof IFighter)
                $fighter->fight();
        }
    }
}