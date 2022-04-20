<?php

namespace BattleShipsGame\Game;


use BattleShipsGame\Models\OceanInterface;

interface GameEngineInterface
{
    public function run();

    /**
     * @return OceanInterface
     */
    public function getOcean(): OceanInterface;
}