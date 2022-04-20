<?php

namespace BattleShipsGame\IO;


class ConsoleIO implements IOInterface
{
    public function write($text)
    {
        echo $text;
    }

    public function writeLine($text)
    {
        echo $text . PHP_EOL;
    }

    public function readLine(): string
    {
        return trim(fgets(STDIN));
    }
}