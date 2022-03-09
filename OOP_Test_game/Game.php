<?php

class Game 
{
    const ROUNDS = 10;

    private $playerOne;
    private $playerTwo;
    private $rounds;

    public function __construct(Player $playerOne, Player $playerTwo, $rounds = self::ROUNDS)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
        $this->rounds = $rounds;
    }

    public function start()
    {
        $rounds = $this->rounds;
        $player1 = $this->playerOne;
        $player2 = $this->playerTwo;
        while ($rounds > 0 && $player1->isAlive() && $player2->isAlive()) {
            $player1->attackEnemy($player2);
            // echo " -- Player One health: " . $player1->getHealth() . "<br>";
            $player2->attackEnemy($player1);
            // echo " -- Player Two health: " . $player2->getHealth() . "<br>";
            // echo "<hr>";
            $rounds--;
        }
    }

    public function getResult()
    {
        if ($this->playerOne->isAlive() == $this->playerTwo->isAlive()) {
            return null;
        } 
        
        $winner = $this->playerOne->isAlive() 
            ? $this->playerOne 
            : $this->playerTwo;
        return $winner;
    }
}
