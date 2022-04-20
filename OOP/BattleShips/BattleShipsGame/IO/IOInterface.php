<?php

namespace BattleShipsGame\IO;


interface IOInterface
{
    /**
     * @param $text mixed
     */
    public function write($text);

    /**
     * @param $text mixed
     */
    public function writeLine($text);

    /**
     * @return string
     */
    public function readLine(): string;
}