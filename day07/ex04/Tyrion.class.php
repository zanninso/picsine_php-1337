<?php
class Tyrion extends Lannister
{
    public function sleepWith($someone)
    {
        if($someone instanceof Lannister)
            print("Not even if I'm drunk !".PHP_EOL);
        else 
            print("Let's do this.".PHP_EOL);
    }
}