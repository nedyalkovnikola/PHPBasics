<?php

use BattleShipsGame\Game\GameEngine;
use BattleShipsGame\IO\ConsoleIO;
use BattleShipsGame\Models\Ocean;

spl_autoload_register(function ($className) {
    require_once "{$className}.php";
});

$ocean = new Ocean();
$io = new ConsoleIO();

$game = new GameEngine($ocean, $io);
$game->run();