<?php

namespace BattleShipsGame\Game\Commands;


use BattleShipsGame\Game\GameEngineInterface;

class StatusReportCommand implements CommandInterface
{
    /**
     * @param GameEngineInterface $engine
     * @param array $params
     * @return string[]
     */
    public function execute(GameEngineInterface $engine, array $params)
    {
        $ship = $engine->getOcean()->getShipByName($params[0]);

        return $ship->getReport();
    }
}